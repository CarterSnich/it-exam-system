<?php

namespace App\Http\Controllers;

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
                'username' => ['required'],
                'password' => ['required']
            ]
        );

        // return back to previous page with errors
        // if validation failed
        if ($validator->fails()) {
            return
                back()
                ->onlyInput('username')
                ->withErrors($validator->errors());
        }

        // attempt to authenticate using input from request
        // and redirect to dashboard on success
        if (Auth::guard('student')->attempt($validator->validated())) {
            $request->session()->regenerate();
            return redirect()->intended('/student/classes');
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

    // logout
    public function logout(Request $request)
    {
        Auth::guard('student')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/student/login');
    }
}
