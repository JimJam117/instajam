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


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/profile', 'ProfileController@show');
Route::get('/profile/{user}', 'ProfileController@show');
Route::get('/profile/{user}/edit', 'ProfileController@edit');
Route::put('/profile/{user}', 'ProfileController@update');

Route::get('/post/create', 'PostController@create')->middleware('auth');
Route::get('/post/{id}', 'PostController@show');
Route::post('/post', 'PostController@store');
