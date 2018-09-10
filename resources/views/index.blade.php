@extends('layouts.app')

@include('layouts.header')
@include('layouts.footer')

@section('content')
    <div class="bg-primary d-flex align-items-center justify-content-center mb-3" style="height: 400px;">
        <h1 class="text-white font-weight-bold" style="font-size: 80px">知識の海を泳げ。</h1>
    </div>
    <div class="container">
        @if (count($books) > 0)
            <div>
                <h1>新着の本</h1>
                <div class="p-0 mb-3 d-flex flex-wrap" style="list-style: none;">
                @foreach ($books as $book)
                    <div class="d-inline-block px-4">
                        <div class="d-flex align-items-center" style="width: 100px; height: 150px;">
                            @if(preg_match("/^.\/img\/default_books\/book_/", $book->book_img))
                                <img src="{{ substr($book->book_img, 1) }}" alt="" class="w-100">
                            @elseif(preg_match("/^http:\/\//", $book->book_img))
                                <img src="{{ $book->book_img }}" alt="" class="w-100">
                            @else
                                <img src="data:image/png;base64,{{ $book->book_img }}" alt="" class="w-100">
                            @endif
                        </div>
                        <div class="text-center" style="width: 100px; height: 55px; word-wrap: break-word;">{{ $book->book_name }}</div>
                    </div>
                @endforeach
                </div>
                <div class="text-right mb-3">
                    <a href="/public" style="text-decoration: none"><i class="fa fa-search" aria-hidden="true"></i> もっと見る</a>
                </div>
            </div>
        @endif
    </div>
@endsection