<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Route::get('/', function()
// {
// 	return View::make('hello');
// });

// Route::get('items', function() {
//   return View::make('item-list');
// });

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@showWelcome']);

Route::resource('lists', 'ListController');
Route::resource('lists.items', 'ItemController');

Route::get('/create-account', ['as' => 'signup', 'SignupController@index']);