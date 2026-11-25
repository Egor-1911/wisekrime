@extends('layouts.app')

@section('title', 'Регистрация')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/authentication.css') }}">
@endpush

@section('content')
<div class="authentication">
    <br>
    <div class="authentication__form">
        <h2 class="authentication__form-title">Регистрация</h2>
        <input class="authentication__input" type="text" placeholder="Введите ваше имя">
        <input class="authentication__input" type="text" placeholder="Введите вашу фамилию">
        <input class="authentication__input" type="email" placeholder="Введите вашу почту">
        <input class="authentication__input" type="password" placeholder="Придумайте пароль">
        <input class="authentication__input" type="password" placeholder="Подтвердите ваш пароль">
        <a class="authentication__submit" href="/personalaccount">Регистрация</a>
        <a class="authentication__link" href="/login">Уже есть аккаунт? Войти</a>
    </div>
</div>
@endsection