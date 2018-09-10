<?php

// トップページ
Route::get('/', 'TopPageController');

// マイページ
Route::get('/mypage', 'MyPageController');

// 公開ページ
Route::prefix('public')->group(function () {
    Route::get('/', 'PublicBooksController@index');
    Route::post('/detail/{books}', 'PublicBooksController@detail');
});

// 非公開ページ
Route::prefix('private')->group(function () {
    Route::get('/', 'BooksController@index');
    Route::post('/detail/{books}', 'PublicBooksController@detail');
    Route::get('/book/add', 'BooksController@add');
    Route::post('/book/store', 'BooksController@store');
    Route::get('/book/isbn', 'IsbnController@index');
    Route::post('/book/isbn/search', 'IsbnController@search');
    Route::post('/book/isbn/store', 'IsbnController@store');
    Route::post('/book/edit/{books}', 'BooksController@edit');
    Route::post('/book/update', 'BooksController@update');
    Route::delete('/book/{book}', 'BooksController@destroy');
});

// 認証
Route::prefix('auth')->group(function () {
    Route::get('/{provider}', 'Auth\AuthController@redirectToProvider');
    Route::get('/{provider}/callback', 'Auth\AuthController@handleProviderCallback');
});
Auth::routes();
