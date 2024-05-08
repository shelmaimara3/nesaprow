<?php

namespace App\Http\Controllers;

use App\Models\Occupation;
use Illuminate\Http\Request;
use App\Models\ProjectStudent;
use Illuminate\Support\Facades\DB;

class ProjectStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $projects = ProjectStudent::with(['user'])->orderByDesc('id')->get();

        return view('admin.project_students.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ProjectStudent $projectStudent)
    {
        //
        // Mendapatkan informasi file yang diunggah berdasarkan ID
        $fileName = $projectStudent->proof_project; // Misalnya, asumsi 'proof_project' adalah kolom yang menyimpan nama file
        return view('admin.project_students.show', compact('projectStudent', 'fileName'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectStudent $projectStudent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProjectStudent $projectStudent)
    {
        //
        DB::transaction(function () use ($projectStudent) {
            
            $projectStudent->update([
                'is_done' => true
            ]);

        });

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectStudent $projectStudent)
    {
        //
    }
}
