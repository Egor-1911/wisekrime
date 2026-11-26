@extends('layouts.app')

@section('title', 'Слишком много запросов')

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
            margin-bottom: 10px;
            max-width: 500px;
        }
        .error-page__retry-info {
            font-size: 16px;
            color: #DE0000;
            margin-bottom: 30px;
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
        <div class="error-page__code">429</div>
        <h1 class="error-page__title">Слишком много запросов</h1>
        <p class="error-page__message">
            Вы отправили слишком много запросов за короткий промежуток времени.
            Это мера защиты от автоматических атак на сервер.
        </p>
        <p class="error-page__retry-info">
            Пожалуйста, подождите <strong>{{ $exception->getHeaders()['Retry-After'] ?? 60 }} секунд</strong> и попробуйте снова.
        </p>
        <a href="{{ route('home') }}" class="error-page__btn">Вернуться на главную</a>
    </div>
@endsection
