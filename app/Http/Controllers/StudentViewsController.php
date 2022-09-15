<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentViewsController extends Controller
{
    // login
    public function login()
    {
        return view('student.login');
    }

    // signup
    public function signup()
    {
        return view('student.signup');
    }

    // classes
    public function classes()
    {
        return view('student.classes');
    }
}
