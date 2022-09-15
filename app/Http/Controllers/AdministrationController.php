<?php

namespace App\Http\Controllers;

use App\Models\_Class;
use App\Models\Section;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdministrationController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Pages
    |--------------------------------------------------------------------------
    */

    // login page
    public function login()
    {
        return view('administration.login');
    }

    // dashboard
    public function dashboard()
    {
        return view('administration.dashboard');
    }

    // teachers
    public function teachers()
    {
        return view('administration.teachers', [
            'teachers' => Teacher::orderBy('lastname')->paginate(50)
        ]);
    }

    // teachers
    public function display_teacher(Teacher $teacher)
    {
        return view('administration.display_teacher', [
            'teacher' => $teacher,
            'sections' => Section::where('teacher_id', '=', $teacher->id)->get()
        ]);
    }

    public function add_teacher()
    {
        return view('administration.add_teacher');
    }

    // students
    public function students()
    {
        return view('administration.students', [
            'students' =>  Student::orderBy('lastname')->paginate(50)
        ]);
    }

    // classes
    public function sections()
    {
        return view('administration.sections');
    }


    /*
    |--------------------------------------------------------------------------
    | Form submission routes
    |--------------------------------------------------------------------------
    */
    public function store_teacher(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'lastname' => ['required'],
                'firstname' => ['required'],
                'date_of_birth' => ['required', 'date'],
                'gender' => ['required', 'in:male,female'],
                'email' => ['required', 'email', 'unique:teachers,email'],
                'mobile_no' => ['required', 'regex:/09[0-9]{9}/'],
                'address' => ['required']
            ]
        );

        // redirect back if validation fails
        if ($validator->fails()) {
            return
                back()
                ->withInput()
                ->withErrors($validator->errors());
        }

        $formFields = $request->all();
        $morphed = str_replace(' ', '', strtolower($request->lastname));
        $formFields['password'] = Hash::make($morphed);

        // store new techer to database
        if (Teacher::create($formFields)) {
            // redirect to teachers page on success
            return
                redirect('/administration/teachers')
                ->with([
                    'toast' => [
                        'message' => 'Teacher added successfully',
                        'type' => 'success'
                    ]
                ]);
        } else {
            // redirect back on fail
            return
                back()
                ->with([
                    'toast' => [
                        'message' => 'Failed to add teacher.',
                        'type' => 'danger'
                    ]
                ]);
        }
    }

    // store section
    public function store_section(Request $request, Teacher $teacher)
    {
        // store all inputs in a variable
        $formInputs = $request->all();

        // create validation for the request
        $validator = Validator::make(
            $formInputs,
            [
                'section_name' => ['required'],
                'year_level' => ['required'],
                'course' => ['required']
            ]
        );

        // if validation fails, redirect back
        // show an alert popup of the error message
        if ($validator->fails()) {
            return
                back()
                ->with([
                    'toast' => [
                        'message' => 'Please, enter valid inputs.',
                        'type' => 'warning'
                    ]
                ]);
        }

        // insert teacher ID to forms inputs
        $formInputs['teacher_id'] = $teacher->id;

        // insert new sections row
        // show an alert popup of the error message when fails
        if (!Section::create($formInputs)) {
            return
                back()
                ->with([
                    'toast' => [
                        'message' => 'Failed to add new secton.',
                        'type' => 'danger'
                    ]
                ]);
        }

        return
            redirect()
            ->intended(url()->previous())
            ->with([
                'toast' => [
                    'message' => 'Section added successfully.',
                    'type' => 'success'
                ]
            ]);
    }
}
