<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Titre extends Model
{
    public function membres(){
      return $this->hasMany('App\Membre');
    }
}
