<?php

namespace App\Http\Controllers;

use App\Models\MoodJourney;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MoodJourneyController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $journeysQuery = $user->moodJourneys()
            ->with('dailyMood')
            ->latest('journal_date');

        if ($request->filled('from_date')) {
            $journeysQuery->whereDate('journal_date', '>=', $request->date('from_date'));
        }

        if ($request->filled('to_date')) {
            $journeysQuery->whereDate('journal_date', '<=', $request->date('to_date'));
        }

        if ($request->filled('mood_level')) {
            $journeysQuery->whereHas('dailyMood', function ($query) use ($request) {
                $query->where('mood_level', $request->integer('mood_level'));
            });
        }

        $journeys = $journeysQuery->paginate(10)->withQueryString();
        $moods = $user->dailyMoods()->orderByDesc('log_date')->limit(30)->get();

        return view('journeys.index', compact('journeys', 'moods'));
    }

    public function create(Request $request)
    {
        $moods = $request->user()->dailyMoods()->orderByDesc('log_date')->limit(30)->get();

        return view('journeys.create', compact('moods'));
    }

    public function store(Request $request)
    {
        $user = $request->user();

        $data = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'content' => ['required', 'string', 'min:5'],
            'journal_date' => ['required', 'date'],
            'daily_mood_id' => [
                'nullable',
                Rule::exists('daily_moods', 'id')->where('user_id', $user->id),
            ],
        ]);

        $journal = $user->moodJourneys()->create($data);

        $this->logActivity('mood_journey_create', 'Menambah catatan pada '.$journal->journal_date);

        return redirect()->route('journeys.index')->with('status', 'Catatan berhasil disimpan.');
    }

    public function edit(MoodJourney $journal, Request $request)
    {
        $this->ensureOwner($journal, $request);
        $moods = $request->user()->dailyMoods()->orderByDesc('log_date')->limit(30)->get();

        return view('journeys.edit', compact('journal', 'moods'));
    }

    public function update(MoodJourney $journal, Request $request)
    {
        $this->ensureOwner($journal, $request);
        $user = $request->user();

        $data = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'content' => ['required', 'string', 'min:5'],
            'journal_date' => ['required', 'date'],
            'daily_mood_id' => [
                'nullable',
                Rule::exists('daily_moods', 'id')->where('user_id', $user->id),
            ],
        ]);

        $journal->update($data);

        $this->logActivity('mood_journey_update', 'Memperbarui catatan pada '.$journal->journal_date);

        return redirect()->route('journeys.index')->with('status', 'Catatan diperbarui.');
    }

    public function destroy(MoodJourney $journal, Request $request)
    {
        $this->ensureOwner($journal, $request);

        $journal->delete();

        $this->logActivity('mood_journey_delete', 'Menghapus catatan pada '.$journal->journal_date);

        return redirect()->route('journeys.index')->with('status', 'Catatan dihapus.');
    }

    protected function ensureOwner(MoodJourney $journal, Request $request): void
    {
        if ($journal->user_id !== $request->user()->id) {
            abort(403);
        }
    }
}
