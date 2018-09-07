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
Route::resource('sentdocs', 'SentController');
Route::post('/store', 'DocumentController@store');
Route::get('/create', 'DocumentController@create');
Route::get('/download', 'DocumentController@show')->middleware('auth');
Route::get('/sent', 'DocumentController@sent');
Route::get('/received', 'DocumentController@received');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
