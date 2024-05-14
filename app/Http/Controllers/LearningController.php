<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseAnswer;
use Illuminate\Http\Request;
use App\Models\StudentAnswer;
use App\Models\CourseQuestion;
use Illuminate\Support\Facades\Auth;

class LearningController extends Controller
{
    //
    public function index(){

        $user = Auth::user();

        // variabel untuk mendapatkan kelas yng dimiliki oleh user tsb
        $my_courses = $user->courses()->with('category')->orderBy('id', 'DESC')->get(); 

        foreach ($my_courses as $course) {
            $totalQuestionsCount = $course->questions()->count();

            $answeredQuestionsCount = StudentAnswer::where('user_id', $user->id)
            ->whereHas('question', function ($query) use ($course){
                $query->where('course_id', $course->id);
            })->distinct()->count('course_question_id');

            # pengguna bisa melanjutkan menjawab pertanyaan yang terlewat sebelumnya
            if ($answeredQuestionsCount < $totalQuestionsCount) {
                $firstUnansweredQuestion = CourseQuestion::where('course_id', $course->id)
                ->whereNotIn('id', function($query) use ($user) {
                    $query->select('course_question_id')->from('student_answers')
                    ->where('user_id', $user->id);
                })->orderBy('id', 'asc')->first();

                $course->nextQuestionId = $firstUnansweredQuestion ? $firstUnansweredQuestion->id : null;
            }
            else {
                $course->nextQuestionId = null;
            }
        }

        return view('student.courses.index', [
            'my_courses' => $my_courses,
        ]);
    }

    public function learning(Course $course, $question){
        $user = Auth::user();

        # cek hak akses student 
        $isEnrolled = $user->courses()->where('course_id', $course->id)->exists();
        
        if(!$isEnrolled){
            abort(404);
        }

        $currentQuestion = CourseQuestion::where('course_id', $course->id)->where('id', $question)->firstOrFail();
        
        return view('student.courses.learning', [
            'course' => $course,
            'question' =>$currentQuestion,
        ]);
    }

    public function learning_finished(Course $course){
        return view('student.courses.learning_finished', [
            'course' => $course,
        ]);
    }

    public function learning_raport(Course $course){

        $userId = Auth::id();

        // Mendapatkan jawaban siswa untuk pertanyaan dalam kursus yang dipilih
        $studentAnswers = StudentAnswer::with('question')
        ->whereHas('question', function ($query) use ($course){
            $query->where('course_id', $course->id);
        })->where('user_id', $userId)->get();

        // Menghitung total pertanyaan dalam kursus
        $totalQuestions = CourseQuestion::where('course_id', $course->id)->count();

        // Menghitung jumlah jawaban yang benar
        $correctAnswersCount = $studentAnswers->where('answer', 'correct')->count();

        // Memeriksa apakah siswa lulus (menjawab semua pertanyaan dengan benar)
        $passed = $correctAnswersCount == $totalQuestions;

        $correctAnswers = CourseAnswer::where('is_correct', 1)
        ->whereIn('course_question_id', $studentAnswers->pluck('course_question_id'))
        ->get();

        return view('student.courses.learning_raport', [
            'passed' => $passed,
            'course' => $course,
            'studentAnswers' => $studentAnswers,
            'totalQuestions' => $totalQuestions,
            'correctAnswersCount' => $correctAnswersCount,
            'correctAnswers' => $correctAnswers,
        ]);
    }
}
