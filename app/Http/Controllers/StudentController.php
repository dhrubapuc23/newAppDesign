<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function create()
    {
        return view('student');
    }
    public function store(Request $req)
    {
        $req->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email',
            'semester' => 'required|min:1|max:8',
        ],
        [
            'name.required' => 'Student Name is required',
            'name.min' => 'Min character at least 3'
        ]);
        DB::table('students')->insert([
            'student_name' => $req->name,
            'email' => $req->email,
            'semester' => $req->semester,
        ]);

        dd('data saved');
    }
    public function showData()
    {
        $students = DB::table('students')->get();
        return view('studentList', ['students' => $students]);
    }   
}
