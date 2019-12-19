<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot() {
      parent::boot();

      // when the user is created, also create a profile with the user's user_id
      // also init the profile with default values
      static::created(function($user){
        $user->profile()->create([
          'description' => $user->name . "'s Description",
          'url' => null,
          'image' => null
        ]);
      });
    }

    public function profile() {
      return $this->hasOne(Profile::class);
    }

    public function posts() {
      return $this->hasMany(Post::class)->orderBy('created_at', 'DESC');
    }
}
