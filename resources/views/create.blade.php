@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <h1>Add image</h1>

            <form action="/store" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="file" name="image">
                <div class="form-control">
                    <button type="submit" class="btn btn-success">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

