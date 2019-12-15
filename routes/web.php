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

//TODO: przekazać do szubienica.js słowo i tłumaczenie
//Czyli zrobić przekierowanie do controllera, utworzyć nową grę, zassać nieznane słowo
//i przekazać je do hangman.blade, skąd w script przesłać je do szubienica.js
//Tam wsadzić słowo i tłumaczenie
//Zmienić domyślny widok walidacji: jeżeli dobre, to zapisać to w bazie.
// Jeżeli złe, to wyświetlić tłumaczenie

//TODO: Hangman: wyświetlać słowo i tłumaczenie do zgadnięcia.

//TODO: nowa tabela hangman, w której będą gry
//user_id, timestampsy, word_id
//jeżeli zakończone sukcesem, to zaznaczyć słowo jako nauczone
