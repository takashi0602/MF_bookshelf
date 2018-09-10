@extends('layouts.app')

@include('layouts.header')
@include('layouts.footer')

@section('content')
    <div class="p-isbn">
        <div class="c-container">
            <div class="c-contents u-contents_isbn">
                <h1 class="c-title">ISBN検索</h1>
                <form enctype="multipart/form-data" action="{{ url('private/book/isbn/search') }}" method="POST">
                    {{ csrf_field() }}
                    <ul class="c-lists">
                        <label for="book-name" class="c-label">ISBNコード（10桁）</label>
                        <input class="c-textBox" type="text" name="isbn_code" id="book-name" maxlength="10" required autofocus>
                        <input class="c-btn_large" type="submit" value="検索">
                    </ul>
                </form>
                @include('common.errors')
                @if(!empty(session('response')))
                    @if(session('response'))
                        <form enctype="multipart/form-data" action="{{ url('/private/book/isbn/store') }}" method="POST">
                            {{ csrf_field() }}
                            <ul class="c-lists">
                                <li class="c-list">
                                    <img src="{{ json_decode(session('response'))->thumbnail }}" alt="">
                                    <input type="hidden" value="{{ json_decode(session('response'))->thumbnail }}" name="book_img" id="book-img">
                                </li>
                                <li class="c-list">
                                    <label for="book-name" class="c-label u-label_isbn">書籍名 <span class="c-required">*</span></label>
                                    <input type="text" value="{{ json_decode(session('response'))->title }}" name="book_name" id="book-name" class="c-textBox" maxlength="255" required>
                                </li>
                                <li class="c-list">
                                    <label for="book-page" class="c-label u-label_isbn">ページ数</label>
                                    <input type="number" value="{{ json_decode(session('response'))->pageCount }}" name="book_page" id="book-page" class="c-number" min="1" max="9999">
                                </li>
                                <li class="c-list">
                                    <label for="published" class="c-label u-label_isbn">出版日</label>
                                    <input type="date" value="{{ json_decode(session('response'))->publishedDate }}" name="published" id="published" class="c-date">
                                </li>
                                <li class="c-list">
                                    <label for="author" class="c-label u-label_isbn">著者</label>
                                    <input type="text" value="{{ json_decode(session('response'))->authors }}" name="author" id="author" class="c-textBox" maxlength="255">
                                </li>
                                <li class="c-list">
                                    <label for="book-description" class="c-label u-label_isbn">説明</label>
                                    <textarea name="book_description" id="book-description" class="c-textArea" maxlength="4000">{{ json_decode(session('response'))->description }}</textarea>
                                </li>
                                <li class="c-list">
                                    <label for="flag" class="c-label u-label_isbn">公開設定</label>
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
                    <ul class="c-lists">
                        <li class="c-list">{{ session('message') }}</li>
                    </ul>
                @endif
                <div class="c-backLink">
                    <a href="{{ url('/private') }}" class="c-link u-link">
                        <i class="fa fa-chevron-left" aria-hidden="true"></i> 戻る
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection