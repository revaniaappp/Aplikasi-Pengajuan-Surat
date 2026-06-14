<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubmissionDetail extends Model
{
    protected $table = 'submission_details';

    public $timestamps = false; // tabel ini tidak punya created_at/updated_at

    protected $fillable = [
        'submission_id',
        'field_key',
        'field_value',
    ];

    public function submission()
    {
        return $this->belongsTo(LetterSubmission::class, 'submission_id');
    }
}