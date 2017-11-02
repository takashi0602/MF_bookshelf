@extends('layouts.app')

@section('content')
    <div>
        <div>
            @include('common.errors')
            <form action="{{ url('books/update') }}" method="POST">
                <img src="data:image/png;base64,{{ $book->book_img }}" alt="" width="300">
                <div>
                    <label for="item_name">書籍名</label>
                    {{ $book->book_name }}
                </div>
                <div>
                    <label for="item_name">ページ数</label>
                    @if($book->book_page === null)  -
                    @else   {{ $book->book_page }} ページ
                    @endif
                </div>
                <div>
                    <label for="item_amount">価格</label>
                    @if($book->book_price === null)  -
                    @else   ￥ {{ $book->book_price }}
                    @endif
                </div>
                <div>
                    <label for="published">出版日</label>
                    @if($book->published === null)  -
                    @else   {{ $book->published }}
                    @endif
                </div>
                <div>
                    <label for="author">著者</label>
                    @if($book->author === null)  -
                    @else   {{ $book->author }}
                    @endif
                </div>
                <div>
                    <label for="book_description">説明</label>
                    @if($book->book_description === null)  -
                    @else   {{ $book->book_description }}
                    @endif
                </div>
                <div>
                    @if(strstr($_SERVER['REQUEST_URI'], 'private') == true)
                    <a href="{{ url('/private') }}">
                        <i class="fa fa-chevron-left" aria-hidden="true"></i> 戻る
                    </a>
                    @else
                        <a href="{{ url('/public') }}">
                            <i class="fa fa-chevron-left" aria-hidden="true"></i> 戻る
                        </a>
                    @endif
                </div>
                <input type="hidden" name="id" value="{{ $book->id }}">
                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection