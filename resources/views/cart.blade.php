@extends('layouts.app')

@section('title', 'Корзина')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/beats.css') }}">
    <style>
        .cart__empty { text-align: center; padding: 50px; color: #363636; font-size: 24px; }
        .cart__total { font-size: 24px; font-weight: bold; margin-top: 30px; text-align: right; color: #DE0000; }
        .cart__checkout-btn { 
            background-color: #DE0000; color: white; padding: 15px 30px; 
            border-radius: 15px; border: 1px solid black; font-size: 18px; 
            text-decoration: none; display: inline-block; margin-top: 20px;
            font-family: 'IstokWeb-Regular', sans-serif;
            transition: background-color 0.2s ease, border-color 0.2s ease;
        }
        .cart__checkout-btn:hover {
            background-color: #b80000;
            border-color: #b80000;
        }

        /* Крестик удаления в стиле ваших кнопок */
        .cart__remove-btn {
            width: 40px;
            height: 40px;
            border-radius: 15px;
            background-color: #DE0000;
            color: white;
            border: 1px solid black;
            font-size: 20px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
            font-family: 'IstokWeb-Regular', sans-serif;
        }
        .cart__remove-btn:hover {
            background-color: #b80000;
            border-color: #b80000;
        }

        /* Стили для управления количеством */
        .cart__quantity-controls {
            display: flex;
            align-items: center;
            gap: 8px;
            width: 10%;
            justify-content: center;
        }
        .cart__quantity-btn {
            width: 40px;
            height: 40px;
            border-radius: 15px;
            background-color: #DE0000;
            color: white;
            border: 1px solid black;
            font-size: 22px;
            font-weight: bold;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
            padding: 0;
            line-height: 1;
        }
        .cart__quantity-btn:hover {
            background-color: #b80000;
            border-color: #b80000;
        }
        .cart__quantity-input {
            width: 50px;
            height: 40px;
            text-align: center;
            border: 1px solid black;
            border-radius: 15px;
            background-color: #363636;
            color: white;
            font-size: 18px;
            font-family: 'IstokWeb-Regular', sans-serif;
        }
        .cart__quantity-input:focus {
            outline: none;
            border-color: #DE0000;
        }
    </style>
@endpush

@section('content')
<div class="beats" style="height: auto; padding: 50px 0;">
    <h1 class="beats__title">Корзина</h1>

    @if(session('success'))
        <div style="color: green; font-size: 18px; margin-bottom: 20px;">{{ session('success') }}</div>
    @endif

    @if(count($cart) > 0)
        <div class="beats__list">
            @foreach($cart as $id => $item)
                <div class="beats__item">
                    <div class="beats__item-cover">
                        <img src="{{ asset('img/' . $item['cover_image']) }}" alt="{{ $item['title'] }}">
                    </div>
                    <div class="beats__item-title">
                        <h5>{{ $item['title'] }}</h5>
                    </div>
                    
                    <!-- Управление количеством (Функция 11) -->
                    <div class="cart__quantity-controls">
                        <form action="{{ route('cart.update', $id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="quantity" value="{{ max(1, $item['quantity'] - 1) }}">
                            <button type="submit" class="cart__quantity-btn">−</button>
                        </form>
                        
                        <span style="color: white; font-size: 18px; min-width: 30px; text-align: center;">
                            {{ $item['quantity'] }}
                        </span>
                        
                        <form action="{{ route('cart.update', $id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="quantity" value="{{ min(99, $item['quantity'] + 1) }}">
                            <button type="submit" class="cart__quantity-btn">+</button>
                        </form>
                    </div>
                    
                    <div class="beats__item-tags">
                        <h5>{{ number_format($item['price'] * $item['quantity'], 0, ',', ' ') }} ₽</h5>
                    </div>
                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="cart__remove-btn">✕</button>
                    </form>
                </div>
            @endforeach
        </div>

        <div class="cart__total">
            Итого к оплате: {{ number_format($totalPrice, 0, ',', ' ') }} ₽
        </div>

        <a href="{{ route('checkout') }}" class="cart__checkout-btn">Оформить заказ</a>
    @else
        <div class="cart__empty">
            <h3>Ваша корзина пуста 😔</h3>
            <a href="{{ route('beats') }}" style="color: #DE0000; font-size: 18px; margin-top: 20px; display: inline-block;">Перейти к каталогу битов</a>
        </div>
    @endif
</div>
@endsection