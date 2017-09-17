<?php

use App\Book;
use Illuminate\Http\Request;

/**
 * 本のダッシュボード表示
 */
Route::get('/', function () {
    return view('books');
});

/**
 * 新「本」を追加
 */
Route::post('/books', function (Request $request) {
    //
});

/**
 * 本を削除
 */
Route::delete('/book/{book}', function (Book $book) {
    //
});