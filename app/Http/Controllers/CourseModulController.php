<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseModul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreCourseModuleRequest;
use App\Http\Requests\UpdateCourseModuleRequest;

class CourseModulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Course $course)
    {
        //
        return view('admin.course_moduls.create', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseModuleRequest $request, Course $course)
    {
        //

        DB::transaction(function () use ($request, $course) {

            $validated = $request->validated();

            if ($request->hasFile('path_modul')) {
                $file = $request->file('path_modul');
                $fileName = $file->getClientOriginalName(); // Mendapatkan nama asli file
                $modulPath = $file->storeAs('public/modul', $fileName); // Menyimpan file ke direktori storage
            
                // Update data $validated dengan nama file yang disimpan
                $validated['path_modul'] = $modulPath;
            }

            $validated['course_id'] = $course->id;

            $transaction = CourseModul::create($validated);

        });

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(CourseModul $courseModul)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseModul $courseModul)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseModul $courseModul)
    {
        //
        DB::beginTransaction();

        try{
            $courseModul->delete();
            DB::commit();

            return redirect()->back();
        } catch (Exception $e){
            DB::rollback();

            return redirect()->back()->with('error', 'Terjadi Kesalahan');
        }
    }
}
