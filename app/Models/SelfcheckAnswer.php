<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SelfcheckAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'selfcheck_result_id',
        'selfcheck_question_id',
        'position',
        'answer',
        'question_text_snapshot',
    ];

    public function result(): BelongsTo
    {
        return $this->belongsTo(SelfcheckResult::class, 'selfcheck_result_id');
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(SelfcheckQuestion::class, 'selfcheck_question_id');
    }
}
