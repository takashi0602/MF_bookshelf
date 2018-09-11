<?php

namespace App\Http\Controllers;

use App\Book;
use App\User;
use Auth;

class BookshelfController extends Controller
{
    public function privateBooks()
    {
        $books = Book::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(21);

        return view('books', [
            'books' => $books,
        ]);
    }

    public function publicBooks()
    {
        $books = Book::where('public_flg', true)->orderBy('created_at', 'desc')->paginate(21);

        return view('public_books', [
            'books' => $books
        ]);
    }

    public function newBooks()
    {
        $books = Book::where('public_flg', true)->orderBy('created_at', 'desc')->paginate(21);

        return view('index', [
            'books' => $books
        ]);
    }

    public function detail(Book $books)
    {
        if ($books->published !== null) {
            $books->published = explode('-', $books->published);
            $books->published = implode('/', $books->published);
        }

        $userName = User::select('name')->where('users.id', $books->user_id)->first();

        return view('books_detail', [
            'book' => $books,
            'userName' => $userName->name
        ]);
    }
}
