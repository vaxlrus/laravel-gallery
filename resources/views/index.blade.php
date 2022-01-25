@extends('layout')

@section('content')

<div class="container">
    <div class="row">
        <h1 align='center'>Main Page</h1>
    </div>

    <div class="row">
        @foreach($images as $image)
            <div class="col-md-3 gallery-item">
                <div>
                    <img src="/uploads/{{$image->image}}" alt="img-thumbnail" class="img-thumbnail">
                    <a class="btn btn-info" href="/show/{{$image->id}}">Show</a>
                    <a class="btn btn-warning" href="/edit/{{$image->id}}">Edit</a>
                    <a class="btn btn-danger" onclick="return confirm('Delete this image?')" href="/delete/{{$image->id}}">Delete</a>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection