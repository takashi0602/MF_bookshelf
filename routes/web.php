<?php

use App\Book;
use Illuminate\Http\Request;

/**
 * 本のダッシュボード表示
 */
Route::get('/', function () {
    $books = Book::orderBy('created_at', 'asc')->get();
    return view('books', [
        'books' => $books
    ]);
});

/**
 * 新「本」を追加
 */
Route::post('/books', function (Request $request) {
    // Varidation
    $validator = Validator::make($request->all(), [
        'item_name' => 'required | max: 255',
    ]);

    // Varidation Error
    if ($validator->fails()) {
        return redirect('/')->withInput()->withErrors($validator);
    }

    // Eloquent Model
    $books = new Book;
    $books->item_name = $request->item_name;
    $books->item_number = '1';
    $books->item_amount = '1000';
    $books->published = '2017-03-07 00:00:00';
    $books->save();
    return redirect('/');
});

/**
 * 本を削除
 */
Route::delete('/book/{book}', function (Book $book) {
    //
});