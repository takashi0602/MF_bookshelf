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
                    <label for="book_amount">金額</label>
                    <input type="number" name="book_amount" id="book-amount" class="form-control" value="{{ $book->book_amount }}">
                </div>

                <div class="form-group">
                    <label for="page">ページ数</label>
                    <input type="number" name="book_page" id="book-page" class="form-control" value="{{ $book->book_page }}">
                </div>

                <div class="form-group">
                    <label for="published">出版社</label>
                    <input type="datetime" name="published" id="published" class="form-control" value="{{ $book->published }}">
                </div>

                <!-- TODO: 画像選択処理 -->

                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">更新</button>
                    <a class="btn btn-link pull-right" href="{{ url('/private') }}">
                        <i class="glyphicon glyphicon-backward"></i> 戻る
                    </a>
                </div>

                <input type="hidden" name="id" value="{{ $book->id }}">

                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection