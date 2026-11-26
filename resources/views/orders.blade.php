@extends('layouts.app')

@section('title', 'Мои заказы')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/beats.css') }}">
    <style>
        .orders-page {
            max-width: 900px;
            margin: 0 auto;
            padding: 50px 20px;
        }
        .orders-page__title {
            font-size: 32px;
            text-align: center;
            margin-bottom: 40px;
            color: #363636;
        }
        .orders-page__empty {
            text-align: center;
            padding: 50px;
            color: #363636;
            font-size: 20px;
        }
        .orders-page__empty a {
            color: #DE0000;
            text-decoration: underline;
            font-size: 18px;
        }
        .order-card {
            background-color: #363636;
            border: 1px solid black;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 25px;
            transition: border-color 0.2s ease;
        }
        .order-card:hover {
            border-color: #DE0000;
        }
        .order-card__header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #555;
        }
        .order-card__number {
            color: white;
            font-size: 20px;
            font-weight: bold;
        }
        .order-card__date {
            color: #aaa;
            font-size: 14px;
        }
        .order-card__license {
            color: #DE0000;
            font-size: 16px;
            margin-bottom: 15px;
        }
        .order-card__items {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }
        .order-card__item {
            display: flex;
            align-items: center;
            gap: 15px;
            color: white;
        }
        .order-card__item img {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            object-fit: cover;
            border: 1px solid black;
        }
        .order-card__item-title {
            flex: 1;
            font-size: 16px;
        }
        .order-card__item-price {
            color: #DE0000;
            font-weight: bold;
            font-size: 16px;
        }
        .order-card__footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            padding-top: 15px;
            border-top: 1px solid #555;
        }
        .order-card__total {
            color: white;
            font-size: 18px;
        }
        .order-card__total span {
            color: #DE0000;
            font-weight: bold;
        }
        .order-card__details-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #DE0000;
            color: white;
            border-radius: 15px;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.2s ease;
        }
        .order-card__details-btn:hover {
            background-color: #b80000;
        }
    </style>
@endpush

@section('content')
<div class="orders-page">
    <h1 class="orders-page__title">Мои заказы</h1>

    @if($orders->isEmpty())
        <div class="orders-page__empty">
            <h3>У вас ещё нет заказов 😔</h3>
            <p style="margin-top: 15px; color: #666;">После оформления заказа они появятся здесь.</p>
            <a href="{{ route('beats') }}" style="margin-top: 20px; display: inline-block;">Перейти к каталогу битов</a>
        </div>
    @else
        @foreach($orders as $order)
            <div class="order-card">
                <div class="order-card__header">
                    <div class="order-card__number">Заказ #{{ $order->id }}</div>
                    <div class="order-card__date">{{ $order->created_at->format('d.m.Y H:i') }}</div>
                </div>

                <div class="order-card__license">
                    Лицензия: {{ $order->license->name }}
                </div>

                <div class="order-card__items">
                    @foreach($order->orderItems as $item)
                        <div class="order-card__item">
                            @if($item->beat_id)
                                <img src="{{ asset('img/' . ($item->beat->cover_image ?? 'default-cover.png')) }}" 
                                    alt="{{ $item->beat->title }}">
                            @else
                                <img src="{{ asset('img/Icon_button.svg') }}" alt="Услуга">
                            @endif
                            <div class="order-card__item-title">
                                {{ $item->name ?? ($item->beat->title ?? 'Товар') }}
                            </div>
                            <div class="order-card__item-price">
                                {{ number_format($item->price, 0, ',', ' ') }} ₽
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="order-card__footer">
                    <div class="order-card__total">
                        Итого: <span>{{ number_format($order->total_price, 0, ',', ' ') }} ₽</span>
                    </div>
                    <a href="{{ route('orders.show', $order->id) }}" class="order-card__details-btn">
                        Подробнее
                    </a>
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection