@extends('layouts.app')

@section('title', 'Личный кабинет')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/personalaccount.css') }}">
@endpush

@section('content')
<div class="personal-account">
    <h1 class="personal-account__title">Личный кабинет</h1>

    @auth
        <div class="personal-account__card">
            <div class="personal-account__avatar-upload">
                <img src="{{ auth()->user()->avatar ? asset('storage/avatars/' . auth()->user()->avatar) : asset('img/macan.png') }}" 
                    alt="Фото профиля" 
                    class="personal-account__avatar">
            </div>
            
            <div class="personal-account__field">
                &#128100; {{ auth()->user()->name }} {{ auth()->user()->surname }}
            </div>
            <div class="personal-account__field">
                &#9993; {{ auth()->user()->email }}
            </div>

            <a href="{{ route('profile.show') }}" class="personal-account__action">Редактировать профиль</a>
            <a href="{{ route('orders.index') }}" class="personal-account__action">Заказы</a>
            <a href="{{ route('cart.index') }}" class="personal-account__action">Корзина</a>

            <form action="{{ route('logout') }}" method="POST" style="width: 80%;">
                @csrf
                <button type="submit" class="personal-account__logout">Выйти</button>
            </form>
        </div>
    @else
        <div class="personal-account__card">
            <p class="personal-account__message">
                Для просмотра личного кабинета необходимо 
                <a href="{{ route('login') }}">войти</a> или 
                <a href="{{ route('register') }}">зарегистрироваться</a>.
            </p>
        </div>
    @endauth
</div>
@endsection
