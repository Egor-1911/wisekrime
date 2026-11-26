<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Beat;
use App\Models\Order;
use App\Models\Studio;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Главная страница админ-панели (требование 6)
     */
    public function dashboard()
    {
        $stats = [
            'users' => User::count(),
            'beats' => Beat::count(),
            'orders' => Order::count(),
            'studios' => Studio::count(),
            'revenue' => Order::sum('total_price'),
        ];

        return view('admin.dashboard', compact('stats'));
    }

    /**
     * Список пользователей
     */
    public function users()
    {
        $users = User::with('role')->orderBy('created_at', 'desc')->get();
        return view('admin.users', compact('users'));
    }

    /**
     * Список заказов
     */
    public function orders()
    {
        $orders = Order::with(['user', 'license'])->orderBy('created_at', 'desc')->get();
        return view('admin.orders', compact('orders'));
    }

    /**
     * Список битов
     */
    public function beats()
    {
        $beats = Beat::with('tags')->orderBy('created_at', 'desc')->get();
        return view('admin.beats', compact('beats'));
    }
}
