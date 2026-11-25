@extends('layouts.app')

@section('title', 'Вход')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/registration.css') }}">
@endpush

@section('content')
<div class="registration">
    <div class="registration__form">
        <h2 class="registration__form-title">Вход</h2>

        @if(session('success'))
            <div class="registration__success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('login.store') }}" method="POST" style="width: 100%; display: flex; flex-direction: column; align-items: center; gap: 30px;">
            @csrf
            
            <input class="registration__input" type="email" name="email" placeholder="Введите вашу почту" value="{{ old('email') }}" required>
            @error('email')
                <span class="registration__error">{{ $message }}</span>
            @enderror

            <input class="registration__input" type="password" name="password" placeholder="Введите ваш пароль" required>
            @error('password')
                <span class="registration__error">{{ $message }}</span>
            @enderror

            <button type="submit" class="registration__submit">Вход</button>
        </form>

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
        <a class="registration__submit" href="{{ route('register') }}" style="display: block; text-align: center; width: 25%; margin: 0 auto;">Регистрация</a>
    </div>
</div>
@endsection