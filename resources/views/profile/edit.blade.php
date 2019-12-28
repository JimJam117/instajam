@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Profile</div>

                <div class="card-body">

                    <form action="/profile/{{$user->username}}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('PUT')

                        <div class=" form-group row">

                            <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                            <div class="col-md-6">
                                <input id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') ?? $user->profile->description ?? ""}}" required min="1" max="200">

                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">

                            <label for="url" class="col-md-4 col-form-label text-md-right">Url</label>

                            <div class="col-md-6">
                                <input id="url" type="url" class="form-control @error('url') is-invalid @enderror" name="url"  value="{{ old('url') ?? $user->profile->url ?? "" }}" required autocomplete="url">

                                @error('url')
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
