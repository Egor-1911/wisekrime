<?php

namespace App\Http\Controllers;


use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;

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
        // Явная защита от брутфорса
        $this->validateLoginAttempts($request);

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
//            сброс счетчика попыток после входа
            RateLimiter::clear($this->loginThrottleKey($request));
            return redirect()->route('personalaccount')->with('success', 'Добро пожаловать!');
        }


//        увеличение счетчика неудачных попыток
        RateLimiter::hit($this->loginThrottleKey($request), 60);

        return back()->withErrors([
            'email' => 'Неверный email или пароль.',
        ])->onlyInput('email');
    }

    /**
     * Проверка лимита попыток входа
     */
    private function validateLoginAttempts(Request $request)
    {
        $key = $this->loginThrottleKey($request);

        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);
            throw new \Illuminate\Http\Exceptions\ThrottleRequestsException(
                null,
                null,
                ['Retry-After' => $seconds]
            );
        }
    }

    /**
     * Ключ для rate limiter входа
     */
    private function loginThrottleKey(Request $request)
    {
        return 'login:' . $request->input('email') . '|' . $request->ip();
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
