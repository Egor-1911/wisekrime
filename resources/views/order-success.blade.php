@extends('layouts.app')

@section('title', 'Заказ оформлен')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/beats.css') }}">
    <style>
        .order-success {
            max-width: 700px;
            margin: 0 auto;
            padding: 50px 20px;
            text-align: center;
        }
        .order-success__title {
            font-size: 32px;
            color: #363636;
            margin-bottom: 20px;
        }
        .order-success__message {
            font-size: 18px;
            color: #555;
            margin-bottom: 40px;
        }
        .order-success__details {
            background-color: #363636;
            border-radius: 15px;
            padding: 30px;
            border: 1px solid black;
            text-align: left;
        }
        .order-success__row {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid #555;
            color: white;
        }
        .order-success__row:last-child {
            border-bottom: none;
            font-size: 20px;
            font-weight: bold;
            color: #DE0000;
        }
        .order-success__btn {
            display: inline-block;
            margin-top: 30px;
            padding: 15px 30px;
            background-color: #DE0000;
            color: white;
            border-radius: 15px;
            text-decoration: none;
            font-size: 18px;
            transition: all 0.2s ease;
        }
        .order-success__btn:hover {
            background-color: #b80000;
        }
    </style>
@endpush

@section('content')
<div class="order-success">
    <h1 class="order-success__title">🎉 Заказ успешно оформлен!</h1>
    <p class="order-success__message">
        Спасибо за покупку! Ваш заказ №{{ $order->id }} принят в обработку.
    </p>

    <div class="order-success__details">
        <div class="order-success__row">
            <span>Номер заказа:</span>
            <span>#{{ $order->id }}</span>
        </div>
        <div class="order-success__row">
            <span>Тип лицензии:</span>
            <span>{{ $order->license->name }}</span>
        </div>
        <div class="order-success__row">
            <span>Дата оформления:</span>
            <span>{{ $order->created_at->format('d.m.Y H:i') }}</span>
        </div>
        
       @foreach($order->orderItems as $item)
            <div class="order-success__row">
                <span>{{ $item->name ?? ($item->beat->title ?? 'Товар') }}</span>
                <span>{{ number_format($item->price, 0, ',', ' ') }} ₽</span>
            </div>
        @endforeach
        
        <div class="order-success__row">
            <span>Итого:</span>
            <span>{{ number_format($order->total_price, 0, ',', ' ') }} ₽</span>
        </div>
    </div>

    <a href="{{ route('beats') }}" class="order-success__btn">Вернуться к каталогу</a>
    <a href="{{ route('personalaccount') }}" class="order-success__btn" style="margin-left: 15px;">Мои заказы</a>
</div>
@endsection