@extends('admin.home')
@section('intro')
     <div class="col-md-12">
                <h1>Welcome to the Feature Page</h1>
                <p>This is a simple Feature page.</p>
     </div>
@endsection
@section('content')
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Title</h4>
                <p class="card-text">Text</p>
            </div>
        </div>
    </div>
     <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Title</h4>
                <p class="card-text">Text</p>
            </div>
        </div>
    </div>
     <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Title</h4>
                <p class="card-text">Text</p>
            </div>
        </div>
    </div>
@endsection
@section('content2')
<div class="col-md-12">
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
    </div>
</div>
    
@endsection