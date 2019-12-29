@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="d-flex col-3 home-col">
            <img src="{{$user->profile->returnImage()}}" alt="jam" class="rounded-circle profile-img">
        </div>
        <div class="col-9 home-col">
            <div class="profile-details pt-5 d-flex justify-content-between align-items-baseline">
                <h2>{{$user->username}}</h2>
                @can('update', $user->profile)
                <a class="btn btn-primary" href="/post/create">Add New Post</a>
                @endcan

                <!--if user is auth'd then show button, as long as the auth'd user id isn't the same as this user's id-->
                <!--also show if the user isn't auth'd-->
                @if (Auth::User())
                @if (Auth::User()->id != $user->id)
                <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                @endif
                @else
                <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                @endif

            </div>
            @can('update', $user->profile)
            <div class="pt-2 d-flex justify-content-between align-items-baseline">
                <a class="btn btn-primary" href="/profile/{{$user->username}}/edit">Edit Profile</a>
            </div>
            @endcan
            <div>

                <strong>{{$user->posts()->count()}}</strong> Posts

                |
                <a href="/{{$user->username}}/followers" class="text-dark">
                    <strong>{{$user->profile->followers()->count()}}</strong> Followers
                </a>
                |
                <a href="/{{$user->username}}/following" class="text-dark">
                    <strong>{{$user->following()->count()}}</strong> Following
                </a>
            </div>
            <div class="pt-3"><strong>{{$user->name}}</strong></div>
            <div class="">{{$user->profile->description ?? 'No Description Yet'}}</div>
            @isset($user->profile->url)
                <div><a href="{{$user->profile->url}}">{{$user->profile->url}}</a></div>
                @endisset
                @empty($user->profile->url)
                    <div>
                        <p>No link yet</p>
                    </div>
                @endempty

        </div>


    </div>
    <hr>


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
@endsection
