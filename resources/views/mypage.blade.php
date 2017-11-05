@extends('layouts.app')

@section('content')
    <div class="p-mypage">
        <div class="c-container">
            <h1 class="c-mypage_title">マイページ</h1>
            <ul class="c-mypage_profiles">
                <li class="c-mypage_profile">
                    <div class="c-mypage_profileName">名前：{{ Auth::user()->name }}</div>
                </li>
                <li class="c-mypage_profile">
                    <div class="c-mypage_profileBook">登録した本：{{ count($books) }}冊</div>
                </li>
            </ul>
        </div>
    </div>
@endsection