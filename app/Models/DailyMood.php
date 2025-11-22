<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\MoodJourney;

class DailyMood extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'mood_level',
        'trigger_tag',
        'log_date',
    ];

    protected $casts = [
        'log_date' => 'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function journeys(): HasMany
    {
        return $this->hasMany(MoodJourney::class);
    }
}
