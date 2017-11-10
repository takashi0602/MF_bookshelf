@extends('layouts.app')

@include('layouts.header')
@include('layouts.footer')

@section('content')
    <div class="p-mypage">
        <div class="c-container">
            <div class="c-contents u-contents_mypage">
                <h1 class="c-title">マイページ</h1>
                <ul class="c-lists">
                    <li class="c-list">
                        <div class="c-mypage_status">名前：{{ Auth::user()->name }}</div>
                    </li>
                    <li class="c-list">
                        <div class="c-mypage_status">登録した本：{{ count($books) }}冊</div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection