<?php

namespace App\Http\Controllers;

use App\Models\Beat;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Отображение корзины

    public function index()
    {
        // Получаем корзину из сессии
        $cart = session()->get('cart', []);
        
        // Считаем общую сумму
        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        return view('cart', compact('cart', 'totalPrice'));
    }


    //   Добавление товара в корзину

    public function add(Request $request, $id)
    {
        $beat = Beat::findOrFail($id);
        $cart = session()->get('cart', []);

        // Если товар уже есть в корзине, увеличиваем количество
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            // Иначе добавляем новый товар
            $cart[$id] = [
                "title" => $beat->title,
                "price" => $beat->price,
                "cover_image" => $beat->cover_image,
                "quantity" => 1
            ];
        }

        session()->put('cart', $cart);
        
        // Возвращаем пользователя обратно на страницу
        return redirect()->back()->with('success', 'Бит добавлен в корзину!');
    }


    //   Удаление товара из корзины (Функция 10)

    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Товар удален из корзины!');
    }


    // изменение количества товара
     public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $quantity = (int) $request->input('quantity');
            
            // Минимальное количество - 1, максимальное - 99
            if ($quantity >= 1 && $quantity <= 99) {
                $cart[$id]['quantity'] = $quantity;
                session()->put('cart', $cart);
            }
        }

        return redirect()->back()->with('success', 'Количество обновлено!');
    }
}