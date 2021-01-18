<?php


Route::get("/dashboard.html",'DashboardController@index')->name('dashboard');
Route::get('/profil.html','DashboardController@profil')->name('profil');
Route::post('/profil','DashboardController@update')->name('profil.update');
Route::get('/experiences.html','DashboardController@experiences')->name('profil.experiences');
Route::post('/experiences','DashboardController@createxperience')->name('profil.experience.post');
Route::get('/experinces/{id}','DashboardController@deleteexperiences')->name('experiences.delete');
Route::post('/experiences/{id}','DashboardController@updateexperiences')->name('profil.experience.update');
Route::get('profil/update-password.html','DashboardController@editpassword')->name('profil.password');
Route::post('profil/update-password','DashboardController@updatepassword')->name('profil.password.update');
Route::get('/etat','DashboardController@visibilite')->name('profil.etat');

Route::get('galerie.html','DashboardController@galerie_jobber')->name('galerie');
Route::post('galerie.html','DashboardController@store_galerie_jobber')->name('store_galerie');