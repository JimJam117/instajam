@extends('layouts.app')

@section('content')


    <div class="d-flex flex-column">

          <div class="d-flex flex-column align-items-center text-center border-right border-grey home-col ">

              <img src="{{$user->profile->returnImage()}}" alt="jam" class="home-pp rounded-circle p-5 m-2">
              <a href="/profile" class="text-dark">
                  <h2>{{$user->username}}</h2>
              </a>
              <a href="/post/create">New Post</a>
              <a href="/following">Following</a>

          </div>

            <div class="home-col">
            <div class="posts-display">
                @foreach($posts as $post)
                <a href="/post/{{$post->id}}" class="post-display" style="text-decoration: none; background-image: url({{$post->image}});">
                    <div class="post-display-filter">
                        <h2>{{$post->title}}</h2>
                    </div>
                </a>
                @endforeach
        </div>
      </div>




    </div>

@endsection
