<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    // authenticate
    public function authenticate(Request $request)
    {
        // create validation for input from request
        $validator = Validator::make(
            $request->all(),
            [
                'student_id' => ['required', 'exists:students,student_id'],
                'password' => ['required']
            ]
        );

        // return back to previous page with errors
        // if validation failed
        if ($validator->fails()) {
            return
                back()
                ->onlyInput('student_id')
                ->withErrors($validator->errors());
        }

        $credentials = [
            'student_id' => $request->student_id,
            'password' => $request->password
        ];

        // attempt to authenticate using input from request
        // and redirect to dashboard on success
        if (Auth::guard('student')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/student/exams');
        }

        // else return back to login page
        return
            back()->with([
                'toasts' => [
                    'type' => 'warning',
                    'message' => 'Invalid credentials.'
                ]
            ])->onlyInput('email');
    }

    // logout
    public function logout(Request $request)
    {
        Auth::guard('student')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/student/login');
    }

    public function submit(Request $request, int $exam_id)
    {
        $exam = Exam::where('id', '=', $exam_id)->first();
        $formFields = $request->all();
        $formFields['exam_id'] = $exam->id;
        $formFields['student_id'] = Auth::guard('student')->user()->id;
        $score = 0;

        for ($i = 0; $i < count($exam->items); $i++) {
            if ($exam->items[$i]['answer'] == $formFields['answers'][$i]['answer']) {
                $score++;
            }
        }

        $formFields['score'] = $score;

        $submission = Submission::create($formFields);

        return $submission ? [
            'status' => 200,
            'data' => [
                'url' => "/student/exams/{$exam->id}"
            ]
        ] : [
            'status' => 500,
            'data' => []
        ];
    }
}
