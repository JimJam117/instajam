@extends('layouts.app')

@section('content')

<div class="container">

  <h1>All Profiles</h1>

  @if($users->count() < 1)
    <p>No porfiles :(</p>
  @endif

  @foreach ($users as $user)
      <hr>
      <a href="/profile/{{$user->username}}">
        <h2>{{$user->username}}</h2>
        <img src="{{$user->profile->returnImage()}}" alt="">
      </a>
  @endforeach

</div>

@endsection
