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
}
