@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('common.errors')
            <form action="{{ url('private/books/update') }}" method="POST">
                <div class="form-group">
                    <label for="book_name">書籍名</label>
                    <input type="text" name="book_name" id="book-name" class="form-control" value="{{ $book->book_name }}">
                </div>

                <div class="form-group">
                    <label for="book_price">金額</label>
                    <input type="number" name="book_price" id="book-price" class="form-control" value="{{ $book->book_price }}">
                </div>

                <div class="form-group">
                    <label for="book_page">ページ数</label>
                    <input type="number" name="book_page" id="book-page" class="form-control" value="{{ $book->book_page }}">
                </div>

                <div class="form-group">
                    <label for="published">出版日</label>
                    <input type="date" id="published" name="published" class="form-control" value="{{ $book->published }}">
                </div>

                <div class="form-group">
                    <label for="book_description">説明</label>
                    <textarea name="book_description" id="book-description" class="form-control">{{ $book->book_description }}</textarea>
                </div>

                <img src="../../../upload/{{ $book->book_img }}" alt="" width="300">

                <!-- TODO: 画像選択処理 -->

                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-pencil" aria-hidden="true"></i> 更新
                    </button>
                    <a class="btn btn-link pull-right" href="{{ url('/private') }}">
                        <i class="fa fa-chevron-left" aria-hidden="true"></i> 戻る
                    </a>
                </div>

                <input type="hidden" name="id" value="{{ $book->id }}">

                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection