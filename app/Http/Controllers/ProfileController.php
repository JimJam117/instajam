<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class ProfileController extends Controller
{
    public function index() {

      $users = User::all();
      return view('profile.index', compact('users'));

    }

    public function show($user = null)
    {
        // if the user is null then check if the user is logged in, if so go to their profile
        if ($user == null) {
            if (auth()->user()) {
                return redirect("/profile/" . auth()->user()->username);
            }
        } else {
            $user = User::where('username', $user)->firstOrFail();
        }

        // determines if the auth'd user is following this profile
        $follows = null;
        if (auth()->user() && auth()->user()->following->contains($user->profile)) {
            $follows = true;
        } else {
            $follows = false;
        }

        return view('profile.show', compact('user', 'follows'));

    }

    public function edit($user)
    {

      // get user and authorize
        $user = User::where('username', $user)->firstOrFail();
        $this->authorize('update', $user->profile);

        return view('profile.edit', compact('user'));
    }

    public function update($user)
    {

      // get user and authorize
        $user = User::where('username', $user)->firstOrFail();
        $this->authorize('update', $user->profile);

        // validate data
        $data = request()->validate([
        'description' => 'min:1|max:200',
        'url' => 'url',
        'image' => 'image'

      ]);

        // if the request contains an image, sort out paths
        if (request('image')) {
            $imgPath = request('image')->store('profile', 'public');

            // adds the storage dir to the front of the path
            $imgPathWithStorage = '/storage/' . $imgPath;

            // pass the validated data to the auth'd user's profile, with thw image path as image
            auth()->user()->profile()->update([
            'description' => $data['description'],
            'url' => $data['url'],
            'image' => $imgPathWithStorage,
        ]);
        } else {
            // pass validated data to the auth'd user's profile
            auth()->user()->profile()->update($data);
        }

        return redirect("profile/{$user->username}");
    }


    public function followers($user = null)
    {
      // if the user is auth'd and no user is provided, use auth'd user
      if (auth()->user() && $user == null) {
        $user = auth()->user()->username;
        $user = User::where('username', $user)->firstOrFail();
      }
      // if the user is null, just go to all profiles
      else if($user == null) {
        return redirect("/profiles");
      }
      // else, use the username to find the user
      else{
        $user = User::where('username', $user)->firstOrFail();
      }

      //return "Followers for ".  $user->username . " = " . $user->profile->followers()->count();
      return view('profile.followers', compact('user'));
    }

    public function following($user = null) {

      // if the user is auth'd and no user is provided, use auth'd user
      if (auth()->user() && $user == null) {
        $user = auth()->user()->username;
        $user = User::where('username', $user)->firstOrFail();
      }
      // if the user is null, just go to all profiles
      else if($user == null) {
        return redirect("/profiles");
      }
      // else, use the username to find the user
      else{
        $user = User::where('username', $user)->firstOrFail();
      }

      return view('profile.following', compact('user'));
      //return $user->username . " is following = " . $user->following()->count();
    }





}
