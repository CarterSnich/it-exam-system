<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;


    protected $fillable = [
        'exam_id',
        'student_id',
        'answers',
        'score',
        'finalized'
    ];


    protected $casts = [
        'answers' => 'json',
    ];
}
