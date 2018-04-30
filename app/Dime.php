<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dime extends Model
{
    protected $fillable = array('montant', 'membre_id', 'date');

    public function membre(){
      return $this->belongsTo('App\Membre');
    }
}
