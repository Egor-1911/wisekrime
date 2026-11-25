<header class="header">
    <div class="header__top">
        <div class="header__logo">
            <a href="/">
                <img src="{{ asset('img/logo.png') }}" alt="logotype">
            </a>
        </div>
        <div class="header__search">
            <img class="header__search-icon" src="{{ asset('img/Search.png') }}" alt="search">
            <input class="header__search-input" type="search" placeholder="Какая услуга вас интересует?">
        </div>
        <div class="header__auth">
            @auth
                <a class="header__auth-link" href="{{ route('personalaccount') }}">{{ Auth::user()->name }}</a>
                <p>|</p>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="header__auth-link" style="background: none; border: none; color: white; cursor: pointer; font-family: 'IstokWeb-Regular', sans-serif;">Выход</button>
                </form>
            @else
                <a class="header__auth-link" href="{{ route('login') }}">Вход</a>
                <p>|</p>
                <a class="header__auth-link" href="{{ route('register') }}">Регистрация</a>
            @endauth
        </div>
    </div>

    <div class="header__nav">
        <a class="header__nav-link" href="/beats">Биты</a>
        <a class="header__nav-link" href="/studios">Студии</a>
        <a class="header__nav-link" href="/mixing">Сведение</a>
        <a class="header__nav-link" href="/covers">Обложки</a>
        <a class="header__nav-link" href="/licenses">Цены</a>
    </div>
</header>
