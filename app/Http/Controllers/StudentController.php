<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;

class StudentController extends Controller
{
    private $columns =['studentName', 'age'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$student = Student::get();
        $student = DB::table('students')->get();
        return view('students', compact('student')); #return view('name of view', compact('name of variable'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addStudent'); //name of the form
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Student::create($request->only($this->columns));
        return redirect('students');
        // $Student = new Student();
        // $Student->studentName = $request->studentName;
        // $Student->age = $request->age;
        // $Student->save();
        // return 'Student inserted successfully';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Fetch the student with the given ID from the 'students' table
        $student = DB::table('students')->where('id', $id)->first();
        // Pass the student data to the 'showStudent' view
        return view('showStudent', ['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        #to show the form and the data of id
        // $student = Student::findOrFail($id);
        $student = DB::table('students')->where('id', $id)->first();
        return view('editStudent', ['student' => $student]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Student::where('id', $id)->update($request->only($this->columns));
        $Student = DB::table('students')
                  ->where('id', $id)
                  ->update([
                      'studentName' => $request->input('studentName'),
                      'age' => $request->input('age')
                  ]);
        return redirect('students');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $Student = DB::table('students')
                  ->where('id', $id)
                  ->delete();
        return redirect('students');
        // $id = $request->id;
        // Student::where('id', $id)->delete();
    }
}
