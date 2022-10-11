<?php

use App\Http\Controllers\AdministrationController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentViewsController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeacherViewsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// index page
Route::get('/', function () {
    return view('index');
})->name('index');

// student views
Route::controller(StudentViewsController::class)->prefix('student/')->group(function () {
    Route::get('/login', 'login')->name('student_login')->middleware('guest:student');
    Route::get('/signup', 'signup')->middleware('guest:student');
    Route::get('/exams', 'exams')->name('student_home')->middleware('auth:student');
    Route::get('/exams/{exam_id}', 'exam')->middleware('auth:student');
    Route::get('/exams/{exam_id}/session', 'session')->middleware('auth:student');
});

// student routes
Route::controller(StudentController::class)->prefix('student/')->group(function () {
    Route::post('/authenticate', 'authenticate')->middleware('guest:student');
    Route::get('/logout', 'logout')->middleware('auth:student');
    Route::post('/exams/{exam_id}/session', 'submit')->middleware('auth:student');
});

// teacher views
Route::controller(TeacherViewsController::class,)->prefix('teacher/')->group(function () {
    Route::get('/login', 'login')->name('teacher_login')->middleware('guest:teacher');
    Route::get('/sections', 'sections')->middleware('auth:teacher');
    Route::get('/sections/{section}/class', 'section')->middleware('auth:teacher');
    Route::get('/sections/{section}/exams', 'exams')->middleware('auth:teacher');
    Route::get('/sections/{section}/exams/create', 'create_exam')->middleware('auth:teacher');
    Route::get('/sections/{section}/students', 'students')->middleware('auth:teacher');
    Route::get('/sections/{section}/students/add', 'add_students')->middleware('auth:teacher');
});

// teacher routes
Route::controller(TeacherController::class)->prefix('teacher/')->group(function () {
    Route::post('/authenticate', 'authenticate');
    Route::get('/logout', 'logout')->middleware('auth:teacher');
    Route::post('/sections/{section}/exams/create', 'store_exam')->middleware('auth:teacher');
});


// administration pages
Route::controller(AdministrationController::class)->prefix('administration/')->group(function () {
    Route::get('/', function () {
        return redirect('/administration/login');
    });
    Route::get('/login', 'login')->name('admin_login')->middleware('guest:admin');
    Route::get('/dashboard', 'dashboard')->middleware('auth:admin');
    Route::get('/teachers', 'teachers')->middleware('auth:admin');
    Route::get('/teachers/add', 'add_teacher')->middleware('auth:admin');
    Route::get('/students', 'students')->middleware('auth:admin');
    Route::get('/sections', 'sections')->middleware('auth:admin');
    Route::get('/teachers/{teacher}', 'display_teacher')->middleware('auth:admin');

    // form requests routes
    Route::post('/teachers/add', 'store_teacher')->middleware('auth:admin');
    Route::post('/teachers/{teacher}/section/add', 'store_section')->middleware('auth:admin');
});


// administration routes
Route::controller(AdministratorController::class)->prefix('administrator/')->group(function () {
    Route::post('/authenticate', 'authenticate');
    Route::get('/logout', 'logout')->middleware('auth:admin');
});


// error 
Route::get('error/{code}', function (int $code) {
    return abort($code);
});
