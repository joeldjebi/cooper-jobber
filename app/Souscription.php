<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Souscription extends Model
{
    protected $fillable = ['fortfait_id','user_id','expire_at','etat','methode_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function forfait()
    {
        return $this->belongsTo('App\Forfait');
    }

    public function methode()
    {
        return $this->belongsTo('App\Methode');
    }
}
