<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compound extends Model
{
    use HasFactory;
    protected $fillable = [
        'lecturer_id',
        'student_id',
        'comp_value',
        'merit_deduction',
        'comp_reason',
        'submission_date',
        'payment_status',
        'proof_file_url',
    ];

    public function student(){
        return $this->belongsTo(Student::class);
    }
}
