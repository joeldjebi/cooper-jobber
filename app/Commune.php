<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    protected $fillable = ['libelle','ville_id'];

    public function ville()
    {
        return $this->belongsTo('App\Ville');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
