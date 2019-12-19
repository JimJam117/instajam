@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-6 p-5">
      <div class="img_container" style="background-image: url({{$post->image}});"></div>
      <img class="w-100" src="{{$post->image}}" alt="" style="background-color:#ddd;">
    </div>
    <div class="col-6 pt-5 pr-5 pl-5" style="">
      <div class="row" style="">
        <h2>{{$post->title}}</h2>
      </div>
      <div class="row">
        <a href="/profile/{{$post->user->username}}"><strong>{{$post->user->username}}</strong></a>
      </div>
      <hr>
    </div>
  </div>
</div>
@endsection
