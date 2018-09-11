<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Auth;

/**
 * Class UsersController
 * @package App\Http\Controllers
 * ユーザに関するコントローラ
 */
class UsersController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * ユーザ情報
     */
    public function __invoke()
    {
        $books = Book::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view('mypage', [
            'books' => $books
        ]);
    }
}
