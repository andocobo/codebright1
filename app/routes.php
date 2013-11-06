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

// Bind route paramenters.
Route::model('game', 'Game');

//Login and logout
Route::any('/', 'UserController@handleLogin');
Route::get('/logout', 'UserController@logoutAction');

// Show pages
Route::get('/games', 'GamesController@index')->before('auth');
Route::get('/create', 'GamesController@create')->before('auth');
Route::get('/edit/{game}', 'GamesController@edit')->before('auth');
Route::get('/delete/{game}', 'GamesController@delete')->before('auth');

// Handle form submissions
Route::post('/create', 'GamesController@handleCreate')->before('auth');
Route::post('/edit', 'GamesController@handleEdit')->before('auth');
Route::post('/delete', 'GamesController@handleDelete')->before('auth');


