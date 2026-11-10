<?php

namespace Database\Seeders;


use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'T-Shirts',
            'Shirts',
            'Jackets',
            'Hoodies',
            'Sweatshirts',
            'Pants',
            'Jeans',
            'Shorts',
            'Accessories',
        ];


        foreach ($categories as $name) {
            Category::updateOrCreate(
                ['slug' => Str::slug($name)],
                [
                    'name' => $name,
                    'description' => 'Koleksi thrift ' . $name,
                    'is_active' => true,
                ]
            );
        }
    }
}
