@extends('layouts.app')

@section('title', 'Каталог битов')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/beats.css') }}">
@endpush

@section('content')
<div class="beats">
    <h1 class="beats__title">Биты</h1>

   <!-- Форма поиска -->
    <form action="{{ route('beats') }}" method="GET" class="beats__search">
        <img class="beats__search-icon" src="{{ asset('img/Search.png') }}" alt="search">
        <input class="beats__search-input" type="search" name="search" 
            placeholder="Какие биты вас интересуют?" 
            value="{{ request('search') }}">
        <button type="submit" class="beats__search-btn">Найти</button>
        
        @if(request('search') || request('sort_by'))
            <a href="{{ route('beats') }}" class="beats__search-reset">Сбросить</a>
        @endif
    </form>

    <!-- Сортировка -->
    <div class="beats__sort-controls">
        <span class="beats__sort-label">Сортировать:</span>
        
        <a href="{{ request()->fullUrlWithQuery(['sort_by' => 'duration', 'sort_order' => 'asc']) }}" 
        class="beats__sort-link {{ request('sort_by') == 'duration' && request('sort_order') == 'asc' ? 'active' : '' }}">
        По времени ↑
        </a>
        <a href="{{ request()->fullUrlWithQuery(['sort_by' => 'duration', 'sort_order' => 'desc']) }}" 
        class="beats__sort-link {{ request('sort_by') == 'duration' && request('sort_order') == 'desc' ? 'active' : '' }}">
        По времени ↓
        </a>

        <a href="{{ request()->fullUrlWithQuery(['sort_by' => 'bpm', 'sort_order' => 'asc']) }}" 
        class="beats__sort-link {{ request('sort_by') == 'bpm' && request('sort_order') == 'asc' ? 'active' : '' }}">
        По темпу ↑
        </a>
        <a href="{{ request()->fullUrlWithQuery(['sort_by' => 'bpm', 'sort_order' => 'desc']) }}" 
        class="beats__sort-link {{ request('sort_by') == 'bpm' && request('sort_order') == 'desc' ? 'active' : '' }}">
        По темпу ↓
        </a>
    </div>

    <!-- Список битов -->
    <div class="beats__list">
        @forelse($beats as $beat)
            <div class="beats__item">
                <div class="beats__item-cover">
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
                    <h5>{{ $beat->tags->pluck('name')->join(', ') }}</h5>
                </div>
                <form action="{{ route('cart.add', $beat->id) }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="beats__item-button">
                        {{ number_format($beat->price, 0, ',', ' ') }} ₽
                    </button>
                </form>
            </div>
        @empty
            <div class="beats__empty" style="grid-column: 1 / -1; text-align: center; padding: 40px;">
                <h3>По вашему запросу ничего не найдено 😔</h3>
                <a href="{{ route('beats') }}" style="color: #fff; text-decoration: underline;">Показать все биты</a>
            </div>
        @endforelse
    </div>

    <div class="beats__load-more">
        <button>Показать больше</button>
    </div>
</div>
@endsection