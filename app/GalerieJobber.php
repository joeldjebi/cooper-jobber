<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalerieJobber extends Model
{
    protected $fillable = ['users_id','url','order'];

    

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
