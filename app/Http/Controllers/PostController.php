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
          'description' => 'required',
          'image' => 'required|image',

      ]);

      $imgPath = request('image')->store('uploads', 'public');

      // adds the storage dir to the front of the path
      $imgPathWithStorage = '/storage/' . $imgPath;

      // create post assoc with auth'd user
      // uses validated $data var items and also the image path
      auth()->user()->posts()->create([
        'title' => $data['title'],
        'description' => $data['description'],
        'image' => $imgPathWithStorage,
      ]);

      // redirect to the users profile
      $username = auth()->user()->username;
      return redirect("/profile/$username");
    }

    public function show($id){

      $post = \App\Post::where('id', $id)->firstOrFail();

      // determines if the auth'd user is following this post's profile
      $follows = null;
      if (auth()->user() && auth()->user()->following->contains($post->user->profile)) {
          $follows = true;
      } else {
          $follows = false;
      }


      return view('post.show', compact('post', 'follows'));
    }

    /*
    public function index($user = null)
    {
      // if auth'd user exists and no user is provided
      if (auth()->user() && $user == null) {
        $user = auth()->user();
      }profile
      // if there is no auth'd user or provided user, show all
      else if ($user == null) {
        $this.all();
      }
      else {
        $user = \App\User::where('username', $user)->firstOrFail();
      }

      return redirect("/profile/$user->username");
    }
    */

    public function all()
    {
      $posts = \App\Post::all();
      return view('post.all', compact('posts'));
    }




    public function edit($post)
    {

      // get user and authorize
        $post = \App\Post::where('id', $post)->firstOrFail();
        $this->authorize('update', $post);

        return view('post.edit', compact('post'));
    }

    public function update($post)
    {

      // get user and authorize
        $post = \App\Post::where('id', $post)->firstOrFail();
          $this->authorize('update', $post);

        // validate data
        $data = request()->validate([
        'description' => 'min:1|max:400',
        'title' => 'min:1|max:100',
        'image' => 'image'

      ]);

        // if the request contains an image, sort out paths
        if (request('image')) {
            $imgPath = request('image')->store('uploads', 'public');

            // adds the storage dir to the front of the path
            $imgPathWithStorage = '/storage/' . $imgPath;

            // pass the validated data to the auth'd user's profile, with thw image path as image
            $post->update([
            'description' => $data['description'],
            'title' => $data['title'],
            'image' => $imgPathWithStorage,
        ]);
        } else {
            // pass validated data to the auth'd user's profile
            $post->update($data);
        }

        return redirect("post/{$post->id}");
    }

    public function destroy($post)
    {
      $post = \App\Post::where('id', $post)->firstOrFail();
      $this->authorize('delete', $post);

      \App\Post::where('id', $post->id)->delete();


      return redirect("/home");
    }

    public function delete($post)
    {

      $post = \App\Post::where('id', $post)->firstOrFail();
      $this->authorize('delete', $post);

      return view("confirm-delete", compact('post'));
    }


}
