<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeatController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;


// Главная страница
Route::get('/', function () {
    return view('home');
})->name('home');

// Каталог и информационные страницы
Route::get('/beats', [BeatController::class, 'index'])->name('beats');
Route::get('/studios', function () { return view('studios'); })->name('studios');
Route::get('/mixing', function () { return view('mixing'); })->name('mixing');
Route::get('/covers', function () { return view('covers'); })->name('covers');
Route::get('/licenses', function () { return view('licenses'); })->name('licenses');

// Авторизация и регистрация (только для гостей)
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
});

// Выход 
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



// middleware личный кабинет, корзина и оформление заказа

Route::middleware(['auth'])->group(function () {
    // Личный кабинет
    Route::get('/personalaccount', function () {
        return view('personalaccount');
    })->name('personalaccount');

    // Корзина
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::patch('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');

    // Оформление заказа
    Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::post('/checkout', [OrderController::class, 'store'])->name('checkout.store');
    Route::get('/order/success/{id}', [OrderController::class, 'success'])->name('order.success');

    // Заказы
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');

    // Редактирование профиля
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
});