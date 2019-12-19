@extends('layouts.app')

@section('content')
<div class="container">

    <div class="col-md-8 offset-md-2">
        <div class="row pt-5 justify-content-center">
            <img class="" src="/ico/jam.ico" alt="jam.ico">
        </div>
        <div class="row pt-3 justify-content-center">
            <h1><strong>Instajam</strong></h1>
        </div>
        <div class="row pt-3 justify-content-center">
            <h3>An instagram clone for jam enthusiasts</h3>
        </div>
        <div class="row pt-1 justify-content-center">
            <h4><em>(Or more accuratly my first laravel app)</em></h4>
        </div>
        <div class="row pt-5 ml-15 mr-15 justify-content-between">

            @if (Auth::guest())
            <button class="btn btn-primary btn-lg btn-block" type="button" name="toHomePage" onclick="window.location.href = '{{ route('login') }}';">
                <h3>Login</h3>
            </button>


            <button class="btn btn-primary btn-lg btn-block" type="button" name="toHomePage" onclick="window.location.href = '{{ route('register') }}';">
                <h3>Register</h3>
            </button>
            @else
            <button class="btn btn-primary btn-lg btn-block" type="button" name="toHomePage" onclick="window.location.href = '/profile/';">
                <h3>My Profile</h3>
            </button>
            <button class="btn btn-primary btn-lg btn-block" type="button" name="toHomePage" onclick="document.getElementById('logout-form').submit();">
                <h3>Logout</h3>
            </button>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @endif


        </div>
    </div>
</div>


@endsection
