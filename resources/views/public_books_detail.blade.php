@extends('layouts.app')

@include('layouts.header')
@include('layouts.footer')

@section('content')
    <div class="p-detail">
        <div class="c-container">
            <div class="c-contents">
                <h1 class="c-title">本の詳細</h1>
                <form action="{{ url('books/update') }}" method="POST">
                    <ul class="c-lists">
                        <li class="c-list">
                            <div class="c-list_bookImgWrapper">
                                @if(preg_match("/^.\/img\/default_books\/book_/", $book->book_img))
                                    <img src="{{ substr($book->book_img, 1) }}" alt="" class="c-list_bookImg">
                                @elseif(preg_match("/^http:\/\//", $book->book_img))
                                    <img src="{{ $book->book_img }}" alt="" class="c-list_bookImg">
                                @else
                                    <img src="data:image/png;base64,{{ $book->book_img }}" alt="" class="c-list_bookImg">
                                @endif
                            </div>
                        </li>
                        <li class="c-list">
                            <label class="c-detailBook_label" for="item_name">書籍名</label>
                            {{ $book->book_name }}
                        </li>
                        <li class="c-list">
                            <label class="c-detailBook_label" for="item_name">ページ数</label>
                            @if($book->book_page === null)  -
                            @else   {{ $book->book_page }} ページ
                            @endif
                        </li>
                        <li class="c-list">
                            <label class="c-detailBook_label" for="published">出版日</label>
                            @if($book->published === null)  -
                            @else   {{ $book->published }}
                            @endif
                        </li>
                        <li class="c-list">
                            <label class="c-detailBook_label" for="author">著者</label>
                            @if($book->author === null)  -
                            @else   {{ $book->author }}
                            @endif
                        </li>
                        <li class="c-list">
                            <label class="c-detailBook_label" for="book_description">説明</label>
                            @if($book->book_description === null)  -
                            @else   {{ $book->book_description }}
                            @endif
                        </li>
                        <li class="c-list">
                            <label class="c-detailBook_label" for="book_description">登録ユーザー</label>
                            {{ $userName }}
                        </li>
                    </ul>
                    <div class="c-bookLink">
                        @if(strstr($_SERVER['REQUEST_URI'], 'private') == true)
                            <a href="{{ url('/private') }}" class="c-link u-link">
                                <i class="fa fa-chevron-left" aria-hidden="true"></i> 戻る
                            </a>
                        @else
                            <a href="{{ url('/public') }}" class="c-link u-link">
                                <i class="fa fa-chevron-left" aria-hidden="true"></i> 戻る
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection