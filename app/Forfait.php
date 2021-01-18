<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forfait extends Model
{
    protected $fillable = ['libelle','prix','nombre_jours','couleur'];

    public function souscriptions()
    {
        return $this->hasMany('App\Soucription');
    }
}
