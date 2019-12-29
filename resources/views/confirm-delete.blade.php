@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Delete Post: {{$post->title}}</div>

                <div class="card-body">

                    <form action="/post/{{$post->id}}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('DELETE')

                        <p class="col-md-4 col-form-label">Please Confirm Deletion</p>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                            <button class="btn btn-danger text-center align-items-center" type="submit" name="button">Confirm</button>
                        </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection
