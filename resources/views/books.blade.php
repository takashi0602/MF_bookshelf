@extends('layouts.app')

@section('content')
    <div class="p-create">
        <div class="c-container">
            @include('common.errors')
            <form enctype="multipart/form-data" action="{{ url('private/books') }}" method="POST">
                {{ csrf_field() }}
                <div class="c-createBook_title">本の追加</div>
                <a class="c-isbnSearch_link" href="#">ISBNで検索する</a>
                <ul class="c-createBook_lists">
                    <li class="c-createBook_list">
                        <label for="book-name" class="createBook_label">書籍名</label>
                        <input type="text" name="book_name" id="book-name" class="c-createBook_textBox">
                    </li>
                    <li class="c-createBook_list">
                        <label for="book-price" class="createBook_label">価格</label>
                        <input type="number" name="book_price" id="book-price" class="c-createBook_number">
                    </li>
                    <li class="c-createBook_list">
                        <label for="book-page" class="createBook_label">ページ数</label>
                        <input type="number" name="book_page" id="book-page" class="c-createBook_number">
                    </li>
                    <li class="c-createBook_list">
                        <label for="published" class="createBook_label">出版日</label>
                        <input type="date" name="published" id="published" class="c-createBook_date">
                    </li>
                    <li class="c-createBook_list">
                        <label for="author" class="createBook_label">著者</label>
                        <input type="text" name="author" id="author" class="c-createBook_textBox">
                    </li>
                    <li class="c-createBook_list">
                        <label for="book-description" class="createBook_label">説明</label>
                        <textarea name="book_description" id="book-description" class="c-createBook_textArea"></textarea>
                    </li>
                    <li class="c-createBook_list">
                        <label for="book-img" class="createBook_label">画像</label>
                        <input type="file" name="book_img" id="book-img" class="c-createBook_file">
                    </li>
                    <li class="c-createBook_list">
                        <label for="flag" class="createBook_label">公開設定</label>
                        <input type="radio" name="flag" id="flag" value="public" checked> 公開
                        <input type="radio" name="flag" id="flag" value="private"> 非公開
                    </li>
                </ul>
                <button type="submit" class="c-createBook_btn">
                    <i class="fa fa-plus" aria-hidden="true"></i> 本棚に入れる
                </button>
            </form>
            @if (count($books) > 0)
                <div class="c-privateBooks">自分の本棚</div>
                @foreach ($books as $book)
                    <ul class="c-privateBooks_lists">
                        <li class="c-privateBooks_list"><img src="data:image/png;base64,{{ $book->book_img }}" alt="" width="100"></li>
                        <li class="c-privateBooks_list">{{ $book->book_name }}</li>
                        <li class="c-privateBooks_list">
                            <form action="{{ url('private/detail/' . $book->id) }}" method="POST">
                                {{ csrf_field() }}
                                <button type="submit" class="c-publicBooks_btn">
                                    <i class="fa fa-search" aria-hidden="true"></i> 詳細
                                </button>
                            </form>
                        </li>
                        <li class="c-privateBooks_list">
                            <form action="{{ url('private/books/edit/' . $book->id) }}" method="POST">
                                {{ csrf_field() }}
                                <button type="submit" class="c-publicBooks_btn">
                                    <i class="fa fa-pencil" aria-hidden="true"></i> 更新
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