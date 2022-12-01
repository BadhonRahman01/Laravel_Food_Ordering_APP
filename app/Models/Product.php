<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function featprod()
    {
        return $this->hasMany(Featprod::class);
    }
    public function order()
    {
        return $this->hasMany(Order::class);
    }

    protected $fillable = [
        'product_id',
        'name',
        'short_details',
        'price',
        'imageUrl',
        'tag',
        'status',
        'category_id',
    ];
}
