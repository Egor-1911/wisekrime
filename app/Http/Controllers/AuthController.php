<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Страница регистрации
     */
    public function showRegister()
    {
        return view('authentication');
    }

    /**
     * Обработка регистрации (Функция 1 - ТЗ пункт 3.3)
     */
    public function register(Request $request)
    {
        // Валидация по ТЗ
        $request->validate([
            'name' => 'required|string|regex:/^[a-zA-Z]+$/|max:30',
            'surname' => 'required|string|regex:/^[a-zA-Z]+$/|max:30',
            'email' => 'required|string|email|max:50|unique:users,email',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'confirmed'
            ],
        ], [
            'name.regex' => 'Имя должно содержать только латинские буквы',
            'surname.regex' => 'Фамилия должна содержать только латинские буквы',
            'email.email' => 'Некорректный формат email',
            'password.min' => 'Пароль должен содержать минимум 8 символов',
            'password.regex' => 'Пароль должен содержать буквы разных регистров и цифры',
            'password.confirmed' => 'Пароли не совпадают',
        ]);

        // Получаем роль "user" по умолчанию
        $userRole = Role::where('name', 'user')->first();

        // Создаём пользователя
        User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $userRole->id,
        ]);

        return redirect()->route('login')->with('success', 'Регистрация успешна! Теперь войдите в систему.');
    }

    /**
     * Страница входа
     */
    public function showLogin()
    {
        return view('registration');
    }

    /**
     * Обработка входа (Функция 1 - ТЗ пункт 3.3)
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('personalaccount')->with('success', 'Добро пожаловать!');
        }

        return back()->withErrors([
            'email' => 'Неверный email или пароль.',
        ])->onlyInput('email');
    }

    /**
     * Выход из системы
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'Вы вышли из системы.');
    }
}