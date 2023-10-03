<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    protected $fillable = ['code', 'name', 'description', 'image', 'price', 'quantity', 'brand_id', 'created_at', 'updated_at'];
}
