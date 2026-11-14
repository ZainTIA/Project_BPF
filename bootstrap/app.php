<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use App\Enums\UserRole;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsCustomer;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'admin' => \App\Http\Middleware\IsAdmin::class,
            'customer' => \App\Http\Middleware\IsCustomer::class,
        ]);

        $middleware->redirectUsersTo(function (Request $request) {
            if ($request->user() && $request->user()->role === UserRole::ADMIN) {
                return route('admin.dashboard');
            }
            return route('shop.index');
        });
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();