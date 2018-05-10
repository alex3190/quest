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
//Route::get('/events', 'EventsController@index');
Route::get('/gallery', 'GalleryController@index');
Route::get('/useful-links', 'UsefulLinksController@index');
Route::get('/news', 'NewsController@index');

//Route::get('/stories', 'StoriesController@index');
//Route::get('/games', 'GamesController@index');

Route::get('/adventures', 'AdventuresController@index')->name('adventures.show');

Route::middleware('auth')->group(function(){
    Route::prefix('adventures')->group(function() {
        Route::get('/create', 'AdventuresController@createNewAdventure')->name('adventures.create');
        Route::post('/create', 'AdventuresController@saveNewAdventure')->name('adventures.save');
        Route::post('{id}/join', 'AdventuresController@confirmJoinExistingAdventure')->name('adventures.confirmJoin');
        Route::get('{id}/join', 'AdventuresController@joinExistingAdventure')->name('adventures.join');
        Route::get('{id}/manage', 'AdventuresController@manageAdventure')->name('adventures.getManager');
        Route::patch('{id}/manage', 'AdventuresController@saveAdventure')->name('adventures.saveAdventure');
        Route::get('{id}/confirmDelete', 'AdventuresController@delete')->name('adventures.delete');
        Route::delete('{id}/confirmDelete', 'AdventuresController@confirmDelete')->name('adventures.confirmDelete');
        Route::post('{id}/approveApplicant/{attendeeId}', 'AdventuresController@approveAttendee')->name('adventures.approveApplicant');
        Route::post('{id}/rejectApplicant/{attendeeId}', 'AdventuresController@rejectAttendee')->name('adventures.rejectApplicant');
        Route::post('{id}/resetApplicant/{attendeeId}', 'AdventuresController@resetAttendee')->name('adventures.resetApplicant');
    });

    Route::prefix('user')->group(function() {
        Route::get('{id}', 'UserController@index')->name('users.show');
        Route::post('{id}', 'UserController@update')->name('users.update');
        Route::get('{id}/adventures', 'UserController@showUserAdventures')->name('account.adventures');
        Route::post('{id}/adventures/{adventureId}/unattend', 'UserController@leaveAdventure')->name('account.leaveAdventure');
    });

});