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
    return redirect('/index.html');
});

Auth::routes();
Route::get('/getstarted', 'HomeController@start')->name('getstarted');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/turfs', 'TurfController@index')->name('turfs');
Route::get('/turfs/id', 'TurfController@permalink')->name('permalink');

Route::get ( '/redirect/{service}', 'Auth\SocialAuthController@redirect' );
Route::get ( '/callback/{service}', 'Auth\SocialAuthController@callback' );


//API Routes

Route::get('/ajax/turfs', 'TurfController@getAllTurfs')->name('ajax-turfs');
Route::get('/ajax/turfs/{id}', 'TurfController@getTurfById')->name('ajax-turf-id');
