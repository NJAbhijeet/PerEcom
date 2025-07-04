<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['session_id', 'user_id', 'product_id', 'sp', 'quantity'];

    public function product(){
        return $this->hasOne(Product::class,'id','product_id');
    }
}
