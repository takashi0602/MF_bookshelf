@extends('layouts.app')

@section('content')
    <div>
        @include('common.errors')
        TOPページだYO！
        <!-- TODO: 以下サンプルコードのため要修正 -->
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
                        <th>詳細ページ</th>
                        </thead>
                        <tbody>
                        @foreach ($books as $book)
                            @if ($book->flag === 'public' )
                                <tr>
                                    <td>
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
                                        <form action="{{ url('public/detail/' . $book->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            <button type="submit">
                                                <i class="fa fa-search" aria-hidden="true"></i> 詳細
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
@endsection