<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category;
use App\Models\Occupation;
use Illuminate\Http\Request;
use App\Models\ProjectStudent;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreProjectStudentRequest;

class FrontController extends Controller
{
    //
    public function index(){
        $courses = Course::with(['students'])->orderBy('id', 'asc')->get();
        return view('front.index', compact('courses'));
    }

    public function project(){
        $projects = ProjectStudent::with(['user'])->orderByDesc('id')->get();
        
        return view('student.projects.index', compact('projects'));
    }

    public function create(){
        $occupations = Occupation::all();
        return view('student.projects.create', [
            'occupations' => $occupations
        ]);
    }

    public function project_store(StoreProjectStudentRequest $request){
        $user = Auth::user();

        DB::transaction(function () use ($request, $user) {

            $validated = $request->validated();

            if ($request->hasFile('proof_project')) {
                $file = $request->file('proof_project');
                $fileName = $file->getClientOriginalName(); // Mendapatkan nama asli file
                $projectPath = $file->storeAs('public/project_students', $fileName); // Menyimpan file ke direktori storage
            
                // Update data $validated dengan nama file yang disimpan
                $validated['proof_project'] = $projectPath;
            }

            $validated['user_id'] = $user->id;
            $validated['deadline'] = Carbon::now()->addDays(3);
            $validated['is_done'] = false;

            $transaction = ProjectStudent::create($validated);
        });

        return redirect()->route('dashboard.project');

    }
    
    public function video(){
        $courses = Course::with(['students'])->orderByDesc('id')->get();
        return view('front.video', compact('courses'));
    }

    public function details_video(Course $course){
        return view('front.details_video', compact('course'));
    }

    public function video_course(Course $course, $courseVideoId){
        $user = Auth::user();

        $video = $course->course_videos->firstWhere('id', $courseVideoId);

        $user->courses()->syncWithoutDetaching($course->id);

        return view('front.course_video', compact('course', 'video'));
    }

    public function modul(){
        $courses = Course::with(['students'])->orderByDesc('id')->get();
        return view('front.modul', compact('courses'));
    }

    public function details_modul(Course $course){
        return view('front.details_modul', compact('course'));
    }


}
