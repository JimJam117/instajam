@extends('layouts.app')

@section('content')

<div class="container">

  <h1>{{$user->username}}'s followers: {{$user->profile->followers->count()}}</h1>

  @foreach ($user->profile->followers as $follower)
      <a href="/profile/{{$follower->username}}">
        <h2>{{$follower->username}}</h2>
        <img src="{{$follower->profile->returnImage()}}" alt="">
      </a>
  @endforeach

</div>

@endsection
