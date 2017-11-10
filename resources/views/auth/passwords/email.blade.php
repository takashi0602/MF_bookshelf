@extends('layouts.app')

@include('layouts.header')
@include('layouts.footer')

@section('nav')
<div class="p-passwordReset">
    <div class="c-container">
        <div class="c-contents u-contents_email">
            <h1 class="c-title">パスワード再設定</h1>
            @if (session('status'))
                <div>
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}
                <ul class="c-lists">
                    <li class="form-group{{ $errors->has('email') ? ' has-error' : '' }} c-list">
                        <label class="c-label" for="email">メールアドレス</label>
                        <input class="c-email" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                    </li>
                </ul>
                <button class="c-btn_large" type="submit">メールを送信</button>
            </form>
            @if ($errors->has('email'))
                <ul class="c-lists u-lists">
                    <li class="c-list">{{ $errors->first('email') }}</li>
                </ul>
            @endif
        </div>
    </div>
</div>
@endsection
