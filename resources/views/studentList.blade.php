@extends('admin.home')
@section('content')
    <div class="col">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Semester</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{$student->id}}</td>
                        <td>{{$student->student_name}}</td>
                        <td>{{$student->email}}</td>
                        <td>{{$student->semester}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection