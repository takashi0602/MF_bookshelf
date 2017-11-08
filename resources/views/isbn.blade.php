@extends('layouts.app')

@section('content')
    <div class="p-isbn">
        <div class="c-container">
            @include('common.errors')
            <form class="c-isbnSearch" enctype="multipart/form-data" action="{{ url('private/books/isbn/search') }}" method="POST">
                {{ csrf_field() }}
                <label for="book-name" class="c-label">ISBNコード（10桁）</label>
                <input class="c-textBox" type="text"  name="isbn_code" id="book-name">
                <input class="c-btn_large" type="submit" value="検索">
            </form>
            @if(!empty(session('response')))
                @if(session('response'))
                    <form enctype="multipart/form-data" action="{{ url('/private/books/isbn/store') }}" method="POST">
                        {{ csrf_field() }}
                        <ul class="c-lists">
                            <li class="c-list">
                                <label for="book-name" class="c-label">書籍名</label>
                                <input type="text" value="{{ json_decode(session('response'))->title }}" name="book_name" id="book-name" class="c-textBox">
                            </li>
                            <li class="c-list">
                                <label for="book-page" class="c-label">ページ数</label>
                                <input type="number" value="{{ json_decode(session('response'))->pageCount }}" name="book_page" id="book-page" class="c-number">
                            </li>
                            <li class="c-list">
                                <label for="published" class="c-label">出版日</label>
                                <input type="date" value="{{ json_decode(session('response'))->publishedDate }}" name="published" id="published" class="c-date">
                            </li>
                            <li class="c-list">
                                <label for="author" class="c-label">著者</label>
                                <input type="text" value="{{ json_decode(session('response'))->authors }}" name="author" id="author" class="c-textBox">
                            </li>
                            <li class="c-list">
                                <label for="book-description" class="c-label">説明</label>
                                <textarea name="book_description" id="book-description" class="c-textArea">{{ json_decode(session('response'))->description }}</textarea>
                            </li>
                            <li class="c-list">
                                <label for="book-img" class="c-label">画像</label>
                                <img src="{{ json_decode(session('response'))->thumbnail }}" class="c-createBook_file" alt="">
                                <input type="hidden" value="{{ json_decode(session('response'))->thumbnail }}" name="book_img" id="book-img" class="c-createBook_file">
                            </li>
                            <li class="c-list">
                                <label for="flag" class="c-label">公開設定</label>
                                <div class="c-radioWrapper">
                                    <input type="radio" name="flag" id="flag" value="public" class="c-radio" checked> 公開
                                    <input type="radio" name="flag" id="flag" value="private" class="c-radio"> 非公開
                                </div>
                            </li>
                        </ul>
                        <button type="submit" class="c-btn_large u-btn_large">
                            <i class="fa fa-plus" aria-hidden="true"></i> 本棚に入れる
                        </button>
                    </form>
                @endif
            @elseif(!empty(session('message')))
                <ul>
                    <li>{{ session('message') }}</li>
                </ul>
            @endif
        </div>
    </div>
@endsection