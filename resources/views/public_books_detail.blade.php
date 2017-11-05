@extends('layouts.app')

@section('content')
    <div class="p-detail">
        <div class="c-container">
            @include('common.errors')
            <form action="{{ url('books/update') }}" method="POST">
                <ul class="c-detailBook">
                    <li class="c-detailBook_item">
                        <img class="c-detailBook_img" src="data:image/png;base64,{{ $book->book_img }}" alt="" width="300">
                    </li>
                    <li class="c-detailBook_item">
                        <label class="c-detailBook_label" for="item_name">書籍名</label>
                        {{ $book->book_name }}
                    </li>
                    <li class="c-detailBook_item">
                        <label class="c-detailBook_label" for="item_name">ページ数</label>
                        @if($book->book_page === null)  -
                        @else   {{ $book->book_page }} ページ
                        @endif
                    </li>
                    <li class="c-detailBook_item">
                        <label class="c-detailBook_label" for="item_amount">価格</label>
                        @if($book->book_price === null)  -
                        @else   ￥ {{ $book->book_price }}
                        @endif
                    </li>
                    <li class="c-detailBook_item">
                        <label class="c-detailBook_label" for="published">出版日</label>
                        @if($book->published === null)  -
                        @else   {{ $book->published }}
                        @endif
                    </li>
                    <li class="c-detailBook_item">
                        <label class="c-detailBook_label" for="author">著者</label>
                        @if($book->author === null)  -
                        @else   {{ $book->author }}
                        @endif
                    </li>
                    <li class="c-detailBook_item">
                        <label class="c-detailBook_label" for="book_description">説明</label>
                        @if($book->book_description === null)  -
                        @else   {{ $book->book_description }}
                        @endif
                    </li>
                </ul>
                <div class="c-bockLink">
                    @if(strstr($_SERVER['REQUEST_URI'], 'private') == true)
                    <a href="{{ url('/private') }}">
                        <i class="fa fa-chevron-left" aria-hidden="true"></i> 戻る
                    </a>
                    @else
                        <a href="{{ url('/public') }}">
                            <i class="fa fa-chevron-left" aria-hidden="true"></i> 戻る
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
@endsection