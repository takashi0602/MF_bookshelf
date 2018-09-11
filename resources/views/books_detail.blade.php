@extends('layouts.app')

@include('layouts.header')
@include('layouts.footer')

@section('content')
    <div class="p-detail">
        <div class="c-container">
            <div class="c-contents u-contents_detail">
                <h1 class="c-title">本の詳細</h1>
                <form action="{{ url('/book/update') }}" method="POST">
                    <ul class="c-lists">
                        <li class="c-list">
                            <div class="c-list_bookImgWrapper">
                                <img src="{{ $book->book_img }}" alt="" class="c-list_bookImg">
                            </div>
                        </li>
                    </ul>
                    <table class="c-table">
                        <tr class="c-table_row">
                            <th class="c-table_head">書籍名</th>
                            <td class="c-table_data">{{ $book->book_name }}</td>
                        </tr>
                        <tr class="c-table_row">
                            <th class="c-table_head">ページ数</th>
                            @if($book->book_page === null)
                                <td class="c-table_data c-table_center">-</td>
                            @else
                                <td class="c-table_data">{{ $book->book_page }} ページ</td>
                            @endif
                        </tr>
                        <tr class="c-table_row">
                            <th class="c-table_head">出版日</th>
                            @if($book->published === null)
                                <td class="c-table_data c-table_center">-</td>
                            @else
                                <td class="c-table_data">{{ $book->published }}</td>
                            @endif
                        </tr>
                        <tr class="c-table_row">
                            <th class="c-table_head">著者</th>
                            @if($book->author === null)
                                <td class="c-table_data c-table_center">-</td>
                            @else
                                <td class="c-table_data">{{ $book->author }}</td>
                            @endif
                        </tr>
                        <tr class="c-table_row">
                            <th class="c-table_head">説明</th>
                            @if($book->book_description === null)
                                <td class="c-table_data c-table_center">-</td>
                            @else
                                <td class="c-table_data">{{ $book->book_description }}</td>
                            @endif
                        </tr>
                        <tr class="c-table_row">
                            <th class="c-table_head">登録ユーザー</th>
                            <td class="c-table_data">{{ $userName }}</td>
                        </tr>
                    </table>
                    <div class="c-bookLink">
                        @if(strstr($_SERVER['REQUEST_URI'], 'private') == true)
                            <a href="{{ url('/private') }}" class="c-link u-link">
                                <i class="fa fa-chevron-left" aria-hidden="true"></i> 戻る
                            </a>
                        @else
                            <a href="{{ url('/public') }}" class="c-link u-link">
                                <i class="fa fa-chevron-left" aria-hidden="true"></i> 戻る
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection