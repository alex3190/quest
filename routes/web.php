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
    return view('homepage.homepage');
});
Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/about', 'AboutUsController@index');

Route::get('/gallery', 'GalleryController@index');

Route::get('/news', 'NewsController@index');
Route::get('/stories', 'StoriesController@index');
Route::get('/games', 'GamesController@index');
Route::get('/games', 'GamesController@index');

Route::middleware('auth')->group(function(){
    Route::prefix('events')->group(function() {
        Route::post('', 'EventsController@saveNewEvent')->name('events.save');
        Route::patch('{id}/join', 'EventsController@joinExistingEvent')->name('events.join');
        Route::get('', 'EventsController@index')->name('events.show');;
    });

    Route::prefix('user')->group(function() {
        Route::get('{id}', 'UserController@index')->name('users.show');
        Route::post('{id}', 'UserController@update')->name('users.update');
    });

});