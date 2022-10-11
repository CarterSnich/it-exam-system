<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Section;
use App\Models\SectionStudent;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    // exams
    public function exams()
    {
        $exams =
            Exam::select([
                'exams.*'
            ])
            ->rightJoin('section_students', 'exams.section_id', '=', 'section_students.section_id')
            ->where('section_students.student_id', '=', Auth::guard('student')->user()->id)
            ->get();

        return view('student.exams', [
            'exams' => $exams
        ]);
    }

    public function exam(int $exam_id)
    {
        $student_id = Auth::guard('student')->user()->id;
        $exam =
            Exam::select([
                'exams.*'
            ])
            ->rightJoin('section_students', 'exams.section_id', '=', 'section_students.section_id')
            ->where('section_students.student_id', '=', $student_id)
            ->where('exams.id', '=', $exam_id)
            ->first();

        $submission =
            Submission::where('exam_id', '=', $exam->id)
            ->where('student_id', '=', $student_id)
            ->first();

        return view('student.exam', [
            'exam' => $exam,
            'submission' => $submission
        ]);
    }

    public function session(int $exam_id)
    {
        $student_id = Auth::guard('student')->user()->id;
        $exam =
            Exam::select([
                'exams.*'
            ])
            ->rightJoin('section_students', 'exams.section_id', '=', 'section_students.section_id')
            ->where('section_students.student_id', '=', $student_id)
            ->where('exams.id', '=', $exam_id)
            ->first();

        $submission = Submission::where('exam_id', '=', $exam->id)
            ->where('student_id', '=', $student_id)
            ->first();


        if ($submission) {
            return
                redirect("/student/exams/{$exam->id}/")
                ->with([
                    'toast' => [
                        'type' => 'warning',
                        'message' => "You've already submitted."
                    ]
                ]);
        }

        return view('student.session', [
            'title' => $exam->title,
            'description' => $exam->description,
            'items' => $exam->items
        ]);
    }
}
