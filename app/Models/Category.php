<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

//relationship method
    public function banner()
    {
        return $this->hasMany(Banner::class);
    }
    public function featprod()
    {
        return $this->hasMany(Featprod::class);
    }
    public function menu()
    {
        return $this->hasMany(Menu::class);
    }
    
    protected $fillable = [
        'category_id',
        'name',
        'imageUrl',
    ];
}
