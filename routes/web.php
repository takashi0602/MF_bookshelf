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
    Route::get('/', 'PrivateBooksController@index');
    Route::post('/detail/{books}', 'PrivateBooksController@detail');
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
