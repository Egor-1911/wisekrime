@extends('layouts.app')

@section('title', 'Админ-панель')

@push('styles')
    <style>
        .admin {
            max-width: 1100px;
            margin: 0 auto;
            padding: 40px 20px;
        }
        .admin__title {
            font-size: 32px;
            text-align: center;
            margin-bottom: 30px;
            color: #363636;
        }
        .admin__nav {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-bottom: 40px;
            flex-wrap: wrap;
        }
        .admin__nav-link {
            padding: 12px 24px;
            background-color: #363636;
            color: white;
            border-radius: 15px;
            text-decoration: none;
            border: 1px solid black;
            transition: all 0.2s ease;
        }
        .admin__nav-link:hover,
        .admin__nav-link.active {
            background-color: #DE0000;
            border-color: #DE0000;
        }
        .admin__stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }
        .admin__stat-card {
            background-color: #363636;
            border: 1px solid black;
            border-radius: 15px;
            padding: 25px;
            text-align: center;
            transition: all 0.2s ease;
        }
        .admin__stat-card:hover {
            border-color: #DE0000;
            transform: translateY(-2px);
        }
        .admin__stat-value {
            font-size: 36px;
            font-weight: bold;
            color: #DE0000;
            margin-bottom: 10px;
        }
        .admin__stat-label {
            color: white;
            font-size: 16px;
        }
    </style>
@endpush

@section('content')
    <div class="admin">
        <h1 class="admin__title">Админ-панель WiseKrime</h1>

        <div class="admin__nav">
            <a href="{{ route('admin.dashboard') }}" class="admin__nav-link active">Обзор</a>
            <a href="{{ route('admin.users') }}" class="admin__nav-link">Пользователи</a>
            <a href="{{ route('admin.orders') }}" class="admin__nav-link">Заказы</a>
            <a href="{{ route('admin.beats') }}" class="admin__nav-link">Биты</a>
        </div>

        <div class="admin__stats">
            <div class="admin__stat-card">
                <div class="admin__stat-value">{{ $stats['users'] }}</div>
                <div class="admin__stat-label">Пользователей</div>
            </div>
            <div class="admin__stat-card">
                <div class="admin__stat-value">{{ $stats['beats'] }}</div>
                <div class="admin__stat-label">Битов</div>
            </div>
            <div class="admin__stat-card">
                <div class="admin__stat-value">{{ $stats['orders'] }}</div>
                <div class="admin__stat-label">Заказов</div>
            </div>
            <div class="admin__stat-card">
                <div class="admin__stat-value">{{ $stats['studios'] }}</div>
                <div class="admin__stat-label">Студий</div>
            </div>
            <div class="admin__stat-card">
                <div class="admin__stat-value">{{ number_format($stats['revenue'], 0, ',', ' ') }} ₽</div>
                <div class="admin__stat-label">Выручка</div>
            </div>
        </div>
    </div>
@endsection
