<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membre extends Model
{
    public function titre(){
      return $this->belongsTo('App\Titre');
    }

    public function quartier(){
      return $this->belongsTo('App\Quartier');
    }

    public function dimes(){
      return $this->hasMany('App\Dimes');
    }
}
