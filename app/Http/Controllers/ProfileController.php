<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class ProfileController extends Controller
{
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


        //if ($user != null) {
        return view('profile.show', compact('user'));
        //}
        //return view('error');
    }

    public function edit($user) {

      // get user and authorize
      $user = User::where('username', $user)->firstOrFail();
      $this->authorize('update', $user->profile);

      return view('profile.edit', compact('user'));
    }

    public function update($user) {

      // get user and authorize
      $user = User::where('username', $user)->firstOrFail();
      $this->authorize('update', $user->profile);

      // validate data
      $data = request()->validate([
        'description' => '',
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
      }

      else{
        // pass validated data to the auth'd user's profile
        auth()->user()->profile()->update($data);
      }




      return redirect("profile/{$user->username}");

    }
}
