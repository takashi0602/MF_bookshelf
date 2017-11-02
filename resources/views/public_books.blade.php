@extends('layouts.app')

@section('content')
    <div id="p-publicBooks">
        <div class="c-container">
            @include('common.errors')
            @if (count($books) > 0)
                <h1 class="c-publicBooks_title">みんなの本棚</h1>
                @foreach ($books as $book)
                    <ul class="publicBooks_lists">
                        <li class="c-publicBooks_list"><img src="data:image/png;base64,{{ $book->book_img }}" alt="" width="100"></li>
                        <li class="c-publicBooks_list">{{ $book->book_name }}</li>
                        <li class="c-publicBooks_list">
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
                {{ $books->links() }}
            </div>
        </div>
    </div>
@endsection