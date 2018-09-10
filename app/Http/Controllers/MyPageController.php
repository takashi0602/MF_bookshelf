<?php

namespace App\Http\Controllers;

use App\Book;
use Auth;

class MyPageController extends Controller
{
    public function mypage(){
        $books = Book::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view('mypage', [
            'books' => $books
        ]);
    }
}
