<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LetterSubmission extends Model
{
    protected $table = 'letter_submissions';

    protected $fillable = [
        'submission_number',
        'student_id',
        'prodi_id',
        'letter_type_id',
        'status',
        'rejection_reason',
        'reviewed_by',
        'reviewed_at',
        'is_read',
    ];

    public function letterType()
    {
        return $this->belongsTo(LetterType::class, 'letter_type_id');
    }

    public function prodi()
    {
        return $this->belongsTo(ProgramStudi::class, 'prodi_id');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }

    public function details()
    {
        return $this->hasMany(SubmissionDetail::class, 'submission_id');
    }

    public function file()
    {
        return $this->hasOne(LetterFile::class, 'submission_id');
    }

    protected $casts = [
        'created_at' => 'datetime',
        'reviewed_at' => 'datetime',
    ];
}
