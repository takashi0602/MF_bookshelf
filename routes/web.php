<?php

use App\Book;
use Illuminate\Http\Request;

//dashboard
Route::get('/', 'BooksController@index');

// create
Route::post('/books', 'BooksController@store');

// edit screen
Route::post('/booksedit/{books}', 'BooksController@edit');

// update
Route::post('/books/update', 'BooksController@update');

// destroy
Route::delete('/book/{book}', 'BooksController@destroy');