@extends('layouts.app')

@section('nav')
<div class="p-signIn">
    <div class="c-container">
        <h1 class="c-title">サインイン</h1>
        <form method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="c-signInInternal">
                <h2 class="signInInternal_title">Bookshelfアカウントでサインイン</h2>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} c-signIn_email">
                    <label class="c-label" for="email">メールアドレス</label>
                    <input class="c-email" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <strong>{{ $errors->first('email') }}</strong>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} c-signIn_password">
                    <label class="c-signInLabel_password" for="password">パスワード</label>
                    <input class="c-password" id="password" type="password" name="password" required>
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
                    <button class="c-btn_large" type="submit"><i class="fa fa-sign-in" aria-hidden="true"></i> サインイン</button>
                </div>
                <div class="c-signIn_message">
                    <a class="c-link" href="{{ route('password.request') }}">パスワードを忘れましたか？</a>
                </div>
            </div>
            <div class="c-signInExternal">
                <h2 class="c-signInExternal_title">外部サービスからサインイン</h2>
                <ul class="c-lists">
                    <li class="c-list">
                        <button type="button" class="c-btn_github">
                            <a href="{{ url('/auth/github') }}" class="c-link_innerBtn"><i class="fa fa-github"></i> Github</a>
                        </button>
                    </li>
                    <li class="c-list">
                        <button type="button" class="c-btn_twitter">
                            <a href="{{ url('/auth/twitter') }}" class="c-link_innerBtn"><i class="fa fa-twitter"></i> Twitter</a>
                        </button>
                    </li>
                    <li class="c-list">
                        <button type="button" class="c-btn_facebook">
                            <a href="{{ url('/auth/facebook') }}" class="c-link_innerBtn"><i class="fa fa-facebook"></i> Facebook</a>
                        </button>
                    </li>
                </ul>
            </div>
        </form>
    </div>
</div>
@endsection
