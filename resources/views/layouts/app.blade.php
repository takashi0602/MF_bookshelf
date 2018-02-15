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
        <div class="l-wrapper">
            @yield('header')
            @yield('nav')
            <div class="l-main">
                @yield('content')
            </div>
            @yield('footer')
            <script src="{{ asset('js/app.js') }}"></script>
        </div>
    </body>
</html>