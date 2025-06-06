<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorProducts extends Model
{
    use HasFactory;

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    
}
