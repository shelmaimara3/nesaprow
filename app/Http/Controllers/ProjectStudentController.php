<?php

namespace App\Http\Controllers;

use App\Models\Occupation;
use App\Models\ProjectGuide;
use Illuminate\Http\Request;
use App\Models\ProjectStudent;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreGuideProjectRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProjectStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $projects = ProjectStudent::with(['user'])->orderByDesc('id')->paginate(10);

        return view('admin.project_students.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $projectGuides = ProjectGuide::all();
        return view('admin.project_students.create', compact('projectGuides'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGuideProjectRequest $request)
    {
        //

        DB::transaction(function () use ($request) {

            $validated = $request->validated();

            if ($request->hasFile('guide_project')) {
                $file = $request->file('guide_project');
                $fileName = $file->getClientOriginalName(); // Mendapatkan nama asli file
                $guidePath = $file->storeAs('public/guidance', $fileName); // Menyimpan file ke direktori storage
            
                // Update data $validated dengan nama file yang disimpan
                $validated['guide_project'] = $guidePath;
            }

            $projectGuide = ProjectGuide::create($validated);

        });

        return redirect()->back();
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

    public function destroy($id)
    {
        try {
            $projectGuide = ProjectGuide::findOrFail($id);
            
            $projectGuide->delete();

            return redirect()->back();
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    }
}
