<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SelfcheckQuestion;
use Illuminate\Http\Request;

class SelfcheckQuestionController extends Controller
{
    public function index()
    {
        $questions = SelfcheckQuestion::orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $nextOrder = ($questions->max('sort_order') ?? 0) + 1;

        return view('admin.selfcheck_questions.index', [
            'questions' => $questions,
            'nextOrder' => $nextOrder,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'question' => ['required', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:1', 'max:255'],
            'is_active' => ['required', 'boolean'],
        ]);

        $data['sort_order'] = $data['sort_order'] ?? (SelfcheckQuestion::max('sort_order') ?? 0) + 1;
        $data['is_active'] = $request->boolean('is_active');
        $data['version'] = 1;

        SelfcheckQuestion::create($data);

        return back()->with('status', 'Pertanyaan ditambahkan.');
    }

    public function update(Request $request, SelfcheckQuestion $selfcheckQuestion)
    {
        $data = $request->validate([
            'question' => ['required', 'string', 'max:255'],
            'sort_order' => ['required', 'integer', 'min:1', 'max:255'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $data['is_active'] = $request->boolean('is_active');
        $data['version'] = $selfcheckQuestion->version + 1;

        $selfcheckQuestion->update($data);

        return back()->with('status', 'Pertanyaan diperbarui.');
    }

    public function destroy(SelfcheckQuestion $selfcheckQuestion)
    {
        if (SelfcheckQuestion::count() <= 1) {
            return back()->withErrors('Tidak dapat menghapus pertanyaan terakhir.');
        }

        $selfcheckQuestion->delete();

        return back()->with('status', 'Pertanyaan dihapus.');
    }
}
