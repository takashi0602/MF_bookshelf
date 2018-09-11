@extends('layouts.app')

@include('layouts.header')
@include('layouts.footer')

@section('content')
    <div class="p-create">
        <div class="c-container">
            <div class="c-contents u-contents_private">
                <h1 class="c-title">じぶんの本棚</h1>
                <a href="{{ url('/book/add') }}" class="c-link u-link">本を追加する</a>
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
                                <button type="button" class="c-btn_small">
                                    <a href="{{ url('private/detail/' . $book->id) }}">
                                        <i class="fa fa-search" aria-hidden="true"></i> 本の詳細
                                    </a>
                                </button>
                            </li>
                            <li class="c-list">
                                <button type="button" class="c-btn_small">
                                    <a href="{{ url('/book/edit/' . $book->id) }}">
                                        <i class="fa fa-pencil" aria-hidden="true"></i> 本の編集
                                    </a>
                                </button>
                            </li>
                        </ul>
                    @endforeach
                @else
                    <div class="c-center">書籍はまだ登録されていません。</div>
                @endif
            </div>
            <div class="c-paginate u-paginate">
                {{ $books->links()}}
            </div>
        </div>
    </div>
@endsection