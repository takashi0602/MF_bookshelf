@extends('layouts.app')

@include('layouts.header')
@include('layouts.footer')

@section('content')
    <div class="p-publicBooks">
        <div class="c-container">
            <div class="c-contents u-contents_public">
                <h1 class="c-title">みんなの本棚</h1>
                @if (count($books) > 0)
                    @foreach ($books as $book)
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
                            <li class="c-list c-list_bookName u-list_bookName">{{ $book->book_name }}</li>
                            <li class="c-list">
                                <form action="{{ url('public/detail/' . $book->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    <button type="submit" class="c-btn_small">
                                        <i class="fa fa-search" aria-hidden="true"></i> 本の詳細
                                    </button>
                                </form>
                            </li>
                        </ul>
                    @endforeach
                @endif
            </div>
            <div class="c-paginate u-paginate">
                {{ $books->links() }}
            </div>
        </div>
    </div>
@endsection