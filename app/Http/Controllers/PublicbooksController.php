<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class PublicbooksController extends Controller
{
    public function index() {
        $books = Book::orderBy('created_at', 'desc')->paginate(5);
        return view('public_books', [
            'books' => $books
        ]);
    }

    public function detail(Book $books) {
        return view('public_books_detail', [
            'book' => $books
        ]);
    }
}