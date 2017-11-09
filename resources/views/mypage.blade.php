@extends('layouts.app')

@include('layouts.header')
@include('layouts.footer')

@section('content')
    <div class="p-mypage">
        <div class="c-container">
            <h1 class="c-title">マイページ</h1>
            <ul class="c-lists">
                <li class="c-list">
                    <div class="c-mypage_profileName">名前：{{ Auth::user()->name }}</div>
                </li>
                <li class="c-list">
                    <div class="c-mypage_profileBook">登録した本：{{ count($books) }}冊</div>
                </li>
            </ul>
        </div>
    </div>
@endsection