@extends('layouts.app')

@section('content')
    <div class="p-edit">
        <div class="c-container">
            @include('common.errors')
            <form action="{{ url('private/books/update') }}" method="POST">
                <h1 class="c-editBook_title">編集</h1>
                <ul class="c-editBool_lists">
                    <li class="c-editBook_list">
                        <img src="data:image/png;base64,{{ $book->book_img }}" alt="" width="300">
                    </li>
                    <li class="c-editBook_list">
                        <label class="c-editBook_label" for="book-name">書籍名</label>
                        <input class="c-editBook_textBox" type="text" name="book_name" id="book-name" value="{{ $book->book_name }}">
                    </li>
                    <li class="c-editBook_list">
                        <label class="c-editBook_label" for="book-price">価格</label>
                        <input class="c-editBook_number" type="number" name="book_price" id="book-price" value="{{ $book->book_price }}">
                    </li>
                    <li class="c-editBook_list">
                        <label class="c-editBook_label" for="book-page">ページ数</label>
                        <input class="c-editBook_number" type="number" name="book_page" id="book-page" value="{{ $book->book_page }}">
                    </li>
                    <li class="c-editBook_list">
                        <label class="c-editBook_label" for="published">出版日</label>
                        <input class="c-createBook_date" type="date" name="published" id="published" value="{{ $book->published }}">
                    </li>
                    <li class="c-editBook_list">
                        <label class="c-editBook_label" for="author">著者</label>
                        <input class="c-editBook_textBox" type="text" name="author" id="author" value="{{ $book->author }}">
                    </li>
                    <li class="c-editBook_list">
                        <label class="c-editBook_label" for="flag">公開設定</label>
                        @if ($book->flag === 'public')
                            <input class="c-editBook_radio" type="radio" name="flag" id="flag" value="public" checked> 公開
                            <input class="c-editBook_radio" type="radio" name="flag" id="flag" value="private"> 非公開
                        @else
                            <input class="c-editBook_radio" type="radio" name="flag" id="flag" value="public"> 公開
                            <input class="c-editBook_radio" type="radio" name="flag" id="flag" value="private" checked> 非公開
                        @endif
                    </li>
                    <li class="c-editBook_list">
                        <label class="c-editBook_label" for="book-description">説明</label>
                        <textarea name="book_description" id="book-description">{{ $book->book_description }}</textarea>
                    </li>
                </ul>
                <div class="c-editBook_Btn">
                    <button class="c-editBtn" type="submit">
                        <i class="fa fa-pencil" aria-hidden="true"></i> 更新
                    </button>
                    <input type="hidden" name="id" value="{{ $book->id }}">
                    {{ csrf_field() }}
                </div>
            </form>
            <div class="c-editBook_Btn">
                <form action="{{ url('private/book/' . $book->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="c-deleteBtn">
                        <i class="fa fa-trash" aria-hidden="true"></i> 削除
                    </button>
                </form>
            </div>
            <div class="c-backLink">
                <a href="{{ url('/private') }}">
                    <i class="fa fa-chevron-left" aria-hidden="true"></i> 戻る
                </a>
            </div>
        </div>
    </div>
@endsection