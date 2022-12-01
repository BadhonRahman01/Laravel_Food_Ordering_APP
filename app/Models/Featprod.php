<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Featprod extends Model
{
    use HasFactory;

    public function category() {

        return $this->belongsTo(Category::class, 'foreign_key');
    }
    public function product() {

        return $this->belongsTo(Product::class, 'foreign_key');
    }

    protected $fillable = [
        'featprod_id',
        'name',
        'product_id',
        'category_id',
    ];
}
