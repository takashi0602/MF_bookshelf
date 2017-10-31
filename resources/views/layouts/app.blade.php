<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Bookshelf') }}</title>
        <link rel="stylesheet" href="{{ asset('css/assets/css/font-awesome.css') }}">
        <link rel="stylesheet" href="{{ asset('css/assets/css/docs.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <div id="header">
            <div class="c-container">
                <div class="c-headerTitle">
                    <img src="#" alt="" class="c-headerTitle_logo">
                    <a href="{{ url('/') }}" class="c-headerTitle_link">{{ config('app.name', 'Laravel') }}</a>
                </div>
                @guest
                    <li><a href="{{ route('login') }}" class="c-headerMenu_signIn"><i class="fa fa-sign-in" aria-hidden="true"></i> サインイン</a></li>
                    <li><a href="{{ route('register') }}" class="c-headerMenu_signUp"><i class="fa fa-user-plus" aria-hidden="true"></i> サインアップ</a></li>
                @else
                    <li><a href="{{ url('/private') }}" class="c-headerMenu_private"><i class="fa fa-user" aria-hidden="true"></i> じぶんの本棚</a></li>
                    <li><a href="{{ url('/public') }}" class="c-headerMenu_public"><i class="fa fa-users" aria-hidden="true"></i> みんなの本棚</a></li>
                    <li>
                        <a href="#" class="c-headerMenu_myPage">{{ Auth::user()->name }}</a>
                        <a href="{{ route('logout') }}" class="c-headerMenu_signOut" onclick="event.preventDefault(); document.getElementById('headerMenu_form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i> サインアウト</a>
                        <form id="headerMenu_form" class="c-headerMenu_form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                    </li>
                @endguest
            </div>
        </div>
        @yield('nav')
        @yield('content')
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>