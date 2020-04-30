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

Route::get('/', 'FirstController@index')->middleware('guest');
Route::get('utilisateur/{id}','FirstController@utilisateur' )->where('id', '[0-9]+')->middleware('auth');
Route::get('/chanson/nouvelle', 'FirstController@nouvellechanson')->middleware('auth'); //middleware (l'utilisateur doit forcément etre connecter pour voir cette route)
Route::post('/chanson/create', 'FirstController@creerchanson')->middleware('auth');
Route::get('/musics/{id}', 'FirstController@mesmusiques')->where('id', '[0-9]+')->middleware('auth');

Route::get('/suivre/{id}', 'FirstController@suivre')->where('id', '[0-9]+')->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/legalnotice', 'FirstController@mentionslegales');
Route::get('/like/{id}', 'FirstController@like')->where('id', '[0-9]+')->middleware('auth');
Route::get('/changementprofil/{id}', 'FirstController@changementprofil')->where('id', '[0-9]+')->middleware('auth');
Route::get('/search/{s}', 'FirstController@search')->middleware('auth');
Route::post('/updateProfil/{id}', 'FirstController@updatePeople')->where('id', '[0-9]+')->middleware('auth');

Route::get('/playlists/{id}', 'FirstController@mesplaylists')->where('id', '[0-9]+')->middleware('auth');
Route::get('/nouvelle/playlist/{id_music}', 'FirstController@nouvelleplaylist')->where('id_music', '[0-9]+')->middleware('auth');
Route::post('/playlist/create/{id_music}', 'FirstController@creerplaylist')->where('id_music', '[0-9]+')->middleware('auth');
Route::get('/add/playlist/{id}/{idmusic}', 'FirstController@addplaylist')->where('id', '[0-9]+','idmusic', '[0-9]+')->middleware('auth');
Route::get('/playlists/{id}/{idplaylist}', 'FirstController@laplaylist')->where('id', '[0-9]+','idmusic', '[0-9]+')->middleware('auth');

Route::get('/all', 'FirstController@allmusic')->middleware('auth');
Route::get('/liked', 'FirstController@allliked')->middleware('auth');

Auth::routes();



Route::get('/{any}', function ($any) {

    return response()->view('errors.404', [], 404);

})->where('any', '.*');
