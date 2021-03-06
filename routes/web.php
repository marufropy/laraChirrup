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

Route::middleware('auth')->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');

    Route::post('/tweets', 'TweetsController@store');
    
    Route::post('/profiles/{user}/follow', 'FollowsController@store')->name('profile');
    
    Route::get('/profiles/{user}/edit', 'ProfilesController@edit')->name('profile');

    Route::patch('/profiles/{user}', 'ProfilesController@update')->name('profile');

    Route::get('/browse', 'BrowseController@index');

    Route::post('/tweets/{tweet}/like', 'TweetLikesController@store');

    Route::delete('/tweets/{tweet}/like', 'TweetLikesController@destroy');
});

Route::get('/profiles/{user}', 'ProfilesController@show')->name('profile');

Auth::routes();