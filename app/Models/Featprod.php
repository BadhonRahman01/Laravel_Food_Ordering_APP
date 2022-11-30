<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Featprod extends Model
{
    use HasFactory;


    protected $fillable = [
        'featprod_id',
        'name',
        'product_id',
        'category_id',
    ];
}
