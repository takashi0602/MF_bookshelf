@extends('layouts.app')

@section('nav')
<div class="p-passwordReset">
    <div class="container">
        <h1>パスワードを再設定します</h1>
        <div class="c-passwordReset_form">
            @if (session('status'))
                <div>
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} c-passwordReset_email">
                    <label class="c-passwordReset_label" for="email">メールアドレス</label>
                    <input class="c-passwordReset_textBox" id="email" type="email" name="email" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                        <strong>{{ $errors->first('email') }}</strong>
                    @endif
                </div>
                <div class="c-passwordReset_btn">
                    <button class="c-sendBtn" type="submit">メールを送信</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
