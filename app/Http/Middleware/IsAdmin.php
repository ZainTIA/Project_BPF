<?php


namespace App\Http\Middleware;


use App\Enums\UserRole;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class IsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }


        if (auth()->user()->role !== UserRole::ADMIN) {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }


        return $next($request);
    }
}
