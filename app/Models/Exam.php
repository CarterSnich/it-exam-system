<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'duration',
        'items',
        'exam',
        'deadline',
        'open',
        'section_id',
    ];

    protected $casts = [
        'items' => 'json',
    ];
}
