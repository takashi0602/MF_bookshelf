<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class TopPageController extends Controller
{
    public function __invoke()
    {
        $books = Book::orderBy('created_at', 'desc')->take(21)->get();
        return view('index', [
            'books' => $books
        ]);
    }
}
