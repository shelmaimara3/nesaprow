<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\CourseStudent;
use App\Models\UserLoginTime;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index(){

        $user = Auth::user();
        $coursesQuery = Course::query();

        // Query untuk UserLoginTime
        $userLoginTimesQuery = UserLoginTime::query();
        $userLoginTimes = $userLoginTimesQuery->paginate(5); // Menambahkan pagination

        // data yang ditampilkan apabila login sbg teacher
        
        $students = CourseStudent::whereIn('course_id', $coursesQuery->select('id'))
        ->distinct('user_id') //membuat data menjadi lebih unik
        ->count('user_id'); //menghitung kelas untuk user yg sama

        $courses = $coursesQuery->count();
        $categories = Category::count();
        $teachers = Teacher::count();


        return view('dashboard', compact('categories', 'courses', 'students', 'teachers', 'userLoginTimes'));
    }
}
