<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Secteur extends Model
{
    protected $fillable = ['libelle','image','description'];

    public function users()
    {
        return $this->hasMany("App\User");
    }

}
