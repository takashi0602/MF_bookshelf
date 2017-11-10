@extends('layouts.app')

@include('layouts.header')
@include('layouts.footer')

@section('nav')
<div class="p-signUp">
    <div class="c-container">
        <div class="c-contents u-contents_signup">
            <h1 class="c-title">サインアップ</h1>
            <form method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                <div class="c-content">
                    <h2>Bookshelfにサインアップ</h2>
                    <ul class="c-lists">
                        <li class="form-group{{ $errors->has('name') ? ' has-error' : '' }} c-list">
                            <label class="c-label u-label_signup" for="name">ユーザネーム <span class="c-required">*</span></label>
                            <input class="c-textBox" id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                        </li>
                        <li class="form-group{{ $errors->has('email') ? ' has-error' : '' }} c-list">
                            <label class="c-label u-label_signup" for="email">メールアドレス <span class="c-required">*</span></label>
                            <input class="c-email" id="email" type="email" name="email" value="{{ old('email') }}" required>
                        </li>
                        <li class="form-group{{ $errors->has('password') ? ' has-error' : '' }} c-list">
                            <label class="c-label u-label_signup" for="password">パスワード <span class="c-required">*</span></label>
                            <input class="c-password" id="password" type="password" name="password" required>
                        </li>
                        <li class="c-list">
                            <label class="c-label u-label_signup" for="password-confirm">パスワード(再入力) <span class="c-required">*</span></label>
                            <input class="c-password" id="password-confirm" type="password" name="password_confirmation" required>
                        </li>
                    </ul>
                    <button class="c-btn_large u-btn_large" type="submit">サインアップ</button>
                    @if ($errors->has('name'))
                        <ul class="c-lists u-lists">
                            <li class="c-list">{{ $errors->first('name') }}</li>
                        </ul>
                    @endif
                    @if ($errors->has('email'))
                        <ul class="c-lists u-lists">
                            <li class="c-list">{{ $errors->first('email') }}</li>
                        </ul>
                    @endif
                    @if ($errors->has('password'))
                        <ul class="c-lists u-lists">
                            <li class="c-list">{{ $errors->first('password') }}</li>
                        </ul>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
