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
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">File Path</th>
                <th scope="col">File</th>
            </tr>
        <tbody>
            @foreach ($results as $result)
                <tr>
                    <th scope="row">{{$result->id}}</th>
                    <td>{{$result->filepath}}</td>
                    {{-- <td><a href="{{asset($result->filepath)}}" target="_blank">View File</a></td> --}}
                    <td><img src="{{asset($result->filepath)}}" alt="" srcset="" style="width: 100px;"></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
@endsection