<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = ['libelle','description','diplome','competences','date_debut','date_fin','user_id'];


    public function user()
    {
        return $this->belongsTo("App\User");
    }

}
