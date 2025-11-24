<?php

namespace App\Http\Controllers;

use App\Models\SelfcheckQuestion;
use App\Models\SelfcheckAnswer;
use App\Models\SelfcheckResult;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SelfCheckController extends Controller
{
    public function create()
    {
        $questions = SelfcheckQuestion::where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        if ($questions->isEmpty()) {
            abort(500, 'Pertanyaan Self-Check belum dikonfigurasi.');
        }

        return view('self-check.form', [
            'questions' => $questions,
            'scale' => [
                1 => 'Tidak pernah',
                2 => 'Jarang',
                3 => 'Kadang',
                4 => 'Sering',
                5 => 'Sangat sering',
            ],
        ]);
    }

    public function store(Request $request)
    {
        $questions = SelfcheckQuestion::where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        if ($questions->isEmpty()) {
            abort(500, 'Pertanyaan Self-Check belum dikonfigurasi.');
        }

        $request->validate([
            'answers' => ['required', 'array', 'size:'.$questions->count()],
            'answers.*' => ['required', 'integer', 'min:1', 'max:5'],
        ]);

        $answers = $request->input('answers', []);

        $score = array_sum($answers);
        [$category, $recommendation] = $this->categoryForScore($score);

        $questionVersion = $questions->max('version') ?? 1;

        $result = null;

        DB::transaction(function () use ($request, $answers, $score, $category, $recommendation, $questions, $questionVersion, &$result) {
            $result = $request->user()->selfcheckResults()->create([
                'score' => $score,
                'category' => $category,
                'recommendation_content' => $recommendation,
                'raw_answers' => $answers,
                'question_version' => $questionVersion,
                'test_date' => now(),
            ]);

            $rows = [];
            foreach ($questions as $index => $question) {
                $rows[] = [
                    'selfcheck_result_id' => $result->id,
                    'selfcheck_question_id' => $question->id,
                    'position' => $index + 1,
                    'answer' => (int) $answers[$index],
                    'question_text_snapshot' => $question->question,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            SelfcheckAnswer::insert($rows);

            $this->logActivity('self_check', 'Self-check dengan kategori '.$category);
        });

        return redirect()->route('self-check.show', $result);
    }

    public function show(SelfcheckResult $result, Request $request)
    {
        if ($result->user_id !== $request->user()->id) {
            abort(403);
        }

        $result->load(['answers.question']);

        return view('self-check.result', [
            'result' => $result,
        ]);
    }

    protected function categoryForScore(int $score): array
    {
        if ($score <= 20) {
            return ['Normal', 'Pertahankan rutinitas sehatmu: tidur cukup, olahraga ringan, dan tetap terhubung dengan lingkungan suportif.'];
        }

        if ($score <= 30) {
            return ['Ringan', 'Coba tambah waktu untuk relaksasi, batasi paparan stresor, dan catat pemicu emosimu. Jika dirasa perlu, bicaralah dengan teman tepercaya.'];
        }

        if ($score <= 40) {
            return ['Sedang', 'Pertimbangkan untuk berkonsultasi dengan profesional. Tetapkan jadwal check-in mood harian dan gunakan jurnal untuk memetakan pemicu spesifik.'];
        }

        return ['Parah', 'Segera cari dukungan profesional atau layanan darurat jika merasa tidak aman. Batasi keputusan besar saat ini dan fokus pada keselamatan diri.'];
    }
}
