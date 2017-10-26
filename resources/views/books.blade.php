@extends('layouts.app')

@section('content')
    <div class="panel-body">
        @include('common.errors')
        <form enctype="multipart/form-data" action="{{ url('private/books') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <div class="form-group">
                <div class="col-sm-6">
                    <label for="name" class="col-sm-3 control-label">書籍名</label>
                    <input type="text" name="book_name" id="book-name" class="form-control">
                </div>

                <div class="col-sm-6">
                    <label for="price" class="col-sm-3 control-label">価格</label>
                    <input type="number" name="book_price" id="book-price" class="form-control">
                </div>

                <div class="col-sm-6">
                    <label for="price" class="col-sm-3 control-label">ページ数</label>
                    <input type="number" name="book_price" id="book-price" class="form-control">
                </div>

                <div class="col-sm-6">
                    <label for="published" class="col-sm-3 control-label">出版日</label>
                    <input type="date" name="published" id="book-published" class="form-control">
                </div>

                <div class="col-sm-6">
                    <label for="book_description" class="col-sm-3 control-label">説明</label>
                    <textarea name="book_description" id="book-description" class="form-control"></textarea>
                </div>
            </div>

            <div class="col-sm-6">
                <label>画像</label>
                <input type="file" name="book_img">
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus" aria-hidden="true"></i> 本棚に入れる
                    </button>
                </div>
            </div>
        </form>
        @if (count($books) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">本一覧</div>
                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                            <th>&nbsp;</th>
                            <th>書籍名</th>
                            <th>ページ数</th>
                            <th>値段</th>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    <td class="table-text">
                                        <div><img src="upload/{{ $book->book_img }}" alt="" width="100"></div>
                                    </td>
                                    <td class="table-text">
                                        <div>{{ $book->book_name }}</div>
                                    </td>
                                    <td class="table-text">
                                        @if($book->book_page === null)
                                            <div>-</div>
                                        @else
                                            <div>{{ $book->book_page }} ページ</div>
                                        @endif
                                    </td>
                                    <td class="table-text">
                                        @if($book->book_price === null)
                                            <div>-</div>
                                        @else
                                            <div>￥ {{ $book->book_price }}</div>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ url('private/books/edit/' . $book->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fa fa-pencil" aria-hidden="true"></i> 更新
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ url('private/book/' . $book->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" class="btn btn-danger">
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
        <div class="col-md-4 col-md-offset-4">
            {{ $books->links()}}
        </div>
    </div>
@endsection