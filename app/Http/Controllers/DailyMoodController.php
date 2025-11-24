<?php

namespace App\Http\Controllers;

use App\Models\DailyMood;
use Illuminate\Http\Request;

class DailyMoodController extends Controller
{
    public function create(Request $request)
    {
        $recent = $request->user()->dailyMoods()->orderByDesc('log_date')->limit(7)->get();

        return view('daily-mood.create', [
            'recent' => $recent,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'mood_level' => ['required', 'integer', 'min:1', 'max:5'],
            'trigger_tag' => ['nullable', 'string', 'max:100'],
            'log_date' => ['nullable', 'date'],
        ]);

        $logDate = $data['log_date'] ?? now()->toDateString();

        $mood = DailyMood::updateOrCreate(
            [
                'user_id' => $request->user()->id,
                'log_date' => $logDate,
            ],
            [
                'mood_level' => $data['mood_level'],
                'trigger_tag' => $data['trigger_tag'] ?? null,
            ]
        );

        $this->logActivity('daily_mood', 'Check-in mood harian ('.$mood->log_date.').');

        return redirect()->route('dashboard')->with('status', 'Mood harian tersimpan.');
    }
}
