<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StudentRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;

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

    public function search(Request $req)
    {
        $search = $req->search;
        //dd($search);
        $students = DB::table('students')
            ->where('id',$search)
            ->get();
        // $students = DB::table('students')
        //     ->where('id', 'like', "%{$search}%")
        //     // ->orWhere('student_name', 'like', "%{$search}%")
        //     // ->orWhere('email', 'like', "%{$search}%")
        //     // ->orWhere('semester', 'like', "%{$search}%")
        //     ->paginate(15);
        if($students->isEmpty()){
            return redirect()->route('student.show')->with('success','No data found');
        }
        return view('searchstudentList', ['students' => $students]);
    }

    public function fileUploadForm()
    {
        $results = DB::table('files')->get();
        return view('file-upload', ['results' => $results]);
    }

    public function fileUploadSubmit(Request $req)
    {
        // $req->validate([
        //     'file' => 'required|mimes:jpg,jpeg,png,gif,pdf,doc,docx|max:2048'
        // ]);
        $file = $req->file('file');
        $fileName = time().'_'.$file->getClientOriginalName();
        $filePath = $file->storeAs('/', $fileName, 'dir_public');
        DB::table('files')->insert([
            'filepath' => 'uploads/'.$filePath
        ]);
        return back()->with('success','File has been uploaded.');

        // if($req->file()) {
        //     $fileName = time().'_'.$req->file->getClientOriginalName();
        //     // $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
        //     $filePath = $req->file('file')->move(public_path('uploads'), $fileName);

        //     // DB::table('files')->insert([
        //     //     'filepath' => $filePath
        //     // ]);

        //     return back()
        //         ->with('success','File has been uploaded.')
        //         ->with('file', $fileName);
        // }
    }

    public function getPDF()
    {
        $students = DB::table('students')->get();
        $pdf = Pdf::loadView('student-pdf', ['students' => $students]);
        return $pdf->download(time().'student-list.pdf');
    }

    public function sendEmail()
    {
        Mail::to('abc@gmail.com')->send(new TestEmail());
        dd('Email sent');
    }
}
