<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom', 'prenom', 'contact', 'email', 'iswhatsapp', 'password','active_profile','validate_profile','photo','photo_piece_verso','photo_piece_recto','prix_min','nbvue','secteur_id','typeuser_id','ville_id','commune_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function secteur()
    {
        return $this->belongsTo('App\Secteur');
    }

    public function ville()
    {
        return $this->belongsTo('App\Ville');
    }

    public function experiences()
    {
        return $this->hasMany('App\Experience');
    }

    public function commune()
    {
        return $this->belongsTo('App\Commune');
    }

    public function souscriptions()
    {
        return $this->hasMany('App\Souscription');
    }

    public function typeuser()
    {
        return $this->belongsTo('App\User');
    }

    public function anneexperiences()
    {
        $anneeexperiance = null;
        $experiences = $this->experiences()->get();
        //dump($experiences);
        foreach($experiences as $experience)
        {
            //dd($experience);
            $datedebut = Carbon::parse($experience->date_debut);
            $datefin = isset($experience->date_fin)? Carbon::parse($experience->date_fin) : Carbon::now();
            $anneeexperiance += $datedebut->diffInDays($datefin);
             //print_r($datedebut->diffInDays($datefin));
        }

        return $anneeexperiance;
    }

    /**
     * check if this user is admin
     * @return bool
     */
    public function isadmin()
    {
        return $this->typeuser_id == 1 ? true : false;
    }

}
