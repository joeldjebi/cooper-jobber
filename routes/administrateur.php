<?php


Route::get('/accueil.html','AdministrateurController@index')->name('admin.dashboard');

/*** route des communes ***/
Route::get('/communes','CommuneController@index')->name('communes');
Route::get('/commune/create','CommuneController@create')->name('commune.create');
Route::post('/commune/store','CommuneController@store')->name('commune.store');
Route::get('/commune/edit/{id}','CommuneController@edit')->name('commune.edit');
Route::post('/commune/update/{id}','CommuneController@update')->name('commune.update');
Route::get('/commune/delete/{id}','CommuneController@destroy')->name('commune.delete');

/*** route des villes ***/
Route::get('/villes','VilleController@index')->name('villes');
Route::get('/ville/create','VilleController@create')->name('ville.create');
Route::post('/ville/store','VilleController@store')->name('ville.store');
Route::get('/ville/edit/{id}','VilleController@edit')->name('ville.edit');
Route::post('/ville/update/{id}','VilleController@update')->name('ville.update');
Route::get('/ville/delete/{id}','VilleController@destroy')->name('ville.delete');

/*** route des forfaits ***/
Route::get('/forfaits','ForfaitController@index')->name('forfaits');
Route::get('/forfait/create','ForfaitController@create')->name('forfait.create');
Route::post('/forfait/store','ForfaitController@store')->name('forfait.store');
Route::get('/forfait/edit/{id}','ForfaitController@edit')->name('forfait.edit');
Route::post('/forfait/update/{id}','ForfaitController@update')->name('forfait.update');
Route::get('/forfait/delete/{id}','ForfaitController@destroy')->name('forfait.delete');

/*** route des secteur ***/
Route::get('/secteurs','SecteurController@index')->name('secteurs');
Route::post('/secteur/store','SecteurController@store')->name('secteur.store');
Route::get('/secteur/edit/{id}','SecteurController@edit')->name('secteur.edit');
Route::post('/secteur/update/{id}','SecteurController@update')->name('secteur.update');
Route::get('/secteur/delete/{id}','SecteurController@destroy')->name('secteur.delete');


/*** route des utilisateurs ***/
Route::get('/users','UserController@index')->name('users');
Route::post('/user/store','UserController@store')->name('user.store');
Route::get('/user/edit/{id}','UserController@edit')->name('user.edit');
Route::post('/user/update/{id}','UserController@update')->name('user.update');
Route::get('/user/delete/{id}','UserController@destroy')->name('user.delete');
Route::get('/user/update/state/{id}','UserController@updatestate')->name('user.updatestate');
Route::get('/user/search','UserController@search')->name('user.search');

/*** update profil admin ***/
Route::get('/profil/update','AdministrateurController@edit')->name('admin.profil');
Route::post('/profil/update','AdministrateurController@update')->name('admin.profil.update');
Route::get('/password/update.html','AdministrateurController@editpassword')->name('admin.password');
Route::post('/password/update','AdministrateurController@passwordupdate')->name('admin.password.update');


