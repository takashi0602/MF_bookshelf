@extends('layouts.app')

@section('content')
    <div id="p-publicBooks">
        <div class="c-container">
            @include('common.errors')
            @if (count($books) > 0)
                <div class="c-publicBooks">みんなの本棚</div>
                @foreach ($books as $book)
                    <ul class="c-publicBooksList">
                        <li class="c-publicBooksList_img">
                            <div><img src="data:image/png;base64,{{ $book->book_img }}" alt="" width="100"></div>
                        </li>
                        <li class="c-publicBooksList_name">
                            <div>{{ $book->book_name }}</div>
                        </li>
                        <li class="c-publicBooksList_detail">
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