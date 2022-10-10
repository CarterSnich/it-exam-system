<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    public static $year_levels = ['1', '2', '3', '4'];

    public static $theme_colors = [
        'default',
        'blue',
        'green',
        'pink',
        'orange',
        'cyan',
        'purple',
        'lightblue',
        'grey',
    ];



    protected $fillable = [
        'section_name',
        'year_level',
        'course',
        'teacher_id',
        'colors'
    ];
}
