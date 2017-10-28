@extends('layouts.app')

@section('content')
    <div>
        <div>
            @include('common.errors')
            <form action="{{ url('private/books/update') }}" method="POST">
                <div>
                    <label for="book-name">書籍名</label>
                    <input type="text" name="book_name" id="book-name" value="{{ $book->book_name }}">
                </div>
                <div>
                    <label for="book-price">価格</label>
                    <input type="number" name="book_price" id="book-price" value="{{ $book->book_price }}">
                </div>
                <div>
                    <label for="book-page">ページ数</label>
                    <input type="number" name="book_page" id="book-page" value="{{ $book->book_page }}">
                </div>
                <div>
                    <label for="published">出版日</label>
                    <input type="date" name="published" id="published" value="{{ $book->published }}">
                </div>
                <div>
                    <label for="author">著者</label>
                    <input type="text" name="author" id="author" value="{{ $book->author }}">
                </div>
                <div>
                    <label for="flag">公開設定</label>
                    @if ($book->flag === 'public')
                        <input type="radio" name="flag" id="flag" value="public" checked> 公開
                        <input type="radio" name="flag" id="flag" value="private"> 非公開
                    @else
                        <input type="radio" name="flag" id="flag" value="public"> 公開
                        <input type="radio" name="flag" id="flag" value="private" checked> 非公開
                    @endif
                </div>
                <div>
                    <label for="book-description">説明</label>
                    <textarea name="book_description" id="book-description">{{ $book->book_description }}</textarea>
                </div>
                <div>
                    <img src="data:image/png;base64,{{ $book->book_img }}" alt="" width="300">
                </div>
                <div>
                    <button type="submit">
                        <i class="fa fa-pencil" aria-hidden="true"></i> 更新
                    </button>
                    <a href="{{ url('/private') }}">
                        <i class="fa fa-chevron-left" aria-hidden="true"></i> 戻る
                    </a>
                </div>
                <input type="hidden" name="id" value="{{ $book->id }}">
                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection