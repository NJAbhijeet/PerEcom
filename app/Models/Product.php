<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->hasone(Category::class, 'id', 'category_id');
    }

    public function units()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    public function product_image()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function single_image()
    {
        return $this->belongsTo(ProductImage::class, 'id', 'product_id');
    }
}
