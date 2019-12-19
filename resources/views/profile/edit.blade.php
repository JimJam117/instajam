@extends('layouts.app')

@section('content')
<div class="container">
  <form action="/profile/{{$user->username}}" enctype="multipart/form-data" class="col-9 offset-2" method="post">
    @csrf
    @method('PUT')
      <div class="row">
        <h1>Edit Profile</h1>
      </div>

      <!--Name-->
      <div class=" form-group row">
          <label for="description" class="col-form-label">Description</label>
          <div class="col-md-6">
              <input id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') ?? $user->profile->description ?? ""}}" required autocomplete="description">

              @error('description')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
          </div>
      </div>

      <!--Username-->
      <div class=" form-group row">
          <label for="url" class="col-form-label">Url</label>
          <div class="col-md-6">
              <input id="url" type="url" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') ?? $user->profile->url ?? "" }}" required autocomplete="url">

              @error('url')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
          </div>
      </div>




      <!-- Profile image upload
      <div class="row form-group">
          <label for="image" class="col-form-label">Image</label>
          <div class="col-md-6">
              <input type="file" class="form-control-file" id="image" name="image" required>
              @error('image')
                  <strong>{{ $message }}</strong>
              @enderror
          </div>

      </div>-->

      <div class="form-group row">
        <button class="btn btn-primary" type="submit" name="button">Save Changes</button>
      </div>
  </form>


</div>
@endsection
