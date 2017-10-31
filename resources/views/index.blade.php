@extends('layouts.app')

@section('content')
    <div id="p-topPage">
        <div class="c-container">
            @include('common.errors')
            <div class="c-catchphrase">知識の海を泳げ。</div>
            @if (count($books) > 0)
                <div class="c-publicBooks_title">みんなの本棚</div>
                @foreach ($books as $book)
                    @if ($book->flag === 'public')
                        <ul>
                            <li class="c-book_img">
                                <div><img src="data:image/png;base64,{{ $book->book_img }}" alt="" width="100"></div>
                            </li>
                            <li class="c-book_name">
                                <div>{{ $book->book_name }}</div>
                            </li>
                            <li class="c-book_detail">
                                <form action="{{ url('public/detail/' . $book->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    <button type="submit">
                                        <i class="fa fa-search" aria-hidden="true"></i> 詳細
                                    </button>
                                </form>
                            </li>
                        </ul>
                    @endif
                @endforeach
            @endif
            <div class="c-publicBooks_link">
                <a href="/public"><i class="fa fa-search" aria-hidden="true"></i>もっと見る</a>
            </div>
        </div>
    </div>
@endsection