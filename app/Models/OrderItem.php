<?php


namespace App\Models;


use App\Enums\ProductCondition;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'product_name',
        'product_sku',
        'product_size',
        'product_condition',
        'price',
        'quantity',
        'subtotal',
    ];


    protected function casts(): array
    {
        return [
            'product_condition' => ProductCondition::class,
            'price' => 'decimal:2',
            'quantity' => 'integer',
            'subtotal' => 'decimal:2',
        ];
    }


    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }


    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
