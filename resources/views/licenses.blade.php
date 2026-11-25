@extends('layouts.app')

@section('title', 'Лицензии и цены')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/licenses.css') }}">
@endpush

@section('content')
<h1 class="licenses__title">Лицензии</h1>
<br>
<div class="licenses__list">
    <div class="licenses__card">
        <h3>Лицензия на песню</h3>
        <div class="licenses__price">
            <p>4 999 ₽</p> <span class="licenses__old-price">6 999 ₽</span>
        </div>
        <div class="licenses__format">
            <p>&#x266C; MP3 + WAV | Без права на музыкальный клип</p>
        </div>
        <ul>
            <li>&#9989; Форматы: MP3 и WAV (высокое качество)</li>
            <li>&#9989; Использование: Коммерческое (без видеоклипа)</li>
            <li>&#9989; Размещение: На Spotify, Apple Music, iTunes и других платформах</li>
            <li>&#9989; Продажи: Разрешено продавать до 3 000 копий</li>
        </ul>
        <button>Оформить лицензию</button>
    </div>

    <div class="licenses__card">
        <h3>Лицензия на клип</h3>
        <div class="licenses__price">
            <p>9 999 ₽</p> <span class="licenses__old-price">14 999 ₽</span>
        </div>
        <div class="licenses__format">
            <p>&#x266C; MP3 + WAV | Включает право на музыкальный клип</p>
        </div>
        <ul>
            <li>&#9989; Форматы: MP3 и WAV (высокое качество)</li>
            <li>&#9989; Использование: Коммерческое (видеоклип включен в стоимость)</li>
            <li>&#9989; Размещение: На Spotify, Apple Music, iTunes и других платформах</li>
            <li>&#9989; Продажи: Разрешено продавать до 5 000 копий</li>
        </ul>
        <button>Оформить лицензию</button>
    </div>

    <div class="licenses__card">
        <h3>Премиум лицензия</h3>
        <div class="licenses__price">
            <p>19 999 ₽</p> <span class="licenses__old-price">29 999 ₽</span>
        </div>
        <div class="licenses__format">
            <p>&#x266C; WAV + Trackout | Включает право на клип</p>
        </div>
        <ul>
            <li>&#9989; Форматы: MP3 и WAV и Trackout (высокое качество)</li>
            <li>&#9989; Использование: Коммерческое (видеоклип включен в стоимость)</li>
            <li>&#9989; Размещение: На Spotify, Apple Music, iTunes и других платформах</li>
            <li>&#9989; Продажи: Неограниченное количество продаж и стримингов</li>
        </ul>
        <button>Оформить лицензию</button>
    </div>

    <div class="licenses__card">
        <h3>Миксинг</h3>
        <div class="licenses__price">
            <p>4 999 ₽</p> <span class="licenses__old-price">7 999 ₽</span>
        </div>
        <div class="licenses__format">
            <p>&#x266C; Миксинг трека | С правом на релиз</p>
        </div>
        <ul>
            <li>&#9989; Форматы: WAV (высокое качество)</li>
            <li>&#9989; Использование: Коммерческое (релиз на платформах)</li>
            <li>&#9989; Размещение: На Spotify, Apple Music, iTunes и других платформах</li>
            <li>&#9989; Продажи: Разрешено продавать до 3 000 копий</li>
        </ul>
        <button>Оформить лицензию</button>
    </div>

    <div class="licenses__card">
        <h3>Мастеринг</h3>
        <div class="licenses__price">
            <p>7 999 ₽</p> <span class="licenses__old-price">11 999 ₽</span>
        </div>
        <div class="licenses__format">
            <p>&#x266C; Мастеринг трека | Включает миксинг (в стоимость)</p>
        </div>
        <ul>
            <li>&#9989; Форматы: WAV (высокое качество)</li>
            <li>&#9989; Использование: Коммерческое (видеоклип включен в стоимость)</li>
            <li>&#9989; Размещение: На Spotify, Apple Music, iTunes и других платформах</li>
            <li>&#9989; Продажи: Разрешено продавать до 8 000 копий</li>
        </ul>
        <button>Оформить лицензию</button>
    </div>

    <div class="licenses__card">
        <h3>Обложка</h3>
        <div class="licenses__price">
            <p>3 999 ₽</p> <span class="licenses__old-price">7 999 ₽</span>
        </div>
        <div class="licenses__format">
            <p>&#x266C; Cover Art | Качество индустриального стандарта</p>
        </div>
        <ul>
            <li>&#9989; Форматы: PNG и JPG</li>
            <li>&#9989; Использование: Коммерческое, готово к публикации</li>
            <li>&#9989; Размещение: На Spotify, Apple Music, iTunes и других платформах</li>
            <li>&#9989; Продажи: Разрешено продавать до 6 000 копий</li>
        </ul>
        <button>Оформить лицензию</button>
    </div>
</div>
@endsection