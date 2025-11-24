<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\DailyMood;
use App\Models\MoodJourney;
use App\Models\SelfcheckResult;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $moodDistribution = DailyMood::select('mood_level', DB::raw('count(*) as total'))
            ->groupBy('mood_level')
            ->orderBy('mood_level')
            ->get();

        $selfCheckByCategory = SelfcheckResult::select('category', DB::raw('count(*) as total'))
            ->groupBy('category')
            ->orderBy('category')
            ->get();

        return view('admin.dashboard', [
            'totalUsers' => User::count(),
            'totalDailyMoods' => DailyMood::count(),
            'totalJournals' => MoodJourney::count(),
            'moodDistribution' => $moodDistribution,
            'selfCheckByCategory' => $selfCheckByCategory,
            'latestUsers' => User::latest()->limit(5)->get(),
            'recentLogs' => ActivityLog::latest('created_at')->limit(10)->get(),
        ]);
    }
}
