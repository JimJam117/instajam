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

Route::get('/home', 'HomeController@index');

Route::post('follow/{user}', 'FollowController@store');

// following page
Route::get('/{user}/following', 'ProfileController@following');
Route::get('/following', 'ProfileController@following')->middleware('auth');

// followers page
Route::get('/{user}/followers', 'ProfileController@followers');
Route::get('/followers', 'ProfileController@followers')->middleware('auth');

Route::get('/profiles', 'ProfileController@index');
Route::get('/profile', 'ProfileController@show');
Route::get('/profile/{user}', 'ProfileController@show');
Route::get('/profile/{user}/edit', 'ProfileController@edit')->middleware('auth');
Route::put('/profile/{user}', 'ProfileController@update')->middleware('auth');

Route::get('/posts', 'PostController@all');
Route::get('/posts/all', 'PostController@all');
//Route::get('/posts/{user}', 'PostController@index');

Route::get('/post/create', 'PostController@create')->middleware('auth');
Route::get('/post/{id}', 'PostController@show');
Route::post('/post', 'PostController@store')->middleware('auth');
