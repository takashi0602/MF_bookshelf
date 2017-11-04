@extends('layouts.app')

@section('nav')
<div class="p-login">
    <div class="container">
        <h1 class="c-login_title">サインイン</h1>
        <form method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="c-loginInternal">
                <h2 class="loginInternal_title">Bookshelfアカウントでサインイン</h2>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} c-login_email">
                    <label class="c-loginLabel_email" for="email">メールアドレス</label>
                    <input class="c-loginForm_email" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <strong>{{ $errors->first('email') }}</strong>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} c-login_password">
                    <label class="c-loginLabel_password" for="password">パスワード</label>
                    <input class="c-loginForm_password" id="password" type="password" name="password" required>
                    @if ($errors->has('password'))
                        <strong>{{ $errors->first('password') }}</strong>
                    @endif
                </div>
                <div class="c-login_remember">
                    <label class="c-loginLabel_remember">
                        <input class="c-loginForm_remember" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>&nbsp;パスワードを記憶する
                    </label>
                </div>
                <div class="c-login_Button">
                    <button class="c-loginBtn" type="submit"><i aria-hidden="true"></i> サインイン</button>
                </div>
                <div class="c-login_message">
                    <a class="c-loginMsg" href="{{ route('password.request') }}">パスワードを忘れましたか？</a>
                </div>
            </div>
            <div class="c-loginExternal">
                <h2 class="c-loginExternal_title">外部サービスからサインイン</h2>
                <ul>
                    <li><a href="{{ url('/auth/github') }}"><i class="fa fa-github"></i> Github</a></li>
                    <li><a href="{{ url('/auth/twitter') }}"><i class="fa fa-twitter"></i> Twitter</a></li>
                    <li><a href="{{ url('/auth/facebook') }}"><i class="fa fa-facebook"></i> Facebook</a></li>
                </ul>
            </div>
        </form>
    </div>
</div>
@endsection
