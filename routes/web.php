<?php

use App\Book;
use Illuminate\Http\Request;

Route::get('/', function() {
    return view('index');
});

// public page
Route::get('/public', 'PublicbooksController@index');

// public page detail
Route::post('/public/detail/{books}', 'PublicbooksController@description');

// private page
Route::get('/private', 'BooksController@index');

// create
Route::post('/private/books', 'BooksController@store');

// private edit page
Route::post('/private/books/edit/{books}', 'BooksController@edit');

// private page update
Route::post('/private/books/update', 'BooksController@update');

// private page destroy
Route::delete('private/book/{book}', 'BooksController@destroy');

// auth
Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');

Auth::routes();