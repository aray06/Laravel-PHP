<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAccountStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Проверяем, залогинен ли пользователь (Auth::user())
        // 2. Проверяем, активен ли аккаунт (предположим, поле называется 'status')
        if ($request->user() && $request->user()->status !== 'active') {

            // Если аккаунт не активен, перенаправляем (например, на главную)
            // и выводим сообщение об ошибке
            return redirect('/home')->with('error', 'Ваш аккаунт не активен или заблокирован.');
        }

        // Если всё хорошо, пропускаем запрос дальше
        return $next($request);
    }
}
