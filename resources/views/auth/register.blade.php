@extends('layouts.app')

@section('nav')
<div id="main">
    <div class="container">
        <div class="c-mainTitle">サインアップ</div>
        <form method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
            <ul>
                <li>
                    <div class="c-registerTitle">Bookshelfにサインアップ</div>
                </li>
                <li class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label class="c-registerItem" for="name">ユーザネーム</label>
                    <div class="c-inputField">
                        <input class="c-registerBox" id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                        @if ($errors->has('name'))
                            <span>
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </li>
                <li class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label class="c-registerItem" for="email">メールアドレス</label>
                    <div class="c-inputField">
                        <input class="c-registerBox" id="email" type="email" name="email" value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                            <span>
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </li>
                <li class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label class="c-registerItem" for="password">パスワード</label>
                    <div class="c-inputField">
                        <input class="c-registerBox" id="password" type="password" name="password" required>
                        @if ($errors->has('password'))
                            <span>
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </li>
                <li>
                    <label class="c-registerItem" for="password-confirm">パスワード(再入力)</label>
                    <div class="c-inputField">
                        <input class="c-registerBox" id="password-confirm" type="password" name="password_confirmation" required>
                    </div>
                </li>
            </ul>
            <ul>
                <li><div class="c-registerTitle">外部サービスでサインアップ</div></li>
                <li><a href="{{ url('/auth/github') }}"><i class="fa fa-github"></i> Github</a></li>
                <li><a href="{{ url('/auth/twitter') }}"><i class="fa fa-twitter"></i> Twitter</a></li>
                <li><a href="{{ url('/auth/facebook') }}"><i class="fa fa-facebook"></i> Facebook</a></li>
            </ul>
            <div class="c-button">
                <button class="c-button_register" type="submit">サインアップ</button>
            </div>
        </form>
    </div>
</div>
@endsection
