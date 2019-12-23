@extends('layouts.app')

@section('content')

<div class="container">

  @if($posts->count() < 1)
    <p>No posts :(</p>
  @endif

  @foreach ($posts as $post)
    <hr>
    <h2>{{$post->title}}</h2>
    By: <a href="/profile/{{$post->user->username}}">{{$post->user->username}}</a>
    <p>{{$post->description}}</p>
    <img style="width:100px;" src="{{$post->image}}" alt="{{$post->title}}">
  @endforeach

</div>

@endsection
