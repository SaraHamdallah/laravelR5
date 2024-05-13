<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    private $columns =['studentName', 'age'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = Student::get();
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
        // $Student = new Student();
        // $Student->studentName = $request->studentName;
        // $Student->age = $request->age;
        // $Student->save();
        // return 'Student inserted successfully';
        Student::create($request->only($this->columns));
        return redirect('students');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
