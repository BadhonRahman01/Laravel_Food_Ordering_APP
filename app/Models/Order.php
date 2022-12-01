<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function product() {

        return $this->belongsTo(Product::class, 'foreign_key');
    }
    public function store() {

        return $this->belongsTo(Store::class, 'foreign_key');
    }

    
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
