@extends('layouts.app')

@section('title', 'Вход')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/registration.css') }}">
@endpush

@section('content')
<div class="registration">
    <br>
    <div class="registration__form">
        <h2 class="registration__form-title">Вход</h2>
        <input class="registration__input" type="email" placeholder="Введите вашу почту">
        <input class="registration__input" type="password" placeholder="Введите ваш пароль">
        <a class="registration__submit" href="/personalaccount">Вход</a>

        <div class="registration__divider">
            <img class="registration__divider-line" src="{{ asset('img/line.jpg') }}" alt="Разделитель">
            <h5 class="registration__divider-text">или</h5>
            <img class="registration__divider-line" src="{{ asset('img/line.jpg') }}" alt="Разделитель">
        </div>

        <button class="registration__social-btn">
            <img class="registration__social-icon" src="{{ asset('img/vk.png') }}" alt="VK">
            Продолжить через VK
        </button>
        <button class="registration__social-btn">
            <img class="registration__social-icon" src="{{ asset('img/max.png') }}" alt="MAX">
            Продолжить через MAX
        </button>
        <a class="registration__submit" href="/register">Регистрация</a>
    </div>
</div>
@endsection