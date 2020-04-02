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

Route::get('/', 'FirstController@index');
Route::get('/about', 'FirstController@about');
Route::get('/article/{id}', 'FirstController@article')->where('id', '[0-9]+');
Route::get('utilisateur/{id}','FirstController@utilisateur' )->where('id', '[0-9]+');
Route::get('/chanson/nouvelle', 'FirstController@nouvellechanson')->middleware('auth'); //middleware (l'utilisateur doit forcément etre connecter pour voir cette route)
Route::post('/chanson/create', 'FirstController@creerchanson')->middleware('auth');
Route::get('/musics/{id}', 'FirstController@mesmusiques')->where('id', '[0-9]+');
Route::get('/suivre/{id}', 'FirstController@suivre')->where('id', '[0-9]+')->middleware('auth');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/legalnotice', 'FirstController@mentionslegales');
Route::get('/like/{id}', 'FirstController@like')->where('id', '[0-9]+')->middleware('auth');
Route::get('/changementprofil/{id}', 'FirstController@changementprofil')->where('id', '[0-9]+')->middleware('auth');
Route::get('/search/{s}', 'FirstController@search');
