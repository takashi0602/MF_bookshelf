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

// auth
Route::auth();
Route::get('/home', 'BooksController@index');

// Scaffold
Route::resource('tasks', 'TaskController');

// Socialite
Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
