<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Section;
use App\Models\SectionStudent;
use App\Models\Student;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        if ($section->teacher_id != Auth::guard('teacher')->id()) {
            return abort(403);
        }
        return view('teacher.section', [
            'section' => $section
        ]);
    }

    // display exams
    public function exams(Section $section)
    {
        $exams = DB::table('exams')
            ->select('exams.*')
            ->selectRaw('(SELECT COUNT(id) FROM submissions WHERE exam_id = exams.id) AS submission_count')
            ->get();

        return view('teacher.exams', [
            'section' => $section,
            'exams' => $exams,
        ]);
    }

    //crate exam page
    public function create_exam(Section $section)
    {
        return view('teacher.create-exam', [
            'section' => $section
        ]);
    }

    // display students
    public function students(Section $section)
    {
        return view('teacher.students', [
            'section' => $section,
            'students' => Student::join("section_students", "students.id", "=", "section_students.student_id")
                ->where("section_students.section_id", "=", $section->id)
                ->get()
        ]);
    }

    public function add_students(Section $section)
    {
        return view('teacher.add_student', [
            'section' => $section
        ]);
    }
}
