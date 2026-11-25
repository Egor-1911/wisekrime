@extends('layouts.app')

@section('title', 'Сведение')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/mixing.css') }}">
@endpush

@section('content')
<div class="mixing">
    <h1 class="mixing__title">Сведение</h1>
    <h2 class="mixing__subtitle">Наши Инженеры</h2>

    <div class="mixing__engineers">
        <div class="mixing__engineer">
            <div class="mixing__engineer-avatar">
                <img src="{{ asset('img/flouwyy.png') }}" alt="F1ouwyy">
            </div>
            <div class="mixing__engineer-info">
                <h3>F1ouwyy | Егор Земсков</h3>
                <h4>Готовы ли вы вывести свою музыку на новый уровень?
                    Будь вы начинающий исполнитель, ищущий изысканное звучание,
                    готовое к эфиру на радио, — правильный микс имеет решающее значение.</h4>
            </div>
        </div>
        <div class="mixing__engineer">
            <div class="mixing__engineer-avatar">
                <img src="{{ asset('img/scori.png') }}" alt="Scori">
            </div>
            <div class="mixing__engineer-info">
                <h3>Scori | Александр Соколов</h3>
                <h4>Вы готовы превратить свои треки в произведения, которые
                    звучат как будто созданы для платформ?
                    Качественный мастеринг — это то, что превращает хорошую музыку в незабываемую.</h4>
            </div>
        </div>
        <div class="mixing__engineer">
            <div class="mixing__engineer-avatar">
                <img src="{{ asset('img/doomee.png') }}" alt="Domee">
            </div>
            <div class="mixing__engineer-info">
                <h3>Domee | Данат Мустафин</h3>
                <h4>Даже самый искренний трек может потеряться в потоке,
                    если не найдёт своего пространства. Если вы хотите,
                    чтобы ваши композиции не просто слышали — а чувствовали, микс станет вашим ключом к качеству.</h4>
            </div>
        </div>
    </div>
</div>

<div class="mixing__works-section">
    <h2 class="mixing__subtitle">Наши лучшие работы</h2>
    <div class="mixing__works">
        <div class="mixing__track">
            <img class="mixing__track-cover" src="{{ asset('img/asphalt.jpg') }}" alt="ASPHALT 8">
            <div class="mixing__track-info">
                <h3>ASPHALT 8</h3>
                <h5>MACAN</h5>
            </div>
            <img class="mixing__track-duration" src="{{ asset('img/duration.png') }}" alt="duration">
            <img class="mixing__track-play" src="{{ asset('img/play.png') }}" alt="play">
        </div>
        <div class="mixing__track">
            <img class="mixing__track-cover" src="{{ asset('img/offbeat.png') }}" alt="OffBeat Freestyle">
            <div class="mixing__track-info">
                <h3>OFFBEAT</h3>
                <h5>ROCKET</h5>
            </div>
            <img class="mixing__track-duration" src="{{ asset('img/duration.png') }}" alt="duration">
            <img class="mixing__track-play" src="{{ asset('img/play.png') }}" alt="play">
        </div>
        <div class="mixing__track">
            <img class="mixing__track-cover" src="{{ asset('img/losiento.png') }}" alt="Lo Siento">
            <div class="mixing__track-info">
                <h3>Lo Siento</h3>
                <h5>Big Baby Tape</h5>
            </div>
            <img class="mixing__track-duration" src="{{ asset('img/duration.png') }}" alt="duration">
            <img class="mixing__track-play" src="{{ asset('img/play.png') }}" alt="play">
        </div>
        <div class="mixing__track">
            <img class="mixing__track-cover" src="{{ asset('img/goyard.png') }}" alt="goyard">
            <div class="mixing__track-info">
                <h3>2 GOYARD</h3>
                <h5>FRIENDLY THUG 52 NGG</h5>
            </div>
            <img class="mixing__track-duration" src="{{ asset('img/duration.png') }}" alt="duration">
            <img class="mixing__track-play" src="{{ asset('img/play.png') }}" alt="play">
        </div>
        <div class="mixing__track">
            <img class="mixing__track-cover" src="{{ asset('img/shadow.png') }}" alt="Моя Тень и Я">
            <div class="mixing__track-info">
                <h3>Моя Тень и Я</h3>
                <h5>Kizaru</h5>
            </div>
            <img class="mixing__track-duration" src="{{ asset('img/duration.png') }}" alt="duration">
            <img class="mixing__track-play" src="{{ asset('img/play.png') }}" alt="play">
        </div>
        <div class="mixing__track">
            <img class="mixing__track-cover" src="{{ asset('img/bratland.png') }}" alt="bratland">
            <div class="mixing__track-info">
                <h3>Белый</h3>
                <h5>MACAN, Step</h5>
            </div>
            <img class="mixing__track-duration" src="{{ asset('img/duration.png') }}" alt="duration">
            <img class="mixing__track-play" src="{{ asset('img/play.png') }}" alt="play">
        </div>
        <div class="mixing__track">
            <img class="mixing__track-cover" src="{{ asset('img/businessclas.png') }}" alt="Business Class">
            <div class="mixing__track-info">
                <h3>Бизнес Класс</h3>
                <h5>Baby Melo</h5>
            </div>
            <img class="mixing__track-duration" src="{{ asset('img/duration.png') }}" alt="duration">
            <img class="mixing__track-play" src="{{ asset('img/play.png') }}" alt="play">
        </div>
        <div class="mixing__track">
            <img class="mixing__track-cover" src="{{ asset('img/dontchill.png') }}" alt="не расслабляйся">
            <div class="mixing__track-info">
                <h3>не расслабляйся</h3>
                <h5>Скриптонит</h5>
            </div>
            <img class="mixing__track-duration" src="{{ asset('img/duration.png') }}" alt="duration">
            <img class="mixing__track-play" src="{{ asset('img/play.png') }}" alt="play">
        </div>
        <div class="mixing__track">
            <img class="mixing__track-cover" src="{{ asset('img/eclipse.png') }}" alt="Eclipse">
            <div class="mixing__track-info">
                <h3>Eclipse</h3>
                <h5>FRIENDLY THUG 52 NGG</h5>
            </div>
            <img class="mixing__track-duration" src="{{ asset('img/duration.png') }}" alt="duration">
            <img class="mixing__track-play" src="{{ asset('img/play.png') }}" alt="play">
        </div>
    </div>
</div>
@endsection