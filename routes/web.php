<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LearningController;
use App\Http\Controllers\CourseVideoController;
use App\Http\Controllers\CourseStudentController;
use App\Http\Controllers\StudentAnswerController;
use App\Http\Controllers\CourseQuestionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('dashboard')->name('dashboard.')->group(function () {

        Route::resource('courses', CourseController::class)
        ->middleware('role:teacher');

        Route::get('/course/question/create/{course}', [CourseQuestionController::class, 'create'])
        ->middleware('role:teacher')
        ->name('course.create.question');

        Route::post('/course/question/save/{course}', [CourseQuestionController::class, 'store'])
        ->middleware('role:teacher')
        ->name('course.create.question.store');
        
        Route::resource('course_questions', CourseQuestionController::class)
        ->middleware('role:teacher');

        Route::get('/course/students/show/{course}', [CourseStudentController::class, 'index'])
        ->middleware('role:teacher')
        ->name('course.course_students.index');

        Route::get('/course/students/create/{course}', [CourseStudentController::class, 'create'])
        ->middleware('role:teacher')
        ->name('course.course_students.create');

        Route::post('/course/students/save/{course}', [CourseStudentController::class, 'store'])
        ->middleware('role:teacher')
        ->name('course.course_students.store');

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

        // menambahkan video
        Route::get('/learning/{course}/{courseVideoId}', [LearningController::class, 'learning'])
        ->name('front.learning')
        ->middleware('role:student|teacher');

        Route::get('/add/video/{course:id}', [CourseVideoController::class, 'create'])
        ->middleware('role:teacher')
        ->name('course.add_video');

        Route::post('/add/video/save/{course:id}', [CourseVideoController::class, 'store'])
        ->middleware('role:teacher')
        ->name('course.add_video.save');

        Route::resource('course_videos', CourseVideoController::class)
        ->middleware('role:teacher');
        

    });
});

require __DIR__.'/auth.php';
