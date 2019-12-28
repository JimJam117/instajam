@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Who {{$user->username}} is followed by | <small>{{$user->profile->followers->count()}}</small></h1>

    @if($user->profile->followers->count() < 1) <p>No one's here :(</p>
            @endif


            @foreach ($user->profile->followers as $follower)
            <hr>
            <a class="profile-link row d-flex" href="/profile/{{$follower->username}}">

                <div class="profile-link-img-container col-3">
                    <img src="{{$follower->profile->returnImage()}}" alt="{{$follower->username}}">

                </div>

                <div class="col-9 ">
                    <h2>{{$follower->username}}</h2>
                    <p>{{$follower->profile->description}}</p>
                </div>

            </a>

            @endforeach




</div>

@endsection
