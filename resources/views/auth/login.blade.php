@extends('layouts.app')

@include('layouts.header')
@include('layouts.footer')

@section('nav')
<div class="p-signIn">
    <div class="c-container">
        <div class="c-contents u-contents">
            <h1 class="c-title">サインイン</h1>
            <form method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="c-content u-content_left">
                    <h2>Bookshelfアカウントでサインイン</h2>
                    <ul class="c-lists">
                        <li class="form-group{{ $errors->has('email') ? ' has-error' : '' }} c-list">
                            <label class="c-label" for="email">メールアドレス <span class="c-required">*</span></label>
                            <input class="c-email" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                                <strong>{{ $errors->first('email') }}</strong>
                            @endif
                        </li>
                        <li class="form-group{{ $errors->has('password') ? ' has-error' : '' }} c-list">
                            <label class="c-label" for="password">パスワード <span class="c-required">*</span></label>
                            <input class="c-password" id="password" type="password" name="password" required>
                            @if ($errors->has('password'))
                                <strong>{{ $errors->first('password') }}</strong>
                            @endif
                        </li>
                        <li class="c-list">
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label>パスワードを記憶する</label>
                        </li>
                    </ul>
                    <button class="c-btn_large u-btn_large" type="submit"><i class="fa fa-sign-in" aria-hidden="true"></i> サインイン</button>
                    <a class="c-link" href="{{ route('password.request') }}">パスワードを忘れましたか？</a>
                </div>
                <div class="c-content">
                    <h2 class="u-title">外部サービスからサインイン</h2>
                    <ul class="c-lists">
                        <li class="c-list">
                            <button type="button" class="c-btn_github u-btn_sns">
                                <a href="{{ url('/auth/github') }}" class="c-link_innerBtn"><i class="fa fa-github"></i> Github</a>
                            </button>
                        </li>
                        <li class="c-list">
                            <button type="button" class="c-btn_twitter u-btn_sns">
                                <a href="{{ url('/auth/twitter') }}" class="c-link_innerBtn"><i class="fa fa-twitter"></i> Twitter</a>
                            </button>
                        </li>
                        <li class="c-list">
                            <button type="button" class="c-btn_facebook u-btn_sns">
                                <a href="{{ url('/auth/facebook') }}" class="c-link_innerBtn"><i class="fa fa-facebook"></i> Facebook</a>
                            </button>
                        </li>
                    </ul>
                </div>
                <div class="c-content_clear"></div>
            </form>
        </div>
    </div>
</div>
@endsection
