@extends('layouts.app')

@section('title', 'Студии')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/studios.css') }}">
@endpush

@section('content')
<div class="studios">
    <h1 class="studios__title">Студии</h1>
    <br>
    <div class="studios__container">
        <div class="studios__search">
            <img class="studios__search-icon" src="{{ asset('img/Search.png') }}" alt="search">
            <input class="studios__search-input" type="search" placeholder="Какую студию вы хотите найти?">
        </div>

        <div class="studios__content">
            <div class="studios__list">
                <div class="studios__item">
                    <h3>SoundLab Tomsk</h3>
                    <p>г. Томск, ул. Бакунина, 67</p>
                    <h4>Пн-Сб: 10:00–22:00, Вс: 12:00–20:00</h4>
                </div>
                <div class="studios__item">
                    <h3>SoundLab Tomsk</h3>
                    <p>г. Томск, ул. Бакунина, 67</p>
                    <h4>Пн-Сб: 10:00–22:00, Вс: 12:00–20:00</h4>
                </div>
                <div class="studios__item">
                    <h3>SoundLab Tomsk</h3>
                    <p>г. Томск, ул. Бакунина, 67</p>
                    <h4>Пн-Сб: 10:00–22:00, Вс: 12:00–20:00</h4>
                </div>
            </div>
            <div class="studios__map">
                <img src="{{ asset('img/map.png') }}" alt="map">
            </div>
        </div>
    </div>
</div>
@endsection