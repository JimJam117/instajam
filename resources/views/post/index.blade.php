@extends('layouts.app')

@section('content')

<div class="container">

  @if($user->posts()->count() < 1)
    <p>No posts :(</p>
  @endif

  @foreach ($user->posts as $post)
    <hr>
    <h2>{{$post->title}}</h2>
    <p>{{$post->description}}</p>
    <img style="width:100px;" src="{{$post->image}}" alt="{{$post->title}}">
  @endforeach

</div>

@endsection
