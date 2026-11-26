@extends('layouts.app')

@section('title', 'Доступ запрещён')

@push('styles')
    <style>
        .error-page {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 70vh;
            padding: 40px 20px;
            text-align: center;
        }
        .error-page__code {
            font-size: 120px;
            font-weight: bold;
            color: #DE0000;
            line-height: 1;
            margin-bottom: 20px;
        }
        .error-page__title {
            font-size: 32px;
            color: #363636;
            margin-bottom: 15px;
        }
        .error-page__message {
            font-size: 18px;
            color: #666;
            margin-bottom: 30px;
            max-width: 500px;
        }
        .error-page__btn {
            display: inline-block;
            padding: 15px 30px;
            background-color: #DE0000;
            color: white;
            border-radius: 15px;
            text-decoration: none;
            font-size: 18px;
            border: 1px solid black;
            transition: all 0.2s ease;
        }
        .error-page__btn:hover {
            background-color: #b80000;
        }
    </style>
@endpush

@section('content')
    <div class="error-page">
        <div class="error-page__code">403</div>
        <h1 class="error-page__title">Доступ запрещён</h1>
        <p class="error-page__message">
            {{ $exception->getMessage() ?: 'У вас нет прав для просмотра этой страницы. Обратитесь к администратору.' }}
        </p>
        <a href="{{ route('home') }}" class="error-page__btn">Вернуться на главную</a>
    </div>
@endsection
