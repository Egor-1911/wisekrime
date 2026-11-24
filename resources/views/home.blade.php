@extends('layouts.app')

@section('title', 'Главная')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
@endpush

@section('content')
    <div class="content">
        <div class="content__top">
            <div class="content__top-elements">
                <h1>ТВОЙ УСПЕХ НАЧИНАЕТСЯ ЗДЕСЬ</h1>
                <div class="content__top-search">
                    <img class="content__top-search-icon" src="{{ asset('img/Search.png') }}" alt="search">
                    <input class="content__top-search-input" type="search" placeholder="Какие биты вас интересуют?">
                </div>
            </div>
        </div>

        <div class="content__center">
            <div class="content__center-left">
                <h2>ЭТИ ПЕСНИ БЫЛИ СПРОДЮСИРОВАНЫ НАМИ</h2>
                <h3>Множество артистов уже используют наш сервис для создание музыки</h3>
                <button>Найти Свой</button>
            </div>
            <div class="content__center-right">
                <div class="content__center-item">
                    <img src="{{ asset('img/rocket.png') }}" alt="rocket">
                    <h4>Rocket</h4>
                    <h6>Omg Season</h6>
                </div>
                <div class="content__center-item">
                    <img src="{{ asset('img/haunted.png') }}" alt="haunted">
                    <h4>Kizaru</h4>
                    <h6>52 & Haunted</h6>
                </div>
                <div class="content__center-item">
                    <img src="{{ asset('img/aga.png') }}" alt="aga">
                    <h4>Yasmi, Полка</h4>
                    <h6>Ага</h6>
                </div>
                <div class="content__center-item">
                    <img src="{{ asset('img/GoatsMilk.png') }}" alt="GoatsMilk">
                    <h4>163ONMYNECK</h4>
                    <h6>Гоатс Милк</h6>
                </div>
                <div class="content__center-item">
                    <img src="{{ asset('img/freerio.png') }}" alt="freerio">
                    <h4>Og Buda</h4>
                    <h6>FreeRio 3</h6>
                </div>
                <div class="content__center-item">
                    <img src="{{ asset('img/blueseason.png') }}" alt="blueseason">
                    <h4>Kenny Muney</h4>
                    <h6>Sharing Is Caring</h6>
                </div>
            </div>
        </div>

        <div class="content__bottom">
            <div class="content__bottom-left">
                <img src="{{ asset('img/content-bottom-left-img.png') }}" alt="studio">
            </div>
            <div class="content__bottom-right">
                <h2>НАЧНИ СВОЮ КАРЬЕРУ СЕЙЧАС</h2>

                <div class="content__bottom-feature">
                    <div class="content__bottom-feature-icon">
                        <img src="{{ asset('img/Icon_button.svg') }}" alt="icon">
                    </div>
                    <div class="content__bottom-feature-text">
                        <h3>Крупнейший рынок для качественных битов</h3>
                        <h5>Получите доступ к более чем 8 миллионам битов от растущего сообщества продюсеров со всего мира.</h5>
                    </div>
                </div>

                <div class="content__bottom-feature">
                    <div class="content__bottom-feature-icon">
                        <img src="{{ asset('img/Icon_button.svg') }}" alt="icon">
                    </div>
                    <div class="content__bottom-feature-text">
                        <h3>Сведение и мастеринг индустриального качества</h3>
                        <h5>Более 600 тысяч песен сведены нашими инженерами — ваш звук заслуживает идеального финала.</h5>
                    </div>
                </div>

                <div class="content__bottom-feature">
                    <div class="content__bottom-feature-icon">
                        <img src="{{ asset('img/Icon_button.svg') }}" alt="icon">
                    </div>
                    <div class="content__bottom-feature-text">
                        <h3>Создайте незабываемое первое впечатление</h3>
                        <h5>Доступ множеству уникальных обложек от талантливых дизайнеров — ваш трек заслуживает визуала.</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
