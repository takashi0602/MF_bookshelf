<?php

use App\Book;
use Illuminate\Http\Request;

// top page
Route::get('/', 'BooksController@index');

// create
Route::post('/books', 'BooksController@store');

// edit screen
Route::post('/booksedit/{books}', 'BooksController@edit');

// update
Route::post('/books/update', 'BooksController@update');

// destroy
Route::delete('/book/{book}', 'BooksController@destroy');

// Scaffold
Route::resource('tasks', 'TaskController');

// Socialite
Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');

// user status
Auth::routes();
Route::get('/home', 'HomeController@index');