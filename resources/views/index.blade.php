@extends('layouts.app')

@section('content')
    <div class="p-topPage">
        <div class="c-container">
            @include('common.errors')
            <div class="c-catchphrase">
                <h1 class="c-catchphrase_text">知識の海を泳げ。</h1>
            </div>
            @if (count($books) > 0)
                <h2 class="c-publicBooks_title">みんなの本棚</h2>
                <div class="c-publicBooks_field">
                    @foreach ($books as $book)
                        @if ($book->flag === 'public')
                            <ul>
                                @if(preg_match("/^http:\/\//", $book->book_img))
                                    <li class="c-publicBooks_img"><img src="{{ $book->book_img }}" alt="" width="100"></li>
                                @else
                                    <li class="c-publicBooks_img"><img src="data:image/png;base64,{{ $book->book_img }}" alt="" width="100"></li>
                                @endif
                                <li class="c-publicBooks_name">{{ $book->book_name }}</li>
                            </ul>
                        @endif
                    @endforeach
                </div>
            @endif
            <a href="/public" class="c-publicBooks_link"><i class="fa fa-search" aria-hidden="true"></i> もっと見る</a>
        </div>
    </div>
@endsection