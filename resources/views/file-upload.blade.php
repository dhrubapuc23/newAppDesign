@extends('admin.home')
@section('content')
    <div class="col-md-4 offset-md-4">
        <h2>File Upload</h2>
        @session('success')
            <div class="alert alert-success" role="alert">
                {{session('success')}}
            </div>
        @endsession
    <form action="{{route('file.upload.submit')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="file">File</label>
          <input type="file" name="file" id="file" class="form-control" >
          @error('file')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <input type="submit" value="upload" class="btn btn-primary mb-2">
    </form>
    </div>
@endsection