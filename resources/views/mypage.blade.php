@extends('layouts.app')

@section('content')
    <div class="p-mypage">
        <div class="container">
            <h1 class="c-mypage_title">マイページ</h1>
            <ul class="c-mypage_profiles">
                <li class="c-mypage_profile">
                    <label class="c-mypage_profile_name" for="">名前：{{ Auth::user()->name }}</label>
                </li>
                <li class="c-mypage_profile">
                    <label class="c-mypage_profile_books" for="">登録した本：{{ count($books) }}冊</label>
                </li>
            </ul>
        </div>
    </div>
@endsection