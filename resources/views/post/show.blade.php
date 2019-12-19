@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-6 p-5">
            <div class="img_container" style="background-image: url({{$post->image}});"></div>
            <img class="w-100" src="{{$post->image}}" alt="" style="background-color:#ddd;">
        </div>

        <div class="col-6 pt-5 pr-5 pl-5" style="">
            <div class="row justify-content-between align-items-center">
                <a class="d-flex align-items-center" href="/profile/{{$post->user->username}}">

                    <img class="rounded-circle p-3" style="height: 5em; width: 5em;" src=" {{$post->user->profile->image ?? "/img/jam.jpg"}}" alt="{{$post->user->name}}">

                    <h3>{{$post->user->username}}</h3>
                </a>
              
                <a href="#"><h3>Follow</h3></a>
            </div>


            <div class="row" style="">
                <h3>{{$post->title}}</h3>
            </div>
            <div class="row" style="">
                <p>This is a placeholder discription: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores sit blanditiis aliquam nostrum molestias ipsa quidem, ea minus. Tempora dignissimos molestiae numquam ipsum quia, magni libero
                    unde exercitationem deleniti, odio alias. Saepe nesciunt perferendis rerum a corporis maiores ratione quo amet consequatur placeat sequi incidunt ipsa, sit qui, veniam mollitia?</p>
            </div>
            <div class="row" style="">
                <em>This post was created at: {{$post->created_at}}</em>
            </div>
        </div>
        <hr>
    </div>
</div>
@endsection
