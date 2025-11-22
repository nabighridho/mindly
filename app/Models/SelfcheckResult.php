<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\SelfcheckAnswer;

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
        'question_version',
    ];

    protected $casts = [
        'test_date' => 'datetime',
        'raw_answers' => 'array',
        'recommendation_content' => 'encrypted:string',
        'question_version' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function answers()
    {
        return $this->hasMany(SelfcheckAnswer::class, 'selfcheck_result_id')->orderBy('position');
    }
}
