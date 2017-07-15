<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'GuestController@index');

Route::get( '/about', function(){
  return '<h1>Mandiri Sport</h1>';
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('events', 'EventController@index');
Route::get('settings/profile', 'SettingsController@profile');
Route::get('settings/profile/edit', 'SettingsController@editProfile');
Route::post('settings/profile', 'SettingsController@updateProfile');
Route::get('settings/password', 'SettingsController@editPassword');
Route::post('settings/password', 'SettingsController@updatePassword');

Route::group(['prefix'=>'admin','middleware'=>['auth','role:admin']], function(){
  //tempat route
  Route::resource('fields','FieldsController');
  Route::resource('jadwals','JadwalsController');
  Route::resource('set_times','SetTimesController');
  Route::resource('hargas','HargasController');
  Route::resource('members', 'MembersController');

});
