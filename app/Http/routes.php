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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/acl','Acl@create');
Route::get('/created','attachRole@create');
Route::get('/ver/{id}','attachRole@show');
Route::get('/createper','attachRole@store');
Route::get('/per/{id}','attachRole@edit');
Route::get('/valid/{id}','attachRole@validrole');
Route::get('/signup','attachRole@signup');
Route::get('/signin',function() {
	return view('login');
});
Route::post('/saverole','attachRole@saverole');
Route::post('/save','attachRole@saveuser');
Route::post('/authenticate','attachRole@authenticate');