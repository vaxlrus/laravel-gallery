@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Edit image</h1>

            <img src="/uploads/{{$imageUrl}}" alt="image name" class="img-thumbnail img-gallery">

            <form action="/update/{{$imageId}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="form-control">
                    <input type="file" name="image">
                </div>

                <div class="form-control">
                    <button type="submit" class="btn btn-warning">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection