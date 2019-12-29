@extends('layouts.app')

@section('title', "All Users")

@section('content')

<div class="container">

    <h1>All Profiles</h1>

    @if($users->count() < 1) <p>No profiles :(</p>
            @endif


            @foreach ($users as $user)
            <hr>
            <a class="profile-link row d-flex" href="/profile/{{$user->username}}">

                <div class=" profile-link-img-container col-3">
                    <img src="{{$user->profile->returnImage()}}" alt="{{$user->username}}">

                </div>

                <div class="col-9 ">
                    <h2>{{$user->username}}</h2>
                    <p>{{$user->profile->description}}</p>
                </div>

            </a>

            @endforeach




</div>

@endsection
