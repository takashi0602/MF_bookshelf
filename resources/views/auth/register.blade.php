@extends('layouts.app')

@section('nav')
<div class="container">
    <div>
        <div>
            <div>
                <div>サインアップ</div>
                <div>
                    <form method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name">ユーザネーム</label>
                            <div>
                                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span>
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">メールアドレス</label>
                            <div>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span>
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">パスワード</label>
                            <div>
                                <input id="password" type="password" name="password" required>
                                @if ($errors->has('password'))
                                    <span>
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div>
                            <label for="password-confirm">パスワード(再入力)</label>

                            <div>
                                <input id="password-confirm" type="password" name="password_confirmation" required>
                            </div>
                        </div>
                        <div>
                            <div>
                                <button type="submit">サインアップ</button>
                            </div>
                        </div>
                        <div>
                            <div>
                                <a href="{{ url('/auth/github') }}"><i class="fa fa-github"></i> Github</a>
                                <a href="{{ url('/auth/twitter') }}"><i class="fa fa-twitter"></i> Twitter</a>
                                <a href="{{ url('/auth/facebook') }}"><i class="fa fa-facebook"></i> Facebook</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
