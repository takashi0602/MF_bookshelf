@extends('layouts.app')

@section('content')
    <div id="p-topPage">
        <div class="c-container">
            @include('common.errors')
            <div class="c-catchphrase">知識の海を泳げ。</div>
            @if (count($books) > 0)
                <div class="c-publicBooks_title">みんなの本棚</div>
                <div class="c-publicBooks_field">
                    @foreach ($books as $book)
                        @if ($book->flag === 'public')
                            <ul>
                                <li class="c-publicBooks_img"><img src="data:image/png;base64,{{ $book->book_img }}" alt="" width="100"></li>
                                <li class="c-publicBooks_name">{{ $book->book_name }}</li>
                                <li class="c-publicBooks_detail">
                                    <form action="{{ url('public/detail/' . $book->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        <button type="submit" class="c-publicBooks_btn">
                                            <i class="fa fa-search" aria-hidden="true"></i> 詳細
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        @endif
                    @endforeach
                </div>
            @endif
            <a href="/public" class="c-publicBooks_link"><i class="fa fa-search" aria-hidden="true"></i> もっと見る</a>
        </div>
    </div>
@endsection