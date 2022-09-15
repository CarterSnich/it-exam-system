<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdministratorController extends Controller
{
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
        if (Auth::guard('admin')->attempt($validator->validated())) {
            $request->session()->regenerate();
            return redirect()->intended('/administration/dashboard');
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
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/administration/login');
    }
}
