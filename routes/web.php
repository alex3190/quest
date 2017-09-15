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
Route::get('/events', 'EventsController@index');
Route::get('/events/create', 'EventsController@create');
Route::get('/events/join', 'EventsController@join');
Route::get('/gallery', 'GalleryController@index');
Route::get('/user/{{id}}', 'UserController@index');
Route::get('/news', 'NewsController@index');
Route::get('/stories', 'StoriesController@index');
Route::get('/games', 'GamesController@index');
