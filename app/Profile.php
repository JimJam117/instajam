<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $guarded = [];

    public function returnImage() {
      if ($this->image) {
        return $this->image;
      }
      else{
        return "/ico/jam.ico";
      }
    }

    public function user() {

      return $this->belongsTo(User::class);

    }
}
