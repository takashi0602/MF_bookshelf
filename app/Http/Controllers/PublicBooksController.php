<?php

namespace App\Http\Controllers;

use App\Book;
use Auth;
use Illuminate\Support\Facades\DB;

class PublicBooksController extends Controller
{
    public function __invoke()
    {
        $books = Book::where('flag', 'public')->orderBy('created_at', 'desc')->paginate(21);
        return view('public_books', [
            'books' => $books
        ]);
    }
}