@extends('layouts.app')

@section('content')
    <div class="panel-body">
        @include('common.errors')

        @if (count($books) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    現在の本
                </div>
                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                            <th>公開日</th>
                            <th>タイトル</th>
                            <th>金額</th>
                            <th>詳細ページ</th>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    <td class="table-text">
                                        <div>{{ $book->published }}</div>
                                    </td>
                                    <td class="table-text">
                                        <div>{{ $book->item_name }}</div>
                                    </td>
                                    <td class="table-text">
                                        <div>{{ $book->item_name }}</div>
                                    </td>
                                    <td class="table-text">
                                        <div>{{ $book->item_amount }}</div>
                                    </td>
                                    <td>
                                        <form action="{{ url('public_description/' . $book->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-default">
                                                <i class="glyphicon glyphicon-search"></i> 詳細
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