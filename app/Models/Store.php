<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    protected $fillable = [
        'store_id',
        'name',
        'location',
        'latitude',
        'longitude',
        'phone',
        'status',
    ];
}
