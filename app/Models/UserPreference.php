<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserPreference extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'receive_email_reminder',
        'allow_data_for_research',
        'default_reminder_time',
    ];

    protected $casts = [
        'receive_email_reminder' => 'bool',
        'allow_data_for_research' => 'bool',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
