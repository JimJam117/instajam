@extends('layouts.app')

@section('content')

<div class="container">

  <h1>{{$user->username}}'s following: {{$user->following->count()}}</h1>

  @foreach ($user->following as $follower)
      <a href="/profile/{{$follower->user->username}}">
        <h2>{{$follower->user->username}}</h2>
        <img src="{{$follower->returnImage()}}" alt="">
      </a>
  @endforeach

</div>

@endsection
