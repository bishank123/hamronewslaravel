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
Route::get('/', 'CategoriesController@index'); 	                                                
Route::post('/', 'CategoriesController@store');
Route::get('/{categories}','CategoriesController@edit');
Route::put('/{categories}','CategoriesController@update');
Route::delete('/{categories}','CategoriesController@destroy');


Auth::routes();

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');
