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
//Route::get('/home{section}','HomeController@index');

/*
  Langua
*/
Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);
/*
  admins routes and it's derivative
*/
Route::get ('/admin', 'AdminController@index');
Route::get ('/admin/general', 'AdminController@index');
  //routes for publikasi
  Route::get('/admin/publikasi',[
    'uses' => 'AdminController@getDataPublikasi',
    'as' => 'data_publikasi'
  ]);
  Route::post('/admin/publikasi/add',[
    'uses' => 'AdminController@tambahPublikasi',
    'as' => 'tambah_publikasi'
  ]);

  //routes for data dosen
  Route::get('/admin/data_dosen', [
    'uses' => 'AdminController@getDataDosen',
    'as' => 'data_dosen'
  ]);
  Route::get('/admin/data_dosen/edit/{id}', [
    'uses' => 'AdminController@editDosen',
    'as' => 'edit_dosen'
  ]);
  Route::get('/admin/data_dosen/delete/{id}', [
    'uses' => 'AdminController@deleteDosen',
    'as' => 'delete_dosen'
  ]);
  Route::post('/admin/data_dosen/update/{id}', [
    'uses' => 'AdminController@updateDosen',
    'as' => 'update_dosen'
  ]);
  Route::post('/admin/data_dosen/add', [
    'uses' => 'AdminController@tambahDosen',
    'as' => 'tambah_dosen'
  ]);
  Route::post('/admin/data_dosen/destroy/{id}', [
    'uses' => 'AdminController@destroyDosen',
    'as' => 'destroy_dosen'
  ]);

Route::get('/admin/logout', [
  'uses' => 'AdminController@getLogout',
  'as' => 'admin.logout'
]);

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
 'admin'=> "AdminController",
]);

Route::auth();

/*
  tests routes
*/
Route::get('/test', 'AdminController@functionName');
