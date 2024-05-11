<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\StudentAnswer;
use App\Models\UserLoginTime;
use App\Models\CourseQuestion;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index(){

        $user = Auth::user();

        if ($user->hasRole('teacher')) {
            return $this->teacherDashboard($user);
        } else {
            return $this->studentDashboard($user);
        }   

    }

    private function teacherDashboard($user)
    {

        $categories = Category::count();
        $courses = Course::count();
        $userLoginTimes = UserLoginTime::paginate(5);
        $teachers = Teacher::count();
        $students = Student::count();
        

        return view('dashboard', compact('categories', 'courses', 'students', 'teachers', 'userLoginTimes'));
    }

    private function studentDashboard($user)
    {
        $my_courses = $user->courses()->whereHas('category', function ($query) {
            $query->where('name', 'POST TEST');
        })->with('category')->orderBy('id', 'DESC')->get();

        foreach ($my_courses as $course) {
            // Logika untuk siswa
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

        return view('dashboard', compact('my_courses'));
    }
}
