<?php

namespace App\Http\Controllers;

use App\Book;
use DB;
use Validator;
use Auth;

class BooksController extends Controller
{
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
