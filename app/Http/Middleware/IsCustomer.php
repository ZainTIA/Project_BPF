<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Enums\UserRole;

class IsCustomer
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || Auth::user()->role !== UserRole::CUSTOMER) {
            abort(403, 'Akses hanya untuk Customer.');
        }

        return $next($request);
    }
}
