@extends('layouts.app')

@section('title', 'Редактирование профиля')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/personalaccount.css') }}">
@endpush

@section('content')
<div class="personal-account">
    <h1 class="personal-account__title">Редактирование профиля</h1>

    @if(session('success'))
        <div class="personal-account__success">{{ session('success') }}</div>
    @endif

    <div class="personal-account__card">
        <form class="personal-account__form" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="personal-account__avatar-upload">
                <img src="{{ $user->avatar ? asset('storage/avatars/' . $user->avatar) : asset('img/macan.png') }}" 
                        alt="Аватар" 
                        class="personal-account__avatar"
                        id="avatarPreview">
                    
                    <label for="avatarInput" class="personal-account__avatar-label">Изменить аватар</label>
                    <input type="file" id="avatarInput" name="avatar" class="personal-account__avatar-file" accept="image/*">
                    @error('avatar')
                        <span class="personal-account__error">{{ $message }}</span>
                    @enderror
            </div>

            
            <!-- Имя -->
            <input class="personal-account__input" type="text" name="name" placeholder="Имя" value="{{ old('name', $user->name) }}" required>
            @error('name')
                <span class="personal-account__error">{{ $message }}</span>
            @enderror

            <!-- Фамилия -->
            <input class="personal-account__input" type="text" name="surname" placeholder="Фамилия" value="{{ old('surname', $user->surname) }}" required>
            @error('surname')
                <span class="personal-account__error">{{ $message }}</span>
            @enderror

            <!-- Email -->
            <input class="personal-account__input" type="email" name="email" placeholder="Email" value="{{ old('email', $user->email) }}" required>
            @error('email')
                <span class="personal-account__error">{{ $message }}</span>
            @enderror

            <!-- Телефон -->
            <input class="personal-account__input" type="text" name="phone" placeholder="Телефон (необязательно)" value="{{ old('phone', $user->phone) }}">
            @error('phone')
                <span class="personal-account__error">{{ $message }}</span>
            @enderror

            <!-- Пароль -->
            <input class="personal-account__input" type="password" name="password" placeholder="Новый пароль (оставьте пустым, если не хотите менять)">
            @error('password')
                <span class="personal-account__error">{{ $message }}</span>
            @enderror

            <!-- Подтверждение пароля -->
            <input class="personal-account__input" type="password" name="password_confirmation" placeholder="Подтвердите новый пароль">

            <!-- Кнопка сохранения -->
            <button type="submit" class="personal-account__action">Сохранить изменения</button>
        </form>
    </div>

    <a href="{{ route('personalaccount') }}" class="personal-account__back-link">← Вернуться в личный кабинет</a>
</div>

<script>
    // Предпросмотр аватара при выборе файла
    document.getElementById('avatarInput').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('avatarPreview').src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection