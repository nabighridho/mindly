<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SelfcheckResult extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'score',
        'category',
        'recommendation_content',
        'test_date',
        'raw_answers',
    ];

    protected $casts = [
        'test_date' => 'datetime',
        'raw_answers' => 'encrypted:array',
        'recommendation_content' => 'encrypted:string',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
