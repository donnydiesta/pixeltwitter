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

/*Route::get('/', function () {
    return view('welcome');
});*/

//Route::get('/', 'HomeController@index');
Route::get('/', ['middleware' => 'authLogin', 'uses' => 'HomeController@index']);
Route::get('/logout', ['middleware' => 'authLogin', 'uses' => 'HomeController@logout']);
Route::get('/get_all_status', ['middleware' => 'authLogin', 'uses' => 'HomeController@getAllStatus']);
Route::get('/login/{id?}', 'LoginController@index');
Route::post('/login_process', 'LoginController@loginProcess');
Route::post('/register', 'LoginController@register');
Route::get('/profile', ['middleware' => 'authLogin', 'uses' => 'ProfileController@index']);
Route::post('/save_profile', ['middleware' => 'authLogin', 'uses' => 'ProfileController@saveProfile']);
Route::post('/photo_upload', ['middleware' => 'authLogin', 'uses' => 'ProfileController@photoUpload']);
Route::post('/update_status', ['middleware' => 'authLogin', 'uses' => 'HomeController@updateStatus']);
