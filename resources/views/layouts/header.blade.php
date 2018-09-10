@section('header')
    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center">
                <img src="{{ asset('img/logo.png') }}" style="width: 100px;">
                <h3 class="d-inline-block text-primary m-0">{{ config('app.name', 'Laravel') }}</h3>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    @guest
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link text-primary"><i class="fa fa-sign-in" aria-hidden="true"></i> サインイン</a></li>
                    <li class="nav-item"><a href="{{ route('register') }}" class="nav-link text-primary"><i class="fa fa-user-plus" aria-hidden="true"></i> サインアップ</a></li>
                    @else
                    <li class="nav-item"><a href="{{ url('/private') }}" class="nav-link text-primary"><i class="fa fa-user" aria-hidden="true"></i> じぶんの本棚</a></li>
                    <li class="nav-item"><a href="{{ url('/public') }}" class="nav-link text-primary"><i class="fa fa-users" aria-hidden="true"></i> みんなの本棚</a></li>
                    <li class="nav-item"><a href="{{ url('/mypage') }}" class="nav-link text-primary">{{ Auth::user()->name }}</a></li>
                    <li><a href="{{ route('logout') }}" class="nav-link text-primary" onclick="event.preventDefault(); document.getElementById('headerMenu_form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i> サインアウト</a></li>
                    <form id="headerMenu_form" class="nav-link text-primary" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                    @endguest
                </ul>
            </div>
        </nav>
    </header>
@endsection