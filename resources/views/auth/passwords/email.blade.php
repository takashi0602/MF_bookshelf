@extends('layouts.app')

@section('nav')
<div class="container">
    <div>
        <div>
            <div>
                <div>パスワードリセット</div>
                <div>
                    @if (session('status'))
                        <div>
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}
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
                        <div>
                            <div>
                                <button type="submit">パスワードリセットのリンクを送信</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
