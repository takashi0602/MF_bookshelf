@extends('layouts.app')

@section('nav')
<div class="p-signIn">
    <div class="c-container">
        <h1 class="c-signIn_title">サインイン</h1>
        <form method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="c-signInInternal">
                <h2 class="signInInternal_title">Bookshelfアカウントでサインイン</h2>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} c-signIn_email">
                    <label class="c-signInLabel_email" for="email">メールアドレス</label>
                    <input class="c-signInForm_email" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <strong>{{ $errors->first('email') }}</strong>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} c-signIn_password">
                    <label class="c-signInLabel_password" for="password">パスワード</label>
                    <input class="c-signInForm_password" id="password" type="password" name="password" required>
                    @if ($errors->has('password'))
                        <strong>{{ $errors->first('password') }}</strong>
                    @endif
                </div>
                <div class="c-signIn_remember">
                    <label class="c-signInLabel_remember">
                        <input class="c-signInForm_remember" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>&nbsp;パスワードを記憶する
                    </label>
                </div>
                <div class="c-signIn_Button">
                    <button class="c-signInBtn" type="submit"><i aria-hidden="true"></i> サインイン</button>
                </div>
                <div class="c-signIn_message">
                    <a class="c-signInMsg" href="{{ route('password.request') }}">パスワードを忘れましたか？</a>
                </div>
            </div>
            <div class="c-signInExternal">
                <h2 class="c-signInExternal_title">外部サービスからサインイン</h2>
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
