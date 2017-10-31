<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class TopPageController extends Controller
{
    public function __invoke()
    {
        $books = Book::orderBy('created_at', 'desc')->paginate(5);
        return view('index', [
            'books' => $books
        ]);
    }
}
