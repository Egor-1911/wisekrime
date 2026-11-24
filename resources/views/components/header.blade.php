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
            <a class="header__auth-link" href="/login">Вход</a>
            <p>|</p>
            <a class="header__auth-link" href="/register">Регистрация</a>
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
