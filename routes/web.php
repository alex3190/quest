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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/about', 'AboutUsController@index');

Route::get('/gallery', 'GalleryController@index');

Route::get('/news', 'NewsController@index');
Route::get('/stories', 'StoriesController@index');
Route::get('/games', 'GamesController@index');
Route::get('/games', 'GamesController@index');

Route::group(['middleware' => 'auth'], function(){
    Route::post('/events/list', 'EventsController@saveNewEvent');
    Route::patch('/events/list', 'EventsController@joinExistingEvent');
    Route::get('/events/list', 'EventsController@index');
    Route::get('/user/{id}', 'UserController@index');
    Route::post('/user/{id}', 'UserController@update');
});