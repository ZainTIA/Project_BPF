<?php

namespace Database\Seeders;


use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@saints-lastsons.com'],
            [
                'name' => 'Administrator',
                'phone' => '081234567890',
                'password' => Hash::make(
                    env('ADMIN_PASSWORD', 'AdminSaints123!')
                ),
                'role' => UserRole::ADMIN,
            ]
        );
    }
}
