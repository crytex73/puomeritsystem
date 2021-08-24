<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;
    //protected $table = 'lecturers';
    protected $fillable = [
        'fullname',
        'matric_number',
        'user_id',
    ];

    // public function getUser($query){
        
    // }
}
