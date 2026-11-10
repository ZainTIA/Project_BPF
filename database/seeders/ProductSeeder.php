<?php


namespace Database\Seeders;


use App\Enums\ProductCondition;
use App\Enums\ProductStatus;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Vintage Graphic T-Shirt',
                'sku' => 'SL-TS-001',
                'category' => 'T-Shirts',
                'size' => 'L',
                'price' => 85000,
                'condition' => ProductCondition::GOOD,
            ],
            [
                'name' => 'Classic Denim Jacket',
                'sku' => 'SL-JK-001',
                'category' => 'Jackets',
                'size' => 'M',
                'price' => 175000,
                'condition' => ProductCondition::LIKE_NEW,
            ],
            [
                'name' => 'Minimalist Oversized Hoodie',
                'sku' => 'SL-HD-001',
                'category' => 'Hoodies',
                'size' => 'XL',
                'price' => 125000,
                'condition' => ProductCondition::GOOD,
            ],
            [
                'name' => 'Vintage Flannel Shirt',
                'sku' => 'SL-SH-001',
                'category' => 'Shirts',
                'size' => 'L',
                'price' => 95000,
                'condition' => ProductCondition::FAIR,
            ],
            [
                'name' => 'Classic Straight Jeans',
                'sku' => 'SL-JN-001',
                'category' => 'Jeans',
                'size' => '32',
                'price' => 140000,
                'condition' => ProductCondition::GOOD,
            ],
        ];


        foreach ($products as $item) {
            $category = Category::where(
                'slug',
                Str::slug($item['category'])
            )->firstOrFail();


            Product::updateOrCreate(
                ['sku' => $item['sku']],
                [
                    'category_id' => $category->id,
                    'name' => $item['name'],
                    'slug' => Str::slug($item['name']),
                    'description' => 'Produk thrift pilihan Saints-Lastsons.',
                    'size' => $item['size'],
                    'price' => $item['price'],
                    'stock' => 1,
                    'condition' => $item['condition'],
                    'status' => ProductStatus::AVAILABLE,
                ]
            );
        }
    }
}
