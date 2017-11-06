@extends('layouts.app')

@section('content')
    <div class="p-isbn">
        <div class="c-container">
            <form class="c-isbnSearch" enctype="multipart/form-data" action="{{ url('isbn/search') }}" method="POST">
                {{ csrf_field() }}
                <input class="c-isbnSearch_number" type="number" name="isbn_code">
                <input class="c-isbnSearch_submit" type="submit" value="検索">
            </form>
            @if(session('result'))
                <form enctype="multipart/form-data" action="{{ url('isbn/books') }}" method="POST">
                    {{ csrf_field() }}
                    @foreach(json_decode(session('result'))->items as $item)
                        <ul>
                            <li class="c-createBook_list">
                                <label for="book-name" class="createBook_label">書籍名</label>
                                <input type="text" value="{{ $item->volumeInfo->title }}" name="book_name" class="c-createBook_textBox">
                            </li>
                            <li class="c-createBook_list">
                                <label class="c-editBook_label" for="book-page">ページ数</label>
                                <input type="number" value="{{ $item->volumeInfo->pageCount }}" name="book_page" class="c-createBook_number">
                            </li>
                            <li class="c-createBook_list">
                                <label for="published" class="createBook_label">出版日</label>
                                <input type="date" value="{{ $item->volumeInfo->publishedDate }}" name="published" class="c-createBook_date">
                            </li>
                            <li class="c-createBook_list">
                                <label for="author" class="createBook_label">著者</label>
                                <input type="text" value="{{ $item->volumeInfo->authors[0] }}" name="author" class="c-createBook_textBox">
                            </li>
                            <li class="c-createBook_list">
                                <label for="book-description" class="createBook_label">説明</label>
                                <textarea class="c-createBook_textArea" name="book_description">{{ $item->volumeInfo->description }}</textarea>
                            </li>
                            <li class="c-createBook_list">
                                <label for="book-img" class="createBook_label">画像</label>
                                <img src="{{ $item->volumeInfo->imageLinks->thumbnail }}" class="c-createBook_file" alt="">
                                <input type="hidden" value="{{ $item->volumeInfo->imageLinks->thumbnail }}" name="book_img" class="c-createBook_file">
                            </li>
                            <li class="c-createBook_list">
                                <label for="flag" class="createBook_label">公開設定</label>
                                <input type="radio" name="flag" id="flag" value="public" checked> 公開
                                <input type="radio" name="flag" id="flag" value="private"> 非公開
                            </li>
                        </ul>
                    @endforeach
                    <button type="submit" class="c-createBook_btn">
                        <i class="fa fa-plus" aria-hidden="true"></i> 本棚に入れる
                    </button>
                </form>
            @endif
        </div>
    </div>
@endsection