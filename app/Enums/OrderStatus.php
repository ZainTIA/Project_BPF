<?php
namespace App\Enums;

enum OrderStatus: string
{
    case PENDING = 'pending';
    case PACKED = 'packed';
    case SHIPPED = 'shipped';
    case COMPLETED = 'completed';
    case CANCELLED = 'cancelled';
}
