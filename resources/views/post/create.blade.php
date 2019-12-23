@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/post" enctype="multipart/form-data" class="col-9 offset-2" method="post">
      @csrf
        <div class="row">
          <h1>Add New Post</h1>
        </div>
        <div class=" form-group row">

            <label for="title" class="col-form-label">Title</label>

            <div class="col-md-6">
                <input id="title" type="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title">

                @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class=" form-group row">

            <label for="description" class="col-form-label">Description</label>

            <div class="col-md-6">
                <input id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description">

                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row form-group">
            <label for="image" class="col-form-label">Image</label>
            <div class="col-md-6">
                <input type="file" class="form-control-file" id="image" name="image" required>
                @error('image')
                    <strong>{{ $message }}</strong>
                @enderror
            </div>

        </div>

        <div class="form-group row">
          <button class="btn btn-primary" type="submit" name="button">Add New Post</button>
        </div>
    </form>




</div>
@endsection
