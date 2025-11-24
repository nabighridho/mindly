<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = $request->user();

        $todayMood = $user->dailyMoods()->whereDate('log_date', now()->toDateString())->first();
        $weeklyMoods = $user->dailyMoods()
            ->whereDate('log_date', '>=', now()->subDays(6))
            ->orderBy('log_date')
            ->get();

        $recentJourneys = $user->moodJourneys()
            ->latest('journal_date')
            ->limit(3)
            ->get();

        $latestSelfCheck = $user->selfcheckResults()->latest('test_date')->first();

        return view('dashboard', [
            'user' => $user,
            'todayMood' => $todayMood,
            'weeklyMoods' => $weeklyMoods,
            'recentJourneys' => $recentJourneys,
            'latestSelfCheck' => $latestSelfCheck,
        ]);
    }
}
