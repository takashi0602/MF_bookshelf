@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('common.errors')
            <form action="{{ url('books/update') }}" method="POST">
                <img src="../../../upload/{{ $book->book_img }}" alt="" width="300">

                <div class="form-group">
                    <label for="item_name">書籍名</label>
                    {{ $book->book_name }}
                </div>

                <div class="form-group">
                    <label for="item_name">ページ数</label>
                    @if($book->book_page === null)  -
                    @else   {{ $book->book_page }} ページ
                    @endif
                </div>

                <div class="form-group">
                    <label for="item_amount">価格</label>
                    ￥ {{ $book->book_price }}
                </div>

                <div class="form-group">
                    <label for="published">出版日</label>
                    {{ $book->published }}
                </div>

                <div class="form-group">
                    <label for="book_description">説明</label>
                    {{ $book->book_description }}
                </div>

                <div>
                    <a class="btn btn-link pull-right" href="{{ url('/public') }}">
                        <i class="glyphicon glyphicon-backward"></i> 戻る
                    </a>
                </div>

                <input type="hidden" name="id" value="{{ $book->id }}">

                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection