@extends('layouts.app')

@section('content')
    <div id="p-myBooks">
        <div class="c-container">
            @include('common.errors')
            <form enctype="multipart/form-data" action="{{ url('private/books') }}" method="POST">
                {{ csrf_field() }}
                <div class="c-createBook_title">本の追加</div>
                <a href="#">ISBNで検索する</a>
                <ul class="c-createBook">
                    <li class="c-createBook_item">
                        <label for="book-name">書籍名</label>
                        <input type="text" name="book_name" id="book-name">
                    </li>
                    <li class="c-createBook_item">
                        <label for="book-price">価格</label>
                        <input type="number" name="book_price" id="book-price">
                    </li>
                    <li class="c-createBook_item">
                        <label for="book-page">ページ数</label>
                        <input type="number" name="book_page" id="book-page">
                    </li>
                    <li class="c-createBook_item">
                        <label for="published">出版日</label>
                        <input type="date" name="published" id="published">
                    </li>
                    <li class="c-createBook_item">
                        <label for="author">著者</label>
                        <input type="text" name="author" id="author">
                    </li>
                    <li class="c-createBook_item">
                        <label for="book-description">説明</label>
                        <textarea name="book_description" id="book-description"></textarea>
                    </li>
                    <li class="c-createBook_item">
                        <label for="book-img">画像</label>
                        <input type="file" name="book_img" id="book-img">
                    </li>
                    <li class="c-createBook_item">
                        <label for="flag">公開設定</label>
                        <input type="radio" name="flag" id="flag" value="public" checked> 公開
                        <input type="radio" name="flag" id="flag" value="private"> 非公開
                    </li>
                </ul>
                <button type="submit" class="c-createBook_btn">
                    <i class="fa fa-plus" aria-hidden="true"></i> 本棚に入れる
                </button>
            </form>
            @if (count($books) > 0)
                <div class="c-myBooks">自分の本棚</div>
                @foreach ($books as $book)
                    <ul class="c-myBooksList">
                        <li class="c-myBooksList_img">
                            <div><img src="data:image/png;base64,{{ $book->book_img }}" alt="" width="100"></div>
                        </li>
                        <li class="c-myBooksList_name">
                            <div>{{ $book->book_name }}</div>
                        </li>
                        <li class="c-myBooksList_detail">
                            <form action="{{ url('public/detail/' . $book->id) }}" method="POST">
                                {{ csrf_field() }}
                                <button type="submit" class="c-publicBooks_btn">
                                    <i class="fa fa-search" aria-hidden="true"></i> 詳細
                                </button>
                            </form>
                        </li>
                    </ul>
                @endforeach
            @endif
            <div class="c-paginate">
                {{ $books->links()}}
            </div>
        </div>
    </div>
@endsection

{{--<li>--}}
{{--<form action="{{ url('private/books/edit/' . $book->id) }}" method="POST">--}}
{{--{{ csrf_field() }}--}}
{{--<button type="submit">--}}
{{--<i class="fa fa-pencil" aria-hidden="true"></i> 更新--}}
{{--</button>--}}
{{--</form>--}}
{{--</li>--}}
{{--<li>--}}
{{--<form action="{{ url('private/book/' . $book->id) }}" method="POST">--}}
{{--{{ csrf_field() }}--}}
{{--{{ method_field('DELETE') }}--}}
{{--<button type="submit">--}}
{{--<i class="fa fa-trash" aria-hidden="true"></i> 削除--}}
{{--</button>--}}
{{--</form>--}}
{{--</li>--}}