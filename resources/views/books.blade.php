@extends('layouts.app')

@section('content')
    <div class="panel-body">
        @include('common.errors')
        <form enctype="multipart/form-data" action="{{ url('private/books') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <div class="form-group">
                <div class="col-sm-6">
                    <label for="name" class="col-sm-3 control-label">書籍名</label>
                    <input type="text" name="item_name" id="book-name" class="form-control">
                </div>

                <div class="col-sm-6">
                    <label for="amount" class="col-sm-3 control-label">価格</label>
                    <input type="number" name="item_amount" id="book-amount" class="form-control">
                </div>

                <div class="col-sm-6">
                    <label for="amount" class="col-sm-3 control-label">ページ数</label>
                    <input type="number" name="item_amount" id="book-amount" class="form-control">
                </div>

                <div class="col-sm-6">
                    <label for="published" class="col-sm-3 control-label">出版社</label>
                    <input type="date" name="published" id="book-published" class="form-control">
                </div>
            </div>

            <div class="col-sm-6">
                <label>画像</label>
                <input type="file" name="item_img">
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="glyphicon glyphicon-plus"></i> 保存
                    </button>
                </div>
            </div>
        </form>
        @if (count($books) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    現在の本
                </div>
                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                            <th>本一覧</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    <td class="table-text">
                                        <div>{{ $book->item_name }}</div>
                                        <div><img src="upload/{{ $book->item_img }}" alt="" width="100"></div>
                                    </td>
                                    <td>
                                        <form action="{{ url('private/books/edit/' . $book->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-primary">
                                                <i class="glyphicon glyphicon-pencil"></i> 更新
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ url('private/book/' . $book->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" class="btn btn-danger">
                                                <i class="glyphicon glyphicon-trash"></i> 削除
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