@extends('admin.home')

@section('content')
    <div class="col-md-4 offset-md-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Student Information</h4>
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('student.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" name="name" id="name" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" name="email" id="email" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                      <label for="semester">Semester</label>
                      <input type="number" name="semester" id="semester" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                      <input type="submit" value="save" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection