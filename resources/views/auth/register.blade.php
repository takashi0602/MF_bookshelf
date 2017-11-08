@extends('layouts.app')

@section('nav')
<div class="p-signUp">
    <div class="c-container">
        <div class="c-contents u-contents">
            <h1 class="c-title">サインアップ</h1>
            <form method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                <div class="c-content">
                    <h2>Bookshelfにサインアップ</h2>
                    <ul class="c-lists">
                        <li class="form-group{{ $errors->has('name') ? ' has-error' : '' }} c-list">
                            <label class="c-label" for="name">ユーザネーム</label>
                            <input class="c-textBox" id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                            @if ($errors->has('name'))
                                <strong>{{ $errors->first('name') }}</strong>
                            @endif
                        </li>
                        <li class="form-group{{ $errors->has('email') ? ' has-error' : '' }} c-list">
                            <label class="c-label" for="email">メールアドレス</label>
                            <input class="c-email" id="email" type="email" name="email" value="{{ old('email') }}" required>
                            @if ($errors->has('email'))
                                <strong>{{ $errors->first('email') }}</strong>
                            @endif
                        </li>
                        <li class="form-group{{ $errors->has('password') ? ' has-error' : '' }} c-list">
                            <label class="c-label" for="password">パスワード</label>
                            <input class="c-password" id="password" type="password" name="password" required>
                            @if ($errors->has('password'))
                                <strong>{{ $errors->first('password') }}</strong>
                            @endif
                        </li>
                        <li class="c-list">
                            <label class="c-label" for="password-confirm">パスワード(再入力)</label>
                            <input class="c-password" id="password-confirm" type="password" name="password_confirmation" required>
                        </li>
                    </ul>
                    <button class="c-btn_large u-btn_large" type="submit">サインアップ</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
