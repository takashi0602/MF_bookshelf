@extends('layouts.app')

@section('content')
    <div>
        @include('common.errors')
        <form enctype="multipart/form-data" action="{{ url('private/books') }}" method="POST">
            {{ csrf_field() }}
            <div>
                <div>
                    <label for="book-name">書籍名</label>
                    <input type="text" name="book_name" id="book-name">
                </div>
                <div>
                    <label for="book-price">価格</label>
                    <input type="number" name="book_price" id="book-price">
                </div>
                <div>
                    <label for="book-page">ページ数</label>
                    <input type="number" name="book_page" id="book-page">
                </div>
                <div>
                    <label for="published">出版日</label>
                    <input type="date" name="published" id="published">
                </div>
                <div>
                    <label for="book-description">説明</label>
                    <textarea name="book_description" id="book-description"></textarea>
                </div>
            </div>
            <div>
                <label for="book-img">画像</label>
                <input type="file" name="book_img" id="book-img">
            </div>
            <div>
                <div>
                    <button type="submit">
                        <i class="fa fa-plus" aria-hidden="true"></i> 本棚に入れる
                    </button>
                </div>
            </div>
        </form>
        @if (count($books) > 0)
            <div>
                <div>本一覧</div>
                <div>
                    <table>
                        <thead>
                            <th>&nbsp;</th>
                            <th>書籍名</th>
                            <th>ページ数</th>
                            <th>価格</th>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    <td>
                                        {{--<div><img src="upload/{{ $book->book_img }}" alt="" width="100"></div>--}}
                                        <div><img src="data:image/png;base64,{{ $book->book_img }}" alt="" width="100"></div>
                                    </td>
                                    <td>
                                        <div>{{ $book->book_name }}</div>
                                    </td>
                                    <td>
                                        @if($book->book_page === null)
                                            <div>-</div>
                                        @else
                                            <div>{{ $book->book_page }} ページ</div>
                                        @endif
                                    </td>
                                    <td>
                                        @if($book->book_price === null)
                                            <div>-</div>
                                        @else
                                            <div>￥ {{ $book->book_price }}</div>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ url('private/books/edit/' . $book->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            <button type="submit">
                                                <i class="fa fa-pencil" aria-hidden="true"></i> 更新
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ url('private/book/' . $book->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit">
                                                <i class="fa fa-trash" aria-hidden="true"></i> 削除
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
        <div>
            {{ $books->links()}}
        </div>
    </div>
@endsection