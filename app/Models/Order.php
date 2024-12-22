<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'total_price',
        'shipping_address',
        'shipping_phone',
        'order_status',
        'payment_method',
        'payment_status',
        'notes',
    ];
}
