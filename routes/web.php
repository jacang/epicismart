<?php

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

Route::group(['namespace' => 'Admin'], function(){
  Route::get('/', 'PagesController@index');
  // Membre routes
  Route::resource('membres', 'MembresController');
  Route::get('/membres/{mid}/dimes', 'MembresController@getMembreDimes');

  // Commune routes
  Route::resource('communes', 'CommunesController');

  // Quartier routes
  Route::resource('quartiers', 'QuartiersController');
  Route::get('/quartiers/create/{selectedCommune}', 'QuartiersController@create');

  // Titre routes
  Route::resource('titres', 'TitresController');

  // Dime routes
  Route::get('/dimes/search', 'DimesController@search');
  Route::resource('dimes', 'DimesController');
  Route::get('searchMatricule', ['as' => 'searchMatricule', 'uses' => 'DimesController@searchMatriculeResponse']);
});




Auth::routes();
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');
