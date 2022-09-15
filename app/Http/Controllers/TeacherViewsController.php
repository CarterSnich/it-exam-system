<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TeacherViewsController extends Controller
{
    // login page
    public function login()
    {
        return view('teacher.login');
    }

    // section
    public function sections()
    {
        return view('teacher.sections', [
            'sections' => Section::where('teacher_id', '=', auth('teacher')->user()->id)->get()
        ]);
    }

    // display section
    public function section(Section $section)
    {
        return view('teacher.section', [
            'section' => $section
        ]);
    }
}
