<?php

// トップページ
Route::get('/', 'TopPageController');

// マイページ
Route::get('/mypage', 'MyPageController');

// 公開ページ
Route::prefix('public')->group(function () {
    Route::post('/detail/{books}', 'BooksController@detail');
    Route::get('/', 'PublicBooksController');
});

// 非公開ページ
Route::prefix('private')->group(function () {
    Route::post('/detail/{books}', 'BooksController@detail');
    Route::get('/', 'PrivateBooksController@index');
    Route::get('/book/add', 'PrivateBooksController@add');
    Route::post('/book/store', 'PrivateBooksController@store');
    Route::post('/book/edit/{books}', 'PrivateBooksController@edit');
    Route::post('/book/update', 'PrivateBooksController@update');
    Route::delete('/book/{book}', 'PrivateBooksController@destroy');
    Route::get('/book/isbn', 'IsbnController@index');
    Route::post('/book/isbn/search', 'IsbnController@search');
    Route::post('/book/isbn/store', 'IsbnController@store');
});

// 認証
Route::prefix('auth')->group(function () {
    Route::get('/{provider}', 'Auth\AuthController@redirectToProvider');
    Route::get('/{provider}/callback', 'Auth\AuthController@handleProviderCallback');
});
Auth::routes();
