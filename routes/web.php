<?php

use App\Book;
use Illuminate\Http\Request;

// トップページ
Route::get('/', 'TopPageController');

// マイページ
Route::get('/mypage', 'MyPageController@mypage');

// 公開ページ
Route::prefix('public')->group(function () {
    Route::get('/', 'PublicbooksController@index');
    Route::post('/detail/{books}', 'PublicBooksController@detail');
});

// 非公開ページ
Route::prefix('private')->group(function () {
    Route::get('/', 'BooksController@index');
    Route::post('/detail/{books}', 'PublicBooksController@detail');
    Route::get('/books/add', 'BooksController@add');
    Route::post('/books/store', 'BooksController@store');
    Route::get('/books/isbn', 'IsbnController@index');
    Route::post('/books/isbn/search', 'IsbnController@search');
    Route::post('/books/isbn/store', 'IsbnController@store');
    Route::post('/books/edit/{books}', 'BooksController@edit');
    Route::post('/books/update', 'BooksController@update');
    Route::delete('/book/{book}', 'BooksController@destroy');
});

// 認証
Route::prefix('auth')->group(function () {
    Route::get('/{provider}', 'Auth\AuthController@redirectToProvider');
    Route::get('/{provider}/callback', 'Auth\AuthController@handleProviderCallback');
});
Auth::routes();
