@extends('layouts.app')

@include('layouts.header')
@include('layouts.footer')

@section('content')
    <div class="p-create">
        <div class="c-container">
            <div class="c-contents u-contents">
                <h1 class="c-title">本の追加</h1>
                <a href="{{ url('/private/books/isbn') }}" class="c-link u-link">ISBN検索はこちら</a>
                @include('common.errors')
                <form enctype="multipart/form-data" action="{{ url('private/books/store') }}" method="POST">
                    {{ csrf_field() }}
                    <ul class="c-lists">
                        <li class="c-list">
                            <label for="book-name" class="c-label u-label_add">書籍名 <span class="c-required">*</span></label>
                            <input type="text" name="book_name" id="book-name" class="c-textBox" maxlength="255" required autofocus>
                        </li>
                        <li class="c-list">
                            <label for="book-page" class="c-label u-label_add">ページ数</label>
                            <input type="number" name="book_page" id="book-page" class="c-number" min="1" max="9999">
                        </li>
                        <li class="c-list">
                            <label for="published" class="c-label u-label_add">出版日</label>
                            <input type="date" name="published" id="published" class="c-date">
                        </li>
                        <li class="c-list">
                            <label for="author" class="c-label u-label_add">著者</label>
                            <input type="text" name="author" id="author" class="c-textBox" maxlength="255">
                        </li>
                        <li class="c-list">
                            <label for="book-description" class="c-label u-label_add">説明</label>
                            <textarea name="book_description" id="book-description" class="c-textArea" maxlength="4000"></textarea>
                        </li>
                        <li class="c-list">
                            <label for="book-img" class="c-label u-label_add">画像</label>
                            <input type="file" name="book_img" id="book-img" class="c-file">
                        </li>
                        <li class="c-list">
                            <label for="flag" class="c-label u-label_add">公開設定</label>
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
                <div class="c-backLink">
                    <a href="{{ url('/private') }}" class="c-link u-link">
                        <i class="fa fa-chevron-left" aria-hidden="true"></i> 戻る
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection