<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


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
