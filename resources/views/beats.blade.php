@extends('layouts.app')

@section('title', 'Каталог битов')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/beats.css') }}">
@endpush

@section('content')
<div class="beats">
    <h1 class="beats__title">Биты</h1>

    <div class="beats__search">
        <img class="beats__search-icon" src="{{ asset('img/Search.png') }}" alt="search">
        <input class="beats__search-input" type="search" placeholder="Какие биты вас интересуют?">
    </div>

    <div class="beats__list">
        <div class="beats__item">
            <div class="beats__item-cover">
                <img src="{{ asset('img/163onmyneck.jpg') }}" alt="163">
            </div>
            <div class="beats__item-title">
                <h5>Ойкумена (163ONMYNECK) [2 + 1]</h5>
            </div>
            <div class="beats__item-time">
                <h5>2:21</h5>
            </div>
            <div class="beats__item-bpm">
                <h5>180</h5>
            </div>
            <div class="beats__item-tags">
                <h5>Detroit, Polyana, OG Buda</h5>
            </div>
            <button class="beats__item-button">4999p</button>
        </div>

        <div class="beats__item">
            <div class="beats__item-cover">
                <img src="{{ asset('img/macan_cover.png') }}" alt="macan">
            </div>
            <div class="beats__item-title">
                <h5>ASPHALT 8 (MACAN) [3 + 1]</h5>
            </div>
            <div class="beats__item-time">
                <h5>2:42</h5>
            </div>
            <div class="beats__item-bpm">
                <h5>154</h5>
            </div>
            <div class="beats__item-tags">
                <h5>Memphis, MACAN, ALBLAK52</h5>
            </div>
            <button class="beats__item-button">3499p</button>
        </div>

        <div class="beats__item">
            <div class="beats__item-cover">
                <img src="{{ asset('img/alblak_cover.png') }}" alt="alblak">
            </div>
            <div class="beats__item-title">
                <h5>YEEI 48 (ALBLAK52) [2 + 1]</h5>
            </div>
            <div class="beats__item-time">
                <h5>1:54</h5>
            </div>
            <div class="beats__item-bpm">
                <h5>138</h5>
            </div>
            <div class="beats__item-tags">
                <h5>Memphis, Key Glock, ALBLAK52</h5>
            </div>
            <button class="beats__item-button">5499p</button>
        </div>

        <div class="beats__item">
            <div class="beats__item-cover">
                <img src="{{ asset('img/rocket_cover.png') }}" alt="rocket">
            </div>
            <div class="beats__item-title">
                <h5>Сплинтер (Rocket) [2 + 1]</h5>
            </div>
            <div class="beats__item-time">
                <h5>4:06</h5>
            </div>
            <div class="beats__item-bpm">
                <h5>115</h5>
            </div>
            <div class="beats__item-tags">
                <h5>Trap, Rocket, ShmoneySound</h5>
            </div>
            <button class="beats__item-button">6999p</button>
        </div>

        <div class="beats__item">
            <div class="beats__item-cover">
                <img src="{{ asset('img/dyshu.png') }}" alt="dyshu">
            </div>
            <div class="beats__item-title">
                <h5>Дышу (ABLAK52) [1 + 1]</h5>
            </div>
            <div class="beats__item-time">
                <h5>1:40</h5>
            </div>
            <div class="beats__item-bpm">
                <h5>92</h5>
            </div>
            <div class="beats__item-tags">
                <h5>Old School, Boom Bap, Баста</h5>
            </div>
            <button class="beats__item-button">6999p</button>
        </div>

        <div class="beats__item">
            <div class="beats__item-cover">
                <img src="{{ asset('img/nasledstvo.png') }}" alt="nasledstvo">
            </div>
            <div class="beats__item-title">
                <h5>Наследство (ICEGERGERT) [2 + 1]</h5>
            </div>
            <div class="beats__item-time">
                <h5>2:12</h5>
            </div>
            <div class="beats__item-bpm">
                <h5>164</h5>
            </div>
            <div class="beats__item-tags">
                <h5>Trap, Dark, King Von</h5>
            </div>
            <button class="beats__item-button">2999p</button>
        </div>
    </div>

    <div class="beats__load-more">
        <button>Показать больше</button>
    </div>
</div>
@endsection