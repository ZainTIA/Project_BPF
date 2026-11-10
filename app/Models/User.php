<?php

namespace App\Models;

use App\Enums\UserRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use HasFactory, Notifiable;


    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'role',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role' => UserRole::class,
        ];
    }


    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }


    public function cartItems(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }


    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }


    public function isAdmin(): bool
    {
        return $this->role === UserRole::ADMIN;
    }


    public function isCustomer(): bool
    {
        return $this->role === UserRole::CUSTOMER;
    }
}
