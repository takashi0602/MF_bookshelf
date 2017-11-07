<?php

use App\Book;
use Illuminate\Http\Request;

// top page
Route::get('/', 'TopPageController');

// my page
Route::get('/mypage', 'MyPageController@mypage');

// public page
Route::get('/public', 'PublicbooksController@index');

// public page detail
Route::post('/public/detail/{books}', 'PublicbooksController@detail');

// private page detail
Route::post('/private/detail/{books}', 'PublicbooksController@detail');

// private page
Route::get('/private', 'BooksController@index');

// create page
Route::get('/private/books/add', 'BooksController@add');

// create
Route::post('/private/books/store', 'BooksController@store');

// isbn page
Route::get('/private/books/isbn', 'IsbnController@index');

// isbn search
Route::post('/private/books/isbn/search', 'IsbnController@search');

// isbn create
Route::post('/private/books/isbn/store', 'IsbnController@store');

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
