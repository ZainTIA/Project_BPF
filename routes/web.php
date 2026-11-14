<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Enums\UserRole;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\ProductController;

// Halaman utama
Route::get('/', function () {
    if (!Auth::check()) {
        return redirect()->route('login');
    }

    if (Auth::user()->role === UserRole::ADMIN) {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('shop.index');
});

// // Login dan Register
// Route::middleware('guest')->group(function () {

//     Route::get('/login', [AuthController::class, 'showLogin'])
//         ->name('login');

//     Route::post('/login', [AuthController::class, 'login'])
//         ->name('login.process');

//     Route::get('/register', [AuthController::class, 'showRegister'])
//         ->name('register');

//     Route::post('/register', [AuthController::class, 'register'])
//         ->name('register.process');
// });

// Login dan Register (tanpa middleware guest, agar jika tombol Back ditekan ke /login tidak dilempar balik)
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.process');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// Route Admin (khusus Admin)
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        // CRUD Produk
        Route::resource('products', ProductController::class);

    });

// Route Customer / Shop (semua user yang login boleh masuk, termasuk Admin)
Route::middleware(['auth'])
    ->prefix('shop')
    ->name('shop.')
    ->group(function () {

        Route::get('/', function () {
            return view('shop.index');
        })->name('index');

    });