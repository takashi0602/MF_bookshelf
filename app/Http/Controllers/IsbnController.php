<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Validator;
use Auth;

class IsbnController extends Controller
{
    public function index() {
        return view('isbn');
    }

    public function search(Request $request) {
        // Validation
        $validator = Validator::make($request->all(), [
            'isbn_code' => 'required | digits: 10'
        ]);

        // Validation Error
        if ($validator->fails()) {
            return redirect('/isbn')->withInput()->withErrors($validator);
        }

        $url = 'https://www.googleapis.com/books/v1/volumes?q=isbn:';
        $isbnCode = $request->isbn_code;
        $json = file_get_contents($url . $isbnCode);
        $results = json_decode($json);

        $response = new \ArrayObject();

        $default_books = [ 'black', 'blue', 'green', 'orange', 'purple', 'red', 'white', 'yellow' ];
        $default_book = mt_rand(0, 7);

        if (!empty($results->items)) {
            foreach ($results->items as $item) {
                if (!empty($item->volumeInfo->title)) {
                    $response['title'] = $item->volumeInfo->title;
                } else {
                    $response['title'] = '';
                }

                if (!empty($item->volumeInfo->pageCount)) {
                    $response['pageCount'] = $item->volumeInfo->pageCount;
                } else {
                    $response['pageCount'] = '';
                }

                if (!empty($item->volumeInfo->description)) {
                    $response['description'] = $item->volumeInfo->description;
                } else {
                    $response['description'] = '';
                }

                if (!empty($item->volumeInfo->publishedDate)) {
                    $response['publishedDate'] = $item->volumeInfo->publishedDate;
                } else {
                    $response['publishedDate'] = '';
                }

                if (!empty($item->volumeInfo->authors[0])) {
                    $response['authors'] = $item->volumeInfo->authors[0];
                } else {
                    $response['authors'] = '';
                }

                if (!empty($item->volumeInfo->imageLinks->thumbnail)) {
                    $response['thumbnail'] = $item->volumeInfo->imageLinks->thumbnail;
                } else {
                    $response['thumbnail'] = './img/default_books/book_'. $default_books[$default_book] . '.png';
                }
            }
        } else {
            return redirect('/isbn')->with('message', '該当データが見つかりませんでした。');
        }

        return redirect('/isbn')->with('response', json_encode($response));
    }

    public function store(Request $request) {
        // Validation
        $validator = Validator::make($request->all(), [
            'book_name' => 'required | min: 1 | max: 255',
            'book_page' => 'digits_between: 0, 4',
            'book_description' => 'min: 0 | max: 4000'
        ]);

        // Validation Error
        if ($validator->fails()) {
            return redirect('/isbn')->withInput()->withErrors($validator);
        }

        // Eloquent Model
        $books = new Book;
        $books->user_id = Auth::user()->id;
        $books->book_name = $request->book_name;
        $books->book_page = $request->book_page;
        $books->book_description = $request->book_description;
        $books->book_img = $request->book_img;
        $books->author = $request->author;
        $books->published = $request->published;
        $books->flag = $request->flag;
        $books->save();

        return redirect('/private');
    }
}