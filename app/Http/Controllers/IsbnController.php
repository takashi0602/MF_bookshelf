<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Validator;
use Auth;

class IsbnController extends Controller
{
    public function index() {
        return view('isbn');
    }

    public function search(Request $request) {
        $url = 'https://www.googleapis.com/books/v1/volumes?q=isbn:';
        $isbnCode = $request->isbn_code;
        $json = file_get_contents($url . $isbnCode);
        $result = $json;

        return redirect('/isbn')->with('result', $result);
    }

    public function store(Request $request) {
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
        $books->flag = $request->flag;
        $books->save();

        return redirect('/private');
    }
}