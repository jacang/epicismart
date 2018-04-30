<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    protected $fillable = array('nom', 'image');

    public function quartiers(){
      return $this->hasMany('App\Quartier');
    }
}
