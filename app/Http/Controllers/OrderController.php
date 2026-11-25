<?php

namespace App\Http\Controllers;

use App\Models\License;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Страница оформления заказа (Функция 7)
     */
    public function checkout()
    {
        // Проверяем, что пользователь авторизован
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Для оформления заказа необходимо войти в систему');
        }

        $cart = session()->get('cart', []);

        // Если корзина пуста — redirect
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Корзина пуста');
        }

        // Получаем все типы лицензий из БД
        $licenses = License::all();

        // Считаем сумму корзины
        $cartTotal = 0;
        foreach ($cart as $item) {
            $cartTotal += $item['price'] * $item['quantity'];
        }

        return view('checkout', compact('licenses', 'cart', 'cartTotal'));
    }

    /**
     * Обработка оформления заказа (Функция 7)
     */
    public function store(Request $request)
    {
        // Валидация
        $request->validate([
            'license_id' => 'required|exists:licenses,id',
        ]);

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Корзина пуста');
        }

        // Получаем выбранную лицензию
        $license = License::findOrFail($request->license_id);

        // Считаем итоговую сумму: товары корзины + стоимость лицензии
        $cartTotal = 0;
        foreach ($cart as $item) {
            $cartTotal += $item['price'] * $item['quantity'];
        }
        $totalPrice = $cartTotal + $license->price;

        // Создаём заказ
        $order = Order::create([
            'user_id' => Auth::id(),
            'total_price' => $totalPrice,
            'license_id' => $license->id,
        ]);

        // Создаём позиции заказа
        foreach ($cart as $beatId => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'beat_id' => $beatId,
                'price' => $item['price'] * $item['quantity'],
                // mixing_id и cover_id nullable, так как сейчас только биты
            ]);
        }

        // Очищаем корзину
        session()->forget('cart');

        // Перенаправляем на страницу успеха
        return redirect()->route('order.success', $order->id);
    }

    /**
     * Страница успешного оформления заказа
     */
    public function success($id)
    {
        $order = Order::with(['license', 'orderItems.beat'])->findOrFail($id);

        // Проверяем, что заказ принадлежит текущему пользователю
        if (Auth::id() !== $order->user_id) {
            abort(403);
        }

        return view('order-success', compact('order'));
    }

    /**
     * Список заказов текущего пользователя (Функция 9)
     */
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())
            ->with(['license', 'orderItems.beat'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('orders', compact('orders'));
    }

    /**
     * Детали конкретного заказа
     */
    public function show($id)
    {
        $order = Order::with(['license', 'orderItems.beat'])
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('order-details', compact('order'));
    }
}