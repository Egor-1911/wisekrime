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
        @forelse($beats as $beat)
            <div class="beats__item">
                <div class="beats__item-cover">
                    <!-- Если картинки нет, покажем заглушку -->
                    <img src="{{ asset('img/' . ($beat->cover_image ?? 'default-cover.png')) }}" alt="{{ $beat->title }}">
                </div>
                <div class="beats__item-title">
                    <h5>{{ $beat->title }}</h5>
                </div>
                <div class="beats__item-time">
                    <h5>{{ $beat->duration }}</h5>
                </div>
                <div class="beats__item-bpm">
                    <h5>{{ $beat->bpm }}</h5>
                </div>
                <div class="beats__item-tags">
                    <!-- Собираем имена тегов в строку через запятую -->
                    <h5>{{ $beat->tags->pluck('name')->join(', ') }}</h5>
                </div>
                <button class="beats__item-button">{{ number_format($beat->price, 0, ',', ' ') }} ₽</button>
            </div>
        @empty
            <div class="beats__empty">
                <h3>По вашему запросу ничего не найдено 😔</h3>
            </div>
        @endforelse
    </div>

    <div class="beats__load-more">
        <button>Показать больше</button>
    </div>
</div>
@endsection