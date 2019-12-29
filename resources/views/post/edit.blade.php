@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Post</div>

                <div class="card-body">

                    <form action="/post/{{$post->id}}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('PUT')


                        <div class="form-group row">

                            <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $post->title ?? "" }}" required>

                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class=" form-group row">

                            <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                            <div class="col-md-6">
                                <input id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') ?? $post->description ?? ""}}" required
                                min="1" max="200">

                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>




                        <!-- Profile image upload -->
                        <div class="row form-group">
                            <label for="image" class="col-form-label col-md-4 col-form-label text-md-right">Image</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control-file" id="image" name="image">
                                @error('image')
                                <strong>{{ $message }}</strong>
                                @enderror
                            </div>

                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">

                                <button class="btn btn-primary text-center align-items-center" type="submit" name="button">Save Changes</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection
