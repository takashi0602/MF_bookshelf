@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('common.errors')
            <form action="{{ url('private/books/update') }}" method="POST">
                <div class="form-group">
                    <label for="item_name">書籍名</label>
                    <input type="text" id="item_name" name="item_name" class="form-control" value="{{ $book->item_name }}">
                </div>

                <div class="form-group">
                    <label for="item_amount">金額</label>
                    <input type="text" id="item_amount" name="item_amount" class="form-control" value="{{ $book->item_amount }}">
                </div>


                <div class="form-group">
                    <label for="published">出版社</label>
                    <input type="datetime" id="published" name="published" class="form-control" value="{{ $book->published }}">
                </div>

                <!-- TODO: 画像選択処理 -->

                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">更新</button>
                    <a class="btn btn-link pull-right" href="{{ url('/private') }}">
                        <i class="glyphicon glyphicon-backward"></i> 戻る
                    </a>
                </div>

                <input type="hidden" name="id" value="{{ $book->id }}">

                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection