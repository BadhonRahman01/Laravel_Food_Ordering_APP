<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    public function category() {

        return $this->belongsTo(Category::class, 'foreign_key');
    }

    protected $fillable = [
        'banner_id',
        'title',
        'imageUrl',
        'redirectUrl',
        'category_id',
    ];
}
