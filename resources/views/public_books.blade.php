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
                                    <img src="{{ $book->book_img }}" alt="" class="c-list_bookImg">
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