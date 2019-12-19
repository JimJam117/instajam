@extends('layouts.app')

@section('content')
<h2>Title</h2>
{{$post->title}}
<h2>User</h2>
{{$post->user->username}}
<h2>Img</h2>
<img src="{{$post->image}}" alt="">

@endsection
