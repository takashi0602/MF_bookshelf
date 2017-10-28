<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Book;
use Validator;
use Auth;

class BooksController extends Controller
{
    // dashboard
    public function index() {
        $books = Book::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(5);
        return view('books', [
            'books' => $books
        ]);
    }

    // create
    public function store(Request $request) {
        if (!empty($request->book_img)) {
            $request->book_img = base64_encode(file_get_contents($request->book_img));
        } else {
            $request->book_img = null;
        }

        // Validation
        $validator = Validator::make($request->all(), [
            'book_name' => 'required | min: 3 | max: 255',
            'book_price' => 'digits_between: 0, 6',
            'book_page' => 'digits_between: 0, 4',
            'book_description' => 'min: 0 | max: 1000'
        ]);

        // Validation Error
        if ($validator->fails()) {
            return redirect('/private')->withInput()->withErrors($validator);
        }

        // Eloquent Model
        $books = new Book;
        $books->user_id = Auth::user()->id;
        $books->book_name = $request->book_name;
        $books->book_price = $request->book_price;
        $books->book_page = $request->book_page;
        $books->book_description = $request->book_description;
        $books->book_img = $request->book_img;
        $books->author = $request->author;
        $books->published = $request->published;
        $books->save();
        return redirect('/private');
    }

    // edit screen
    public function edit($book_id) {
        $books = Book::where('user_id', Auth::user()->id)->find($book_id);
        return view('books_edit', [
            'book' => $books
        ]);
    }

    // update
    public function update(Request $request) {
        // Validation
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'book_name' => 'required | min: 3 | max: 255',
            'book_price' => 'digits_between: 0, 6',
            'book_page' => 'digits_between: 0, 4',
            'book_description' => 'min: 0 | max: 1000'
        ]);

        // Validation Error
        if ($validator->fails()) {
            return redirect('/private')->withInput()->withErrors($validator);
        }

        // Eloquent Model
        $books = Book::where('user_id', Auth::user()->id)->find($request->id);
        $books->book_name = $request->book_name;
        $books->book_price = $request->book_price;
        $books->book_page = $request->book_page;
        $books->book_description = $request->book_description;
        $books->author = $request->author;
        $books->published = $request->published;
        $books->save();
        return redirect('/private');
    }

    public function destroy(Book $book) {
        $book->delete();
        return redirect('/private');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
}
