<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MoodJournal extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'daily_mood_id',
        'title',
        'content',
        'journal_date',
    ];

    protected $casts = [
        'journal_date' => 'date',
        'content' => 'encrypted:string',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function dailyMood(): BelongsTo
    {
        return $this->belongsTo(DailyMood::class);
    }
}
