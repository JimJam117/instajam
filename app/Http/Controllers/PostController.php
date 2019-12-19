<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create() {

      return view('post.create');
    }

    public function store() {

      // data to validate
      $data = request()->validate([
          'title' => 'required',
          'image' => 'required|image',

      ]);

      $imgPath = request('image')->store('uploads', 'public');

      // adds the storage dir to the front of the path
      $imgPathWithStorage = '/storage/' . $imgPath;

      // create post assoc with auth'd user
      // uses validated $data var items and also the image path
      auth()->user()->posts()->create([
        'title' => $data['title'],
        'image' => $imgPathWithStorage,
      ]);

      // redirect to the users profile
      $username = auth()->user()->username;
      return redirect("/profile/$username");
    }

    public function show($id){

      $post = \App\Post::where('id', $id)->firstOrFail();

      return view('post.show', compact('post'));
    }
}
