@section('header')
    <header class="l-header">
        <img src="{{ asset('img/logo.png') }}" alt="" class="l-headerTitle_img">
        <h1 class="l-headerTitle_header"><a href="{{ url('/') }}" class="l-headerTitle_link">{{ config('app.name', 'Laravel') }}</a></h1>
        <nav class="l-headerNav">
            <ul class="l-headerMenu">
                @guest
                <li class="l-headerMenu_list"><a href="{{ route('login') }}" class="l-headerMenu_link"><i class="fa fa-sign-in" aria-hidden="true"></i> サインイン</a></li>
                <li class="l-headerMenu_list"><a href="{{ route('register') }}" class="l-headerMenu_link"><i class="fa fa-user-plus" aria-hidden="true"></i> サインアップ</a></li>
                @else
                    <li class="l-headerMenu_list"><a href="{{ url('/private') }}" class="l-headerMenu_link"><i class="fa fa-user" aria-hidden="true"></i> じぶんの本棚</a></li>
                    <li class="l-headerMenu_list"><a href="{{ url('/public') }}" class="l-headerMenu_link"><i class="fa fa-users" aria-hidden="true"></i> みんなの本棚</a></li>
                    <li class="l-headerMenu_list"><a href="{{ url('/mypage') }}" class="l-headerMenu_link">{{ Auth::user()->name }}</a></li>
                    <li><a href="{{ route('logout') }}" class="l-headerMenu_link" onclick="event.preventDefault(); document.getElementById('headerMenu_form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i> サインアウト</a></li>
                    <form id="headerMenu_form" class="l-headerMenu_form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                @endguest
            </ul>
        </nav>
    </header>
@endsection