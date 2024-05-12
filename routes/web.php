<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LearningController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CourseModulController;
use App\Http\Controllers\CourseVideoController;
use App\Http\Controllers\CourseStudentController;
use App\Http\Controllers\StudentAnswerController;
use App\Http\Controllers\CourseQuestionController;
use App\Http\Controllers\ProjectStudentController;

Route::get('/', [FrontController::class, 'index'])->name('front.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('dashboard')->name('dashboard.')->group(function () {

        Route::resource('categories', CategoryController::class)
        ->middleware('role:teacher'); // admin.categories.index

        Route::resource('teachers', TeacherController::class)
        ->middleware('role:teacher'); 

        // menampilkan seluruh data student
        Route::resource('students', StudentController::class)
        ->middleware('role:teacher');

        Route::resource('courses', CourseController::class)
        ->middleware('role:teacher');

        Route::resource('project_students', ProjectStudentController::class)
        ->middleware('role:teacher');

        // menambahkan video
        Route::get('/courses/add/video/{course:id}', [CourseVideoController::class, 'create'])
        ->middleware('role:teacher')
        ->name('course.add_video');

        Route::post('/courses/add/video/save/{course:id}', [CourseVideoController::class, 'store'])
        ->middleware('role:teacher')
        ->name('course.add_video.save');

        Route::resource('course_videos', CourseVideoController::class)
        ->middleware('role:teacher');

        // menambahkan modul
        Route::get('/courses/add/modul/{course:id}', [CourseModulController::class, 'create'])
        ->middleware('role:teacher')
        ->name('course.add_modul');

        Route::post('/courses/add/modul/save/{course:id}', [CourseModulController::class, 'store'])
        ->middleware('role:teacher')
        ->name('course.add_modul.save');

        Route::resource('course_moduls', CourseModulController::class)
        ->middleware('role:teacher');

        Route::get('/courses/question/create/{course}', [CourseQuestionController::class, 'create'])
        ->middleware('role:teacher')
        ->name('course.create.question');

        Route::post('/courses/question/save/{course}', [CourseQuestionController::class, 'store'])
        ->middleware('role:teacher')
        ->name('course.create.question.store');
        
        Route::resource('course_questions', CourseQuestionController::class)
        ->middleware('role:teacher');

        Route::get('/courses/students/show/{course}', [CourseStudentController::class, 'index'])
        ->middleware('role:teacher')
        ->name('course.course_students.index');

        Route::get('/courses/students/create/{course}', [CourseStudentController::class, 'create'])
        ->middleware('role:teacher')
        ->name('course.course_students.create');

        Route::post('/courses/students/save/{course}', [CourseStudentController::class, 'store'])
        ->middleware('role:teacher')
        ->name('course.course_students.store');

        //details course video
        Route::get('/video', [FrontController::class, 'video'])
        ->name('video')
        ->middleware('role:student|teacher');
        
        Route::get('/video/{course:slug}', [FrontController::class, 'details_video'])
        ->name('details.video')
        ->middleware('role:student|teacher');
        
        Route::get('/video/{course}/{courseVideoId}', [FrontController::class, 'video_course'])
        ->name('video_course')
        ->middleware('role:student|teacher');   

        // details modul materi
        Route::get('/modul', [FrontController::class, 'modul'])
        ->name('modul')
        ->middleware('role:student|teacher');

        Route::get('/modul/details/{course:slug}', [FrontController::class, 'details_modul'])
        ->name('front.modul')
        ->middleware('role:student|teacher');

        // project student
        Route::get('/project', [FrontController::class, 'project'])->name('project')->middleware('role:student');

        Route::get('/project/add', [FrontController::class, 'create'])->name('project.create')->middleware('role:student');
    
        Route::post('/project/store', [FrontController::class, 'project_store'])->name('project.store')
        ->middleware('role:student');

        Route::get('/learning/finished/{course}', [LearningController::class, 'learning_finished'])
        ->middleware('role:student')
        ->name('learning.finished.course');

        Route::get('/learning/raport/{course}', [LearningController::class, 'learning_raport'])
        ->middleware('role:student')
        ->name('learning.raport.course');

        // menampilkan beberapa kelas yg diberikan oleh guru
        Route::get('/learning', [LearningController::class, 'index'])
        ->middleware('role:student')
        ->name('learning.index');

        // menampilkan untuk melihat pertanyaan
        Route::get('/learning/{course}/{question}', [LearningController::class, 'learning'])
        ->middleware('role:student')
        ->name('learning.course');

        Route::post('/learning/{course}/{question}', [StudentAnswerController::class, 'store'])
        ->middleware('role:student')
        ->name('learning.course.answer.store');     

    });

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

});

require __DIR__.'/auth.php';
