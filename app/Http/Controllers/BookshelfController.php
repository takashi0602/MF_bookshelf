<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Auth;

/**
 * Class BookshelfController
 * @package App\Http\Controllers
 * 本棚に関するコントローラ
 */
class BookshelfController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * じぶんの本棚
     */
    public function privateBooks()
    {
        $books = Book::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(21);

        return view('books', [
            'books' => $books,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * みんなの本棚
     */
    public function publicBooks()
    {
        $books = Book::where('public_flg', true)->orderBy('created_at', 'desc')->paginate(21);

        return view('public_books', [
            'books' => $books
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 新着の本
     */
    public function newBooks()
    {
        $books = Book::where('public_flg', true)->orderBy('created_at', 'desc')->paginate(21);

        return view('index', [
            'books' => $books
        ]);
    }

    /**
     * @param Book $books
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 書籍の詳細
     */
    public function detail(Book $books)
    {
        if ($books->published !== null) {
            $books->published = explode('-', $books->published);
            $books->published = implode('/', $books->published);
        }

        $userName = User::select('name')->where('users.id', $books->user_id)->first();

        return view('books_detail', [
            'book' => $books,
            'userName' => $userName->name
        ]);
    }
}
