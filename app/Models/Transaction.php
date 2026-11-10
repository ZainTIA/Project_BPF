<?php


namespace App\Models;


use App\Enums\PaymentStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Transaction extends Model
{
    protected $fillable = [
        'order_id',
        'transaction_code',
        'payment_method',
        'amount',
        'payment_status',
        'payment_proof',
        'paid_at',
        'admin_note',
    ];


    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
            'payment_status' => PaymentStatus::class,
            'paid_at' => 'datetime',
        ];
    }


    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
