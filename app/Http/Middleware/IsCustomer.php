<?php

namespace App\Http\Middleware;


use App\Enums\UserRole;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class IsCustomer
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }


        if (auth()->user()->role !== UserRole::CUSTOMER) {
            abort(403, 'Halaman ini khusus customer.');
        }


        return $next($request);
    }
}
