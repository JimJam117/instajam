@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-3">
            <img src="/img/jam.jpg" alt="jam" class="rounded-circle p-5" style="height: 20em; width: 20em;">
        </div>
        <div class="col-9">
            <div class="pt-5 d-flex justify-content-between align-items-baseline">
                <h2>{{$user->username}}</h2> <a href="/post/create">Add New Post</a>
            </div>

            <div>
                <strong>13</strong> Posts
                <strong>13</strong> Followers
                <strong>13</strong> Following
            </div>
            <div class="pt-3"><strong>{{$user->name}}</strong></div>
            <div class="">{{$user->profile->description ?? 'No Description Yet'}}</div>
            @isset($user->profile->url)
              <div><a href="{{$user->profile->url}}">{{$user->profile->url}}</a></div>
            @endisset
            @empty($user->profile->url)
              <div><p>No link yet</p></div>
            @endempty

        </div>

        <div class="posts-display">

            @foreach($user->posts as $post)
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
