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

Route::get('/stories', 'StoriesController@index');
Route::get('/games', 'GamesController@index');
Route::get('/games', 'GamesController@index');

Route::get('/adventures', 'AdventuresController@index')->name('adventures.show');

Route::middleware('auth')->group(function(){
    Route::prefix('adventures')->group(function() {
        Route::get('/create', 'AdventuresController@createNewAdventure')->name('adventures.create');
        Route::post('/create', 'AdventuresController@saveNewAdventure')->name('adventures.save');
        Route::post('{id}/join', 'AdventuresController@confirmJoinExistingAdventure')->name('adventures.confirmJoin');
        Route::get('{id}/join', 'AdventuresController@joinExistingAdventure')->name('adventures.join');
    });

    Route::prefix('user')->group(function() {
        Route::get('{id}', 'UserController@index')->name('users.show');
        Route::post('{id}', 'UserController@update')->name('users.update');
        Route::get('{id}/adventures', 'UserController@listAdventure')->name('users.adventures');
    });

});