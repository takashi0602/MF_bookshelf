<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Bookshelf') }}</title>
        <link rel="stylesheet" href="{{ asset('css/assets/css/font-awesome.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <header class="l-header">
            <img src="{{ asset('img/logo.png') }}" alt="" class="l-headerTitle_img">
            <h1 class="l-headerTitle_header"><a href="{{ url('/') }}" class="l-headerTitle_link">{{ config('app.name', 'Laravel') }}</a></h1>
            <nav class="l-headerNav">
                <ul class="l-headerMenu">
                @guest
                    <li class="l-headerMenu_list"><a href="{{ route('login') }}" class="l-headerMenu_link"><i class="fa fa-sign-in" aria-hidden="true"></i> サインイン</a></li>
                    <li class="l-headerMenu_list"><a href="{{ route('register') }}" class="l-headerMenu_link"><i class="fa fa-user-plus" aria-hidden="true"></i> サインアップ</a></li>
                @else
                    <li class="l-headerMenu_list"><a href="{{ url('/private') }}" class="l-headerMenu_link"><i class="fa fa-user" aria-hidden="true"></i> じぶんの本棚</a></li>
                    <li class="l-headerMenu_list"><a href="{{ url('/public') }}" class="l-headerMenu_link"><i class="fa fa-users" aria-hidden="true"></i> みんなの本棚</a></li>
                    <li class="l-headerMenu_list"><a href="#" class="l-headerMenu_link">{{ Auth::user()->name }}</a></li>
                    <li><a href="{{ route('logout') }}" class="l-headerMenu_link" onclick="event.preventDefault(); document.getElementById('headerMenu_form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i> サインアウト</a></li>
                    <form id="headerMenu_form" class="l-headerMenu_form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                @endguest
                </ul>
            </nav>
        </header>
        @yield('nav')
        @yield('content')
        <div class="l-footer">
            <div class="l-footerCopyright">Copyright 2017 ASS All Rights Reserved</div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>