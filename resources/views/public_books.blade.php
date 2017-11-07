@extends('layouts.app')

@section('content')
    <div class="p-publicBooks">
        <div class="c-container">
            @include('common.errors')
            @if (count($books) > 0)
                <div class="c-lists_wrapper">
                    <h1 class="c-title">みんなの本棚</h1>
                    @foreach ($books as $book)
                        <ul class="c-lists">
                            <li class="c-list">
                                <div class="c-list_bookImgWrapper">
                                    @if(preg_match("/^http:\/\//", $book->book_img))
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
                                    <button type="submit" class="c-btn_detail">
                                        <i class="fa fa-search" aria-hidden="true"></i> 本の詳細
                                    </button>
                                </form>
                            </li>
                        </ul>
                    @endforeach
                </div>
                <div class="c-paginate u-paginate">
                    {{ $books->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection