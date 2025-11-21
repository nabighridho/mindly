<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

abstract class Controller
{
    protected function logActivity(string $activityType, string $description): void
    {
        ActivityLog::create([
            'user_id' => Auth::id(),
            'activity_type' => $activityType,
            'description' => $description,
            'ip_address' => request()?->ip(),
            'created_at' => now(),
        ]);
    }
}
