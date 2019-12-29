@extends('layouts.app')

@section('title', 'All Posts')

@section('content')


  @if($posts->count() < 1)
    <p>No posts :(</p>
  @endif

    <div class="d-flex flex-column">

          <div class="d-flex flex-column align-items-center text-center border-right border-grey home-col ">

                  <h2>All Posts</h2>

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
