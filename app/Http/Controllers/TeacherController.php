<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
    // authenticate
    public function authenticate(Request $request)
    {
        // create validation for input from request
        $validator = Validator::make(
            $request->all(),
            [
                'email' => ['required', 'email'],
                'password' => ['required']
            ]
        );

        // return back to previous page with errors
        // if validation failed
        if ($validator->fails()) {
            return
                back()
                ->onlyInput('email')
                ->withErrors($validator->errors());
        }

        // attempt to authenticate using input from request
        // and redirect to dashboard on success
        if (Auth::guard('teacher')->attempt($validator->validated())) {
            $request->session()->regenerate();
            return redirect()->intended('/teacher/sections');
        }

        // else return back to login page
        return back()->with([
            'toasts' => [
                [
                    'type' => 'warning',
                    'message' => 'Invalid credentials.'
                ]
            ]
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::guard('teacher')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/teacher/login');
    }

    public function store_exam(Request $request, Section $section)
    {
        $formFields = $request->all();
        $formFields['section_id'] = $section->id;
        $exam = Exam::create($formFields);
        return $exam ? [
            'status' => 200,
            'data' => [
                'url' => "/teacher/sections/{$section->id}/exams"
            ]
        ] : [
            'status' => 500,
            'data' => []
        ];
    }
}
