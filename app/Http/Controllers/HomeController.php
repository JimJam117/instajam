<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();

        $posts = [];
        foreach ($user->following as $following) {
          foreach($following->user->posts as $post){
            $posts[] = $post;
          }
        }

        return view('home.index', compact('user', 'posts'));
    }
}
