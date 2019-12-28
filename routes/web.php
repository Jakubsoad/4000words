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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/start/flashcard', 'FlashcardController@index')->middleware('auth')->name('start/flashcard');

Route::get('/start/hangman', 'HangmanController@index')->middleware('auth');

Route::post('/start/flashcard', 'FlashcardController@check');

Route::post('/newGame', 'GameController@newGame');

Route::get('/charts', 'ChartsController@charts');

Route::get('/test', 'ChartsController@test');
