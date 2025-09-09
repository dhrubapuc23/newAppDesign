@extends('admin.home')
@section('content')
        <div class="col">
            <h2>Student Record</h2>
        @session('success')
            <div class="alert alert-success" role="alert">
                {{session('success')}}
            </div>
        @endsession
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Semester</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{$student->id}}</td>
                        <td>{{$student->student_name}}</td>
                        <td>{{$student->email}}</td>
                        <td>{{$student->semester}}</td>
                        <td><a href="{{route('student.edit',[$student->id])}}" class="btn btn-primary">Edit</a></td>
                        <td><a href="{{route('student.delete',[$student->id])}}" class="btn btn-danger" onclick="confirmDelete(event)">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!!$students->withQueryString()->links('pagination::bootstrap-4')!!}
    </div>
    <script>
        function confirmDelete(event) {
            if(!confirm('Are you sure to delete this record?')) {
                event.preventDefault();
            }
        }
    </script>
@endsection