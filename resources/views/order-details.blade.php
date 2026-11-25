@extends('layouts.app')

@section('title', 'Детали заказа #' . $order->id)

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/beats.css') }}">
    <style>
        .order-details {
            max-width: 700px;
            margin: 0 auto;
            padding: 50px 20px;
        }
        .order-details__title {
            font-size: 32px;
            text-align: center;
            margin-bottom: 30px;
            color: #363636;
        }
        .order-details__card {
            background-color: #363636;
            border: 1px solid black;
            border-radius: 15px;
            padding: 30px;
        }
        .order-details__row {
            display: flex;
            justify-content: space-between;
            padding: 15px 0;
            border-bottom: 1px solid #555;
            color: white;
            font-size: 16px;
        }
        .order-details__row:last-child {
            border-bottom: none;
        }
        .order-details__row-label {
            color: #aaa;
        }
        .order-details__row-value {
            font-weight: bold;
        }
        .order-details__row-value--total {
            color: #DE0000;
            font-size: 20px;
        }
        .order-details__back-btn {
            display: block;
            width: 200px;
            margin: 30px auto 0;
            padding: 12px;
            background-color: #DE0000;
            color: white;
            text-align: center;
            border-radius: 15px;
            text-decoration: none;
            transition: all 0.2s ease;
        }
        .order-details__back-btn:hover {
            background-color: #b80000;
        }
    </style>
@endpush

@section('content')
<div class="order-details">
    <h1 class="order-details__title">Заказ #{{ $order->id }}</h1>

    <div class="order-details__card">
        <div class="order-details__row">
            <span class="order-details__row-label">Дата оформления:</span>
            <span class="order-details__row-value">{{ $order->created_at->format('d.m.Y H:i') }}</span>
        </div>
        <div class="order-details__row">
            <span class="order-details__row-label">Тип лицензии:</span>
            <span class="order-details__row-value">{{ $order->license->name }}</span>
        </div>
        <div class="order-details__row">
            <span class="order-details__row-label">Описание лицензии:</span>
            <span class="order-details__row-value">{{ $order->license->description }}</span>
        </div>

        @foreach($order->orderItems as $item)
            <div class="order-details__row">
                <span class="order-details__row-label">{{ $item->beat->title ?? 'Товар' }}:</span>
                <span class="order-details__row-value">{{ number_format($item->price, 0, ',', ' ') }} ₽</span>
            </div>
        @endforeach

        <div class="order-details__row">
            <span class="order-details__row-label" style="font-size: 18px;">Итого:</span>
            <span class="order-details__row-value order-details__row-value--total">
                {{ number_format($order->total_price, 0, ',', ' ') }} ₽
            </span>
        </div>
    </div>

    <a href="{{ route('orders.index') }}" class="order-details__back-btn">← К списку заказов</a>
</div>
@endsection