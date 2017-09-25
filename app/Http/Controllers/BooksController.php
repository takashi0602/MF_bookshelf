<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Book;
use Validator;

class BooksController extends Controller
{
    // dashboard
    public function index() {
        $books = Book::orderBy('created_at', 'asc')->get();
        return view('books', [
            'books' => $books
        ]);
    }

    // create
    public function store(Request $request) {
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
    }

    // edit screen
    public function edit(Book $books) {
        return view('booksedit', [
            'book' => $books
        ]);
    }

    // update
    public function update(Request $request) {
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
    }

    public function destroy(Book $book) {
        $book->delete();
        return redirect('/');
    }
}
