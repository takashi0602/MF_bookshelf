@extends('layouts.app')

@section('nav')
<div class="container">
    <div>
        <div>
            <div >
                <div >サインイン</div>
                <div>
                    <form method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">メールアドレス</label>
                            <div>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
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
                            <div>
                                <div>
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>&nbsp;パスワードを記憶する
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div>
                                <button type="submit"><i aria-hidden="true"></i> サインイン</button>
                                <a href="{{ route('password.request') }}">パスワードを忘れましたか？</a>
                            </div>
                        </div>
                        <div>
                            <div>
                                <a href="{{ url('/auth/github') }}"><i class="fa fa-github" aria-hidden="true"></i> Github</a>
                                <a href="{{ url('/auth/twitter') }}"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a>
                                <a href="{{ url('/auth/facebook') }}"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
