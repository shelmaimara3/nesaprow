<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreStudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $students = Student::with('user')->paginate(10);
        return view('admin.students.index', [
            'students' => $students
         ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Student $student)
    {
        //
        $students = Student::orderByDesc('id')->get();
        return view('admin.students.create',[
            'students' => $students
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        //
        $validated = $request->validated();

        $user = User::where('email', $validated['email'])->first();

        if(!$user){
            return back()->withErrors([
                'email' => 'Data tidak ditemukan'
            ]);
        }

        DB::transaction(function () use ($user, $validated){

            $validated['user_id'] = $user->id;
            $validated['is_active'] = true;

            Student::create($validated);

        });

        return redirect()->route('dashboard.students.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
        DB::beginTransaction();
        
        try {
            $student->delete();

            $user = \App\Models\User::find($student->user_id);
            DB::commit();

            return redirect()->back();
        } 
        catch (\Exception $e) {
            DB::rollBack();
            $error = ValidationException::withMessages([
                'system_error' => ['System error!' . $e->getMessage()],
            ]);
            throw $error;
        }
    }
}
