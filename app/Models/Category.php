<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function banner()
    {
        return $this->hasMany(Banner::class);
    }
    
    protected $fillable = [
        'category_id',
        'name',
        'imageUrl',
    ];
}
