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
        <div>
            <nav>
                <div class="container">
                    <div>
                        <a href="{{ url('/') }}">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                    </div>
                    <div>
                        <ul>
                            @guest
                            <li><a href="{{ route('login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> サインイン</a></li>
                            <li><a href="{{ route('register') }}"><i class="fa fa-user-plus" aria-hidden="true"></i> サインアップ</a></li>
                            @else
                                <li>
                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
                                    <ul role="menu">
                                        <li><a href="{{ url('/public') }}"><i class="fa fa-users" aria-hidden="true"></i> みんなの本棚</a></li>
                                        <li><a href="{{ url('/private') }}"><i class="fa fa-user" aria-hidden="true"></i> じぶんの本棚</a></li>
                                        <li>
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i> サインアウト</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
            @yield('nav')
        </div>
        @yield('content')
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>