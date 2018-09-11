<?php

// トップページ
Route::get('/', 'BookshelfController@newBooks');

// マイページ
Route::middleware('auth')->group(function () {
    Route::get('/mypage', 'UsersController');
});

// みんなの本棚
Route::prefix('public')->group(function () {
    Route::get('/', 'BookshelfController@publicBooks');
    Route::post('/detail/{books}', 'BookshelfController@detail');
});

// じぶんの本棚
Route::middleware('auth')->prefix('private')->group(function () {
    Route::get('/', 'BookshelfController@privateBooks');
    Route::get('/detail/{books}', 'BookshelfController@detail');
});

// 書籍の追加/編集/削除等
Route::middleware('auth')->prefix('book')->group(function () {
    Route::get('/add', 'BooksController@add');
    Route::post('/store', 'BooksController@store');
    Route::get('/edit/{books}', 'BooksController@edit');
    Route::post('/update', 'BooksController@update');
    Route::delete('/{book}', 'BooksController@destroy');
    Route::get('/isbn', 'IsbnBooksController@index');
    Route::post('/isbn/search', 'IsbnBooksController@search');
    Route::post('/isbn/store', 'IsbnBooksController@store');
});

// 認証
Route::prefix('auth')->group(function () {
    Route::get('/{provider}', 'Auth\AuthController@redirectToProvider');
    Route::get('/{provider}/callback', 'Auth\AuthController@handleProviderCallback');
});
Auth::routes();
