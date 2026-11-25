@extends('layouts.app')

@section('title', 'Регистрация')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/authentication.css') }}">
@endpush

@section('content')
<div class="authentication">
    <div class="authentication__form">
        <h2 class="authentication__form-title">Регистрация</h2>

        @if(session('success'))
            <div class="authentication__success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('register.store') }}" method="POST" style="width: 100%; display: flex; flex-direction: column; align-items: center; gap: 30px;">
            @csrf
            
            <input class="authentication__input" type="text" name="name" placeholder="Введите ваше имя" value="{{ old('name') }}" required>
            @error('name')
                <span class="authentication__error">{{ $message }}</span>
            @enderror

            <input class="authentication__input" type="text" name="surname" placeholder="Введите вашу фамилию" value="{{ old('surname') }}" required>
            @error('surname')
                <span class="authentication__error">{{ $message }}</span>
            @enderror

            <input class="authentication__input" type="email" name="email" placeholder="Введите вашу почту" value="{{ old('email') }}" required>
            @error('email')
                <span class="authentication__error">{{ $message }}</span>
            @enderror

            <input class="authentication__input" type="password" name="password" placeholder="Придумайте пароль" required>
            @error('password')
                <span class="authentication__error">{{ $message }}</span>
            @enderror

            <input class="authentication__input" type="password" name="password_confirmation" placeholder="Подтвердите ваш пароль" required>

            <button type="submit" class="authentication__submit">Регистрация</button>
        </form>

        <a class="authentication__link" href="{{ route('login') }}">Уже есть аккаунт? Войти</a>
    </div>
</div>
@endsection