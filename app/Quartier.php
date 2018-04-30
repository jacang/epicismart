<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quartier extends Model
{
    protected $fillable = array('nom', 'commune_id');

    public function commune(){
        return $this->belongsTo('App\Commune');
    }

    public function membres(){
      return $this->hasMany('App\Membre');
    }
}
