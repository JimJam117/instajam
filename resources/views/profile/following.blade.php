@extends('layouts.app')

@section('title', "Followed by $user->username")

@section('content')

<div class="container">

    <h1>Who {{$user->username}} is following | <small>{{$user->following->count()}}</small></h1>

    @if($user->following->count() < 1) <p>No one's here :(</p>
            @endif


            @foreach ($user->following as $follower)
            <hr>
            <a class="profile-link row d-flex" href="/profile/{{$follower->user->username}}">

                <div class="profile-link-img-container col-3">
                    <img src="{{$follower->returnImage()}}" alt="{{$follower->user->username}}">

                </div>

                <div class="col-9 ">
                    <h2>{{$follower->user->username}}</h2>
                    <p>{{$follower->description}}</p>
                </div>

            </a>

            @endforeach




</div>

@endsection
