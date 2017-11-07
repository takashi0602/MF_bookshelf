<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class PublicbooksController extends Controller
{
    public function index() {
        $books = Book::where('flag', 'public')->orderBy('created_at', 'desc')->paginate(21);
        return view('public_books', [
            'books' => $books
        ]);
    }

    public function detail(Book $books) {
        $books->published = explode('-', $books->published);
        $books->published = implode('/', $books->published);

        return view('public_books_detail', [
            'book' => $books
        ]);
    }
}