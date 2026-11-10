<?php


namespace App\Models;


use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Order extends Model
{
    protected $fillable = [
        'order_number',
        'user_id',
        'recipient_name',
        'phone',
        'shipping_address',
        'shipping_method',
        'subtotal',
        'shipping_cost',
        'total_amount',
        'status',
        'notes',
        'paid_at',
        'shipped_at',
        'completed_at',
        'cancelled_at',
    ];


    protected function casts(): array
    {
        return [
            'subtotal' => 'decimal:2',
            'shipping_cost' => 'decimal:2',
            'total_amount' => 'decimal:2',
            'status' => OrderStatus::class,
            'paid_at' => 'datetime',
            'shipped_at' => 'datetime',
            'completed_at' => 'datetime',
            'cancelled_at' => 'datetime',
        ];
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }


    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }


    public function latestTransaction(): HasOne
    {
        return $this->hasOne(Transaction::class)->latestOfMany();
    }
}
