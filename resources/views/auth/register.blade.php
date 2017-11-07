@extends('layouts.app')

@section('nav')
<div class="p-signUp">
    <div class="c-container">
        <h1 class="c-signUp_title">サインアップ</h1>
        <form method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
            <div class="c-signUpInternal">
                <h2 class="c-signUpInternal_title">Bookshelfにサインアップ</h2>
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} c-signUp_name">
                    <label class="c-signUpLabel_name" for="name">ユーザネーム</label>
                    <input class="c-signUpForm_name" id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                    @if ($errors->has('name'))
                        <strong>{{ $errors->first('name') }}</strong>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} c-signUp_email">
                    <label class="c-signUpLabel_mail" for="email">メールアドレス</label>
                    <input class="c-signUpForm_mail" id="email" type="email" name="email" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                        <strong>{{ $errors->first('email') }}</strong>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} c-signUp_pwd">
                    <label class="c-signUpLabel_pwd" for="password">パスワード</label>
                    <input class="c-signUpForm_pwd" id="password" type="password" name="password" required>
                    @if ($errors->has('password'))
                        <strong>{{ $errors->first('password') }}</strong>
                    @endif
                </div>
                <div>
                    <label class="c-signUpLabel_pwdConfirm" for="password-confirm">パスワード(再入力)</label>
                    <input class="c-signUpForm_pwdConfirm" id="password-confirm" type="password" name="password_confirmation" required>
                </div>
                <button class="c-signUpBtn" type="submit">サインアップ</button>
            </div>
        </form>
    </div>
</div>
@endsection
