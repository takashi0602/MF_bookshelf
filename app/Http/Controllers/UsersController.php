<?php

namespace App\Http\Controllers;

use App\Book;
use Auth;

class UsersController extends Controller
{
    public function __invoke()
    {
        $books = Book::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view('mypage', [
            'books' => $books
        ]);
    }
}
