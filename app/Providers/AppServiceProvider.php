<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Secteur;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $fsecteurs = Secteur::orderBy('libelle','asc')->whereHas('users', function ($query){
            $query->where(['typeuser_id'=> 2, 'active_profile' => 1, 'validate_profile' => 1]);
        })->where('id','!=', 1)->get();

        View::share('fsecteurs', $fsecteurs);
    }
}
