@extends('layouts.app')

@section('title', 'Личный кабинет')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/personalaccount.css') }}">
@endpush

@section('content')
<main>
    <div class="personal-account">
        <h1 class="personal-account__title">Личный кабинет</h1>
        <br>

        @auth
            <!-- Этот блок увидит только авторизованный пользователь -->
            <div class="personal-account__card">
                <!-- Если у пользователя есть аватар в БД, показываем его, иначе картинку-заглушку -->
                <img src="{{ auth()->user()->avatar ? asset('img/' . auth()->user()->avatar) : asset('img/macan.png') }}" 
                     alt="Фото профиля" 
                     class="personal-account__avatar">
                
                <div class="personal-account__field">
                    &#128100; {{ auth()->user()->name }}
                </div>
                <div class="personal-account__field">
                    &#9993; {{ auth()->user()->email }}
                </div>

                <!-- Ссылки на разделы (используем <a> вместо <button> для навигации, но сохраняем ваш класс) -->
                <a href="{{ route('orders.index') }}" class="personal-account__action" style="text-decoration: none; display: inline-block; text-align: center; line-height: normal;">Заказы</a>
                <a href="{{ route('cart.index') }}" class="personal-account__action" style="text-decoration: none; display: inline-block; text-align: center; line-height: normal;">Корзина</a>
            </div>
        @else
            <!-- Этот блок увидит гость (неавторизованный пользователь) -->
            <div class="personal-account__card">
                <p>Для просмотра личного кабинета необходимо <a href="{{ route('login') }}">войти</a> или <a href="{{ route('register') }}">зарегистрироваться</a>.</p>
            </div>
        @endauth
    </div>
</main>
@endsection