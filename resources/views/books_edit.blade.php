@extends('layouts.app')

@section('content')
    <div>
        <div>
            @include('common.errors')
            <form action="{{ url('private/books/update') }}" method="POST">
                <div>
                    <label>書籍名</label>
                    <input type="text" name="book_name" id="book-name" value="{{ $book->book_name }}">
                </div>
                <div>
                    <label for="book_price">金額</label>
                    <input type="number" name="book_price" id="book-price" value="{{ $book->book_price }}">
                </div>
                <div>
                    <label for="book_page">ページ数</label>
                    <input type="number" name="book_page" id="book-page" value="{{ $book->book_page }}">
                </div>
                <div>
                    <label for="published">出版日</label>
                    <input type="date" id="published" name="published" value="{{ $book->published }}">
                </div>
                <div>
                    <label for="book_description">説明</label>
                    <textarea name="book_description" id="book-description">{{ $book->book_description }}</textarea>
                </div>
                <img src="../../../upload/{{ $book->book_img }}" alt="" width="300">
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