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
    // Validation
    $validator = Validator::make($request->all(), [
        'item_name' => 'required | min: 3 | max: 255',
        'item_number' => 'required | min: 1 | max: 3',
        'item_amount' => 'required | max: 6',
        'published' => 'required'
    ]);

    // Validation Error
    if ($validator->fails()) {
        return redirect('/')->withInput()->withErrors($validator);
    }

    // Eloquent Model
    $books = new Book;
    $books->item_name = $request->item_name;
    $books->item_number = $request->item_number;
    $books->item_amount = $request->item_amount;
    $books->published = $request->published;
    $books->save();
    return redirect('/');
});

/**
 * 本を削除
 */
Route::delete('/book/{book}', function (Book $book) {
    $book->delete();
    return redirect('/');
});

/**
 * 本の更新ページ更新
 */
Route::post('/booksedit/{books}', function(Book $books) {
    return view('booksedit', [
        'book' => $books
    ]);
});

/**
 * 本を更新
 */
Route::post('/books/update', function(Request $request) {
    // Validation
    $validator = Validator::make($request->all(), [
        'id' => 'required',
        'item_name' => 'required | min: 3 | max: 255',
        'item_number' => 'required | min: 1 | max: 3',
        'item_amount' => 'required | max: 6',
        'published' => 'required'
    ]);

    // Validation Error
    if ($validator->fails()) {
        return redirect('/')->withInput()->withErrors($validator);
    }

    // Eloquent Model
    $books = Book::find($request->id);
    $books->item_name = $request->item_name;
    $books->item_number = $request->item_number;
    $books->item_amount = $request->item_amount;
    $books->published = $request->published;
    $books->save();
    return redirect('/');
});
