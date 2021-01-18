<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','HomeController@index');
Route::get('/index.html', 'HomeController@index')->name('home');
Route::get('/about.html', 'HomeController@about')->name('about');
Route::get('/accueil.html','HomeController@index')->name('accueil');
Route::get('/liste-des-secteurs.html','HomeController@secteur')->name('home.secteurs');
Route::get('/liste-des-profils.html','HomeController@allJober')->name('profil.liste');
Route::get('/{id}-{slug}.html','HomeController@usersBySecteur')->name('secteurs.jobber');
Route::get('/profil/{id}/{slug}.html','HomeController@show')->name('show');
Route::get('/inscription.html','Auth\RegisterController@register')->name('user.register');
Route::post('/inscription','Auth\RegisterController@createAccount')->name('user.createAccount');
Route::get('/connexion.html','Auth\LoginController@getloginform')->name('user.login');
Route::post('/connexion','Auth\LoginController@login')->name('user.login.post');
Route::get("/contact.html",'HomeController@contact')->name('contact');
Route::post('/contact','HomeController@emailcontact')->name('contact.send');
Route::get('logout','Auth\LoginController@logout')->name('logout');
Route::get('/recherche','HomeController@search')->name('recherche');

Route::get('/commentcamarche.html', 'HomeController@commentcamarche')->name('commentcamarche');
Route::get('/mentionlegal.html', 'HomeController@mentionlegal')->name('mentionlegal');
Route::get('/cgu.html', 'HomeController@cgu')->name('cgu');
Route::get('/booster.html', 'HomeController@booster')->name('booster');

Auth::routes();
