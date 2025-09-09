<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StudentRequest;

class StudentController extends Controller
{
    public function create()
    {
        return view('student');
    }
    public function store(StudentRequest $req)
    {
        // $req->validate([
        //     'name' => 'required|min:3|max:50',
        //     'email' => 'required|email',
        //     'semester' => 'required|min:1|max:8',
        // ],
        // [
        //     'name.required' => 'Student Name is required',
        //     'name.min' => 'Min character at least 3',
        //     'name.max' => 'Max character at most 50',
        //     'email.required' => 'Email is required',
        //     'email.email' => 'Provide a valid email',
        //     'semester.required' => 'Semester is required',
        //     'semester.min' => 'Min semester 1',
        //     'semester.max' => 'Max semester 8',
        // ]);
        DB::table('students')->insert([
            'student_name' => $req->name,
            'email' => $req->email,
            'semester' => $req->semester,
        ]);

        dd('data saved');
    }
    public function showData()
    {
        $students = DB::table('students')->paginate(15);
        return view('studentList', ['students' => $students]);
    }
    
    public function getCourse()
    {
        $result = DB::table('students')
        ->join('courses', 'students.id', '=', 'courses.student_id')
        ->select('students.id','students.student_name', 'courses.course_code', 'courses.course_title')
        ->get();

        dd($result);
    }

    public function edit($id)
    {
        $student = DB::table('students')->find($id);
        return view('edit-student',['student'=>$student]);
    }

    public function update(StudentRequest $req, $id)
    {
        DB::table('students')->where('id',$id)->update([
            'student_name' => $req->name,
            'email' => $req->email,
            'semester' => $req->semester,
        ]);

        return redirect()->route('student.show')->with('success','Student info updated successfully');
    }

    public function delete($id)
    {
        DB::table('students')->where('id',$id)->delete();
        return redirect()->route('student.show')->with('success','Student info deleted successfully');
    }
}
