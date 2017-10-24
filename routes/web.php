<?php

use App\Book;
use Illuminate\Http\Request;

// public page
Route::get('/public', 'PublicbooksController@index');

// public page detail
Route::post('/public_description/{books}', 'PublicbooksController@description');

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

// Socialite
Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');

Auth::routes();