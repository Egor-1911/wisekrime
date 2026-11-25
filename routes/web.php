<?php

use Illuminate\Support\Facades\Route;

// Главная
Route::get('/', function () {
    return view('home');
})->name('home');

// Каталог
Route::get('/beats', function () {
    return view('beats');
})->name('beats');

Route::get('/studios', function () {
    return view('studios');
})->name('studios');

Route::get('/mixing', function () {
    return view('mixing');
})->name('mixing');

Route::get('/covers', function () {
    return view('covers');
})->name('covers');

Route::get('/licenses', function () {
    return view('licenses');
})->name('licenses');

// Авторизация и регистрация
Route::get('/login', function () {
    return view('registration');
})->name('login');

Route::get('/register', function () {
    return view('authentication');
})->name('register');

// Личный кабинет и его разделы
Route::get('/personalaccount', function () {
    return view('personalaccount');
})->name('personalaccount');

// Заглушки для функций (Корзина и Заказы)
Route::get('/cart', function () {
    return view('cart');
})->name('cart.index');

Route::get('/orders', function () {
    return view('orders');
})->name('orders.index');