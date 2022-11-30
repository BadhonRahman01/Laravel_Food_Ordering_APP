<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'order_id',
        'serving_method',
        'applied_coupons',
        'total_price',
        'unit',
        'payment_method',
        'delivery_address',
        'delivery_status',
        'tran_id',
        'user_id',
        'product_id',
        'store_id',
    ];
}
