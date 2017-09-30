@extends('layouts.app')

@section('nav')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in!<br>
                    ID: {{ Auth::User()->id }}<br>
                    NAME: {{ Auth::User()->name }}<br>
                    EMAIL: {{ Auth::User()->email }}<br>
                    provider: {{ Auth::User()->provider }}<br>
                    provider_id: {{ Auth::User()->provider_id }}<br>
                    remember_token: {{ Auth::User()->remember_token }}<br>
                    created_at: {{ Auth::User()->created_at }}<br>
                    updated_at: {{ Auth::User()->updated_at }}<br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
