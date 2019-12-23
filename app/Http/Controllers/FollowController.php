<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function __construct() {
      $this->middleware('auth');
    }

    public function store(\App\User $user) {


      // if the auth'd user and has different user id
      if( auth()->user() && auth()->user()->id != $user->id)
      {
          auth()->user()->following()->toggle($user->profile);
          return "Followed/Unfollowed";
      }
      // if the auth'd user has same id
      elseif (auth()->user()) {

        return "Auth user but has same profile id";
      }
      // if no auth'd user
      else {

        return "redirecting...";

      }

    }
}
