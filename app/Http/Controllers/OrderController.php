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
        /**
     * Страница оформления заказа (Функция 7)
     */
    public function checkout()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Для оформления заказа необходимо войти в систему');
        }

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Корзина пуста');
        }

        // Разделяем лицензии на две категории
        $beatLicenses = License::beat()->get();
        $serviceLicenses = License::service()->get();

        // Считаем сумму корзины
        $cartTotal = 0;
        foreach ($cart as $item) {
            $cartTotal += (float) $item['price'] * (int) $item['quantity'];
        }

        return view('checkout', compact('beatLicenses', 'serviceLicenses', 'cart', 'cartTotal'));
    }

    /**
     * Обработка оформления заказа (Функция 7)
     */
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Сессия истекла. Пожалуйста, войдите снова.');
        }

        $request->validate([
            'license_id' => 'required|exists:licenses,id',
            'services' => 'nullable|array',
            'services.*' => 'exists:licenses,id',
        ]);

        
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Корзина пуста');
        }

        // Получаем выбранную лицензию на бит
        $license = License::findOrFail($request->license_id);

        // Считаем сумму корзины (приводим к float!)
        $cartTotal = 0;
        foreach ($cart as $item) {
            $cartTotal += (float) $item['price'] * (int) $item['quantity'];
        }

        // Считаем сумму выбранных доп. услуг
        $servicesTotal = 0;
        $selectedServices = [];
        if ($request->has('services')) {
            $serviceIds = $request->input('services');
            $services = License::whereIn('id', $serviceIds)->where('category', 'service')->get();
            foreach ($services as $service) {
                $servicesTotal += (float) $service->price;
                $selectedServices[] = $service->id;
            }
        }

        // Итоговая сумма
        $totalPrice = $cartTotal + (float) $license->price + $servicesTotal;

        // Создаём заказ
        $order = Order::create([
            'user_id' => Auth::id(),
            'total_price' => $totalPrice,
            'license_id' => $license->id,
        ]);

        // Создаём позиции заказа для битов
        foreach ($cart as $beatId => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'beat_id' => $beatId,
                'name' => $item['title'], // ← Добавлено
                'price' => (float) $item['price'] * (int) $item['quantity'],
            ]);
        }

        // Создаём позиции заказа для доп. услуг
        foreach ($services as $service) {
            OrderItem::create([
                'order_id' => $order->id,
                'name' => $service->name,
                'price' => (float) $service->price,
            ]);
        }

        // Очищаем корзину
        session()->forget('cart');

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