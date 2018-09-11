<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Validator;
use Auth;

class BooksController extends Controller
{
    public function add()
    {
        return view('books_add');
    }

    public function store(Request $request)
    {
        if (!empty($request->book_img)) {
            $path = env('APP_URL') . '/storage/' . $request->file('book_img')->storeAs('img/books', uniqid() . '.png', 'public');
        } else {
            $default_books = [ 'black', 'blue', 'green', 'orange', 'purple', 'red', 'white', 'yellow' ];
            $num = mt_rand(0, 7);
            $path = env('APP_URL') . '/storage/img/default_books/book_' . $default_books[$num] . '.png';
        }

        // Validation
        $validator = Validator::make($request->all(), [
            'book_name' => 'required | min: 1 | max: 255',
            'book_page' => 'digits_between: 0, 4',
            'author' => 'min: 0 | max: 255',
            'book_description' => 'min: 0 | max: 4000',
            'book_img' => 'image'
        ]);

        // Validation Error
        if ($validator->fails()) {
            return redirect('/book/add')->withInput()->withErrors($validator);
        }

        // Eloquent Model
        $books = new Book;
        $books->user_id = Auth::user()->id;
        $books->book_name = $request->book_name;
        $books->book_page = $request->book_page;
        $books->public_flg = $request->flag === 'public' ? true : false;
        $books->author = $request->author;
        $books->book_description = $request->book_description;
        $books->book_img = $path;
        $books->published = $request->published;
        $books->save();

        return redirect('/private');
    }

    public function edit($book_id)
    {
        $books = Book::where('user_id', Auth::user()->id)->find($book_id);
        return view('books_edit', [
            'book' => $books
        ]);
    }

    public function update(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'book_name' => 'required | min: 1 | max: 255',
            'book_page' => 'digits_between: 0, 4',
            'author' => 'min: 0 | max: 255',
            'book_description' => 'min: 0 | max: 4000'
        ]);

        // Validation Error
        if ($validator->fails()) {
            return redirect('/private')->withInput()->withErrors($validator);
        }

        // Eloquent Model
        $books = Book::where('user_id', Auth::user()->id)->find($request->id);
        $books->book_name = $request->book_name;
        $books->book_page = $request->book_page;
        $books->published = $request->published;
        $books->author = $request->author;
        $books->book_description = $request->book_description;
        $books->public_flg = $request->flag === 'public' ? true : false;
        $books->save();

        return redirect('/private');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect('/private');
    }
}
