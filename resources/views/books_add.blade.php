@extends('layouts.app')

@section('content')
    <div class="p-create">
        <div class="c-container">
            <div class="c-lists_wrapper u-lists_wrapper">
                <h1 class="c-title">本の追加</h1>
                <a href="{{ url('/isbn') }}" class="c-link u-link">ISBN検索はこちら</a>
                @include('common.errors')
                <form enctype="multipart/form-data" action="{{ url('private/books/store') }}" method="POST">
                    {{ csrf_field() }}
                    <ul class="c-lists">
                        <li class="c-list">
                            <label for="book-name" class="c-label">書籍名 <span class="c-required">*</span></label>
                            <input type="text" name="book_name" id="book-name" class="c-textBox" required autofocus>
                        </li>
                        <li class="c-list">
                            <label for="book-page" class="c-label">ページ数</label>
                            <input type="number" name="book_page" id="book-page" class="c-number">
                        </li>
                        <li class="c-list">
                            <label for="published" class="c-label">出版日</label>
                            <input type="date" name="published" id="published" class="c-date">
                        </li>
                        <li class="c-list">
                            <label for="author" class="c-label">著者</label>
                            <input type="text" name="author" id="author" class="c-textBox">
                        </li>
                        <li class="c-list">
                            <label for="book-description" class="c-label">説明</label>
                            <textarea name="book_description" id="book-description" class="c-textArea"></textarea>
                        </li>
                        <li class="c-list">
                            <label for="book-img" class="c-label">画像</label>
                            <input type="file" name="book_img" id="book-img" class="c-file">
                        </li>
                        <li class="c-list">
                            <label for="flag" class="c-label">公開設定</label>
                            <div class="c-radioWrapper">
                                <input type="radio" name="flag" id="flag" value="public" class="c-radio" checked> 公開
                                <input type="radio" name="flag" id="flag" value="private" class="c-radio"> 非公開
                            </div>
                        </li>
                    </ul>
                    <button type="submit" class="c-btn_create u-btn_create">
                        <i class="fa fa-plus" aria-hidden="true"></i> 本棚に入れる
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection