<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
//     Проверка роли пользователя.

    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        // Если пользователь не авторизован — редиректим на страницу входа
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Для доступа к админ-панели необходимо войти в систему.');
        }

        // Получаем роль текущего пользователя
        $userRole = Auth::user()->role->name;

        // Если роль не входит в разрешённые — редиректим на главную
        if (!in_array($userRole, $roles)) {
            abort(403, 'У вас нет прав для доступа к этой странице.');
        }

        return $next($request);
    }
}
