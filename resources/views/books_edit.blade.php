@extends('layouts.app')

@include('layouts.header')
@include('layouts.footer')

@section('content')
    <div class="p-edit">
        <div class="c-container">
            <div class="c-contents u-contents">
                <h1 class="c-title">本の編集</h1>
                <form action="{{ url('/book/update') }}" method="POST">
                    @include('common.errors')
                    <ul class="c-lists">
                        <li class="c-list">
                            <div class="c-list_bookImgWrapper u-list_bookImgWrapper">
                                <img src="{{ $book->book_img }}" class="c-list_bookImg">
                            </div>
                        </li>
                        <li class="c-list">
                            <label class="c-label u-label_edit" for="book-name">書籍名 <span class="c-required">*</span></label>
                            <input class="c-textBox" type="text" name="book_name" id="book-name" value="{{ $book->book_name }}" required autofocus>
                        </li>
                        <li class="c-list">
                            <label class="c-label u-label_edit" for="book-page">ページ数</label>
                            <input class="c-number" type="number" name="book_page" id="book-page" value="{{ $book->book_page }}" min="1" max="9999">
                        </li>
                        <li class="c-list">
                            <label class="c-label u-label_edit" for="published">出版日</label>
                            <input class="c-date" type="date" name="published" id="published" value="{{ $book->published }}">
                        </li>
                        <li class="c-list">
                            <label class="c-label u-label_edit" for="author">著者</label>
                            <input class="c-textBox" type="text" name="author" id="author" value="{{ $book->author }}" maxlength="255">
                        </li>
                        <li class="c-list">
                            <label class="c-label u-label_edit" for="book-description">説明</label>
                            <textarea name="book_description" id="book-description" class="c-textArea" maxlength="4000">{{ $book->book_description }}</textarea>
                        </li>
                        <li class="c-list">
                            <label class="c-label u-label_edit" for="flag">公開設定</label>
                            @if ($book->public_flg)
                                <input class="c-radio" type="radio" name="flag" id="flag" value="public" checked> 公開
                                <input class="c-radio" type="radio" name="flag" id="flag" value="private"> 非公開
                            @else
                                <input class="c-radio" type="radio" name="flag" id="flag" value="public"> 公開
                                <input class="c-radio" type="radio" name="flag" id="flag" value="private" checked> 非公開
                            @endif
                        </li>
                    </ul>
                    <div class="c-editBook_Btn">
                        <button type="submit" class="c-btn_large u-btn_large">
                            <i class="fa fa-pencil" aria-hidden="true"></i> 本を更新
                        </button>
                        <input type="hidden" name="id" value="{{ $book->id }}">
                        {{ csrf_field() }}
                    </div>
                </form>
                <div class="c-editBook_Btn">
                    <form action="{{ url('/book/' . $book->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="c-btn_large u-btn_large">
                            <i class="fa fa-trash" aria-hidden="true"></i> 本を捨てる
                        </button>
                    </form>
                </div>
                <div class="c-backLink">
                    <a href="{{ url('/private') }}" class="c-link u-link">
                        <i class="fa fa-chevron-left" aria-hidden="true"></i> 戻る
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection