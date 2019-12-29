@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-6 p-5 home-col">
            <div class="img_container" style="background-image: url({{$post->image}});"></div>
            <img class="w-100" src="{{$post->image}}" alt="" style="background-color:#ddd;">
        </div>

        <div class="col-6 pt-5 pr-5 pl-5 home-col" style="">
            <div class="row justify-content-between align-items-center">
                <a class="d-flex align-items-center" href="/profile/{{$post->user->username}}">

                    <img class="rounded-circle p-3" style="height: 5em; width: 5em;" src=" {{$post->user->profile->image ?? "/img/jam.jpg"}}" alt="{{$post->user->name}}">

                    <h3>{{$post->user->username}}</h3>
                </a>

                <!--if user is auth'd then show button, as long as the auth'd user id isn't the same as this user's id-->
                <!--also show if the user isn't auth'd-->
                @if (Auth::User())
                @if (Auth::User()->id != $post->user->id)
                <follow-button user-id="{{ $post->user->id }}" follows="{{ $follows }}"></follow-button>
                @endif
                @else
                <follow-button user-id="{{ $post->user->id }}" follows="{{ $follows }}"></follow-button>
                @endif


                @if (Auth::User())
                @if (Auth::User()->id == $post->user->id)
                  <a class="btn btn-primary" href="/post/{{$post->id}}/edit">Edit</a>
                  <a class="btn btn-danger" href="/post/{{$post->id}}/delete">Delete</a>
                @endif
                @endif
            </div>


            <div class="row" style="">
                <h3>{{$post->title}}</h3>
            </div>
            <div class="row" style="">
              {!!$post->description!!}
            </div>
            <div class="row" style="">
                <em>This post was created at: {{$post->created_at}}</em>
            </div>
        </div>
        <hr>
    </div>
</div>
@endsection
