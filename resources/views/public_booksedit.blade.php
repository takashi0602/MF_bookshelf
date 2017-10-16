@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('common.errors')
            <form action="{{ url('books/update') }}" method="POST">
                <div class="form-group">
                    <label for="item_name">Title</label>
                    {{ $book->item_name }}
                </div>

                <div class="form-group">
                    <label for="item_name">Description</label>
                    {{!! $book->item_description !!}}
                </div>

                <div class="form-group">
                    <label for="item_number">Number</label>
                    {{ $book->item_number }}
                </div>

                <div class="form-group">
                    <label for="item_amount">Amount</label>
                    {{ $book->item_amount }}
                </div>

                <div class="form-group">
                    <label for="published">Published</label>
                    {{ $book->published }}
                </div>

                <div class="well well-sm">
                    <a class="btn btn-link pull-right" href="{{ url('/') }}">
                        <i class="glyphicon glyphicon-backward"></i> Back
                    </a>
                </div>

                <input type="hidden" name="id" value="{{ $book->id }}">

                {{ csrf_field() }}
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
@endsection