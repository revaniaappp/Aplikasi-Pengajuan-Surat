<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LetterFile extends Model
{
    protected $table = 'letter_files';

    public $timestamps = false;

    protected $fillable = [
        'submission_id',
        'file_path',
        'original_name',
        'uploaded_by',
        'uploaded_at',
    ];

    public function submission()
    {
        return $this->belongsTo(LetterSubmission::class, 'submission_id');
    }
}