<?php

namespace App\Http\Controllers;

use App\Book;

class TopPageController extends Controller
{
    public function __invoke()
    {
        $books = Book::where('public_flg', true)->orderBy('created_at', 'desc')->take(21)->get();
        return view('index', [
            'books' => $books
        ]);
    }
}
