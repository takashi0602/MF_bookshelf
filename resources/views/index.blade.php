@extends('layouts.app')

@include('layouts.header')
@include('layouts.footer')

@section('content')
    <div class="p-topPage">
        <div class="c-catchphrase">
            <h1 class="c-catchphrase_text">知識の海を泳げ。</h1>
        </div>
        <div class="c-container">
            @if (count($books) > 0)
                <div class="c-contents">
                    <h1 class="c-title">新着の本</h1>
                    @foreach ($books as $book)
                        @if ($book->flag === 'public')
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
                                <li class="c-list c-list_bookName">{{ $book->book_name }}</li>
                            </ul>
                        @endif
                    @endforeach
                    <a href="/public" class="c-link u-link"><i class="fa fa-search" aria-hidden="true"></i> もっと見る</a>
                </div>
            @endif
        </div>
    </div>
@endsection