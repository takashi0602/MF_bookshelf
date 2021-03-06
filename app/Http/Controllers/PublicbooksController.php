<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\User;
use Auth;
use Illuminate\Support\Facades\DB;

class PublicbooksController extends Controller
{
    public function index() {
        $books = Book::where('flag', 'public')->orderBy('created_at', 'desc')->paginate(21);
        return view('public_books', [
            'books' => $books
        ]);
    }

    public function detail(Book $books) {
        if ($books->published !== null) {
            $books->published = explode('-', $books->published);
            $books->published = implode('/', $books->published);
        }

        $userName = DB::table('users')
            ->select('name')
            ->where('users.id', $books->user_id)
            ->get();

        return view('books_detail', [
            'book' => $books,
            'userName' => $userName[0]->name
        ]);
    }
}