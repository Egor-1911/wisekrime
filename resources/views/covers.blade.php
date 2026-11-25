@extends('layouts.app')

@section('title', 'Обложки')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/covers.css') }}">
@endpush

@section('content')
<div class="covers">
    <section class="covers__gallery">
        <h1 class="covers__title">Обложки</h1>
        <h2 class="covers__subtitle">Наши лучшие работы</h2>
        <div class="covers__art-list">
            <img class="covers__art" src="{{ asset('img/pepelnahudi.png') }}" alt="Обложка: Пепельная Худи">
            <img class="covers__art" src="{{ asset('img/peekabo.png') }}" alt="Обложка: Peekabo">
            <img class="covers__art" src="{{ asset('img/mayot.png') }}" alt="Обложка: Mayot">
            <img class="covers__art" src="{{ asset('img/blablaland.png') }}" alt="Обложка: Blablaland">
            <img class="covers__art" src="{{ asset('img/toxis.png') }}" alt="Обложка: Toxis">
            <img class="covers__art" src="{{ asset('img/sweetdreams.png') }}" alt="Обложка: Sweet Dreams">
        </div>
    </section>

    <section class="covers__designers-section">
        <h2 class="covers__subtitle">Наши дизайнеры</h2>
        <div class="covers__designer-list">
            <div class="covers__designer">
                <img class="covers__designer-avatar" src="{{ asset('img/designer.png') }}" alt="Павел Моторин">
                <div class="covers__designer-info">
                    <h4>Павел Моторин</h4>
                    <h6>Хотите, чтобы ваш трек сразу привлек внимание? Обложка — первое, что видит слушатель. Профессиональный cover art подчеркнёт ваш стиль и сделает релиз незабываемым.</h6>
                </div>
            </div>
            <div class="covers__designer">
                <img class="covers__designer-avatar" src="{{ asset('img/designer2.png') }}" alt="Всеволод Чагаев">
                <div class="covers__designer-info">
                    <h4>Всеволод Чагаев</h4>
                    <h6>Обложка может сказать о музыке больше, чем слова. Доверьте создание cover art дизайнеру, который уловит вашу эстетику и превратит идею в мощный визуальный образ.</h6>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection