@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('common.errors')
            <form action="{{ url('books/update') }}" method="POST">
                <div class="form-group">
                    <label for="item_name">書籍名</label>
                    {{ $book->item_name }}
                </div>

                <div class="form-group">
                    <label for="item_amount">価格</label>
                    {{ $book->item_amount }}
                </div>

                <div class="form-group">
                    <label for="published">出版日</label>
                    {{ $book->published }}
                </div>

                <div>
                    <a class="btn btn-link pull-right" href="{{ url('/public') }}">
                        <i class="glyphicon glyphicon-backward"></i> 戻る
                    </a>
                </div>

                <input type="hidden" name="id" value="{{ $book->id }}">

                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection