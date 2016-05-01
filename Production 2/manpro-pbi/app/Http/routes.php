<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
  Index pages routes
*/
Route::get('/','HomeController@index');
Route::get('/home', [
  'as' => 'home',
  'uses' =>'HomeController@index'
]);
Route::get('/home{section}','HomeController@index');

/*
  admins routes and it's derivative
*/
Route::get ('/admin', 'AdminController@index');
Route::get('/admin/publication/create', 'AdminController@createPublication');
Route::post('/admin/publication', 'AdminController@storePublication');
/*
  publications download and routes
*/

Route::get('/publication','PublicationController@index');
Route::get('/publication/{slug}','PublicationController@show');
Route::get('publication/download/{slug}','PublicationController@download');
/*
  Authentications
*/
Route::controllers([
 'auth' => 'Auth\AuthController',
 'password' => 'Auth\PasswordController',
]);

Route::auth();

/*
  tests routes
*/
Route::get('/test',function(){
  return view('static.home-layouted');
});
