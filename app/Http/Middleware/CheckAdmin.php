<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         // Проверка, является ли пользователь администратором
        // Используйте значение из сессии, если оно установлено
        // if (session()->has('user')['role'] && session('user')['role'] === 'admin') {
        //     return $next($request);
        // }
		// if (session()->has('user') && is_array(session('user')) && session('user')['role'] === 'admin') {
		// 	return $next($request);
		// }
        // Если пользователь не администратор, можете выполнить другие действия,
        // например, перенаправление на другую страницу или отображение ошибки.

        // В этом примере, перенаправим не администраторов на главную страницу.
        return redirect('/');
    }
}
