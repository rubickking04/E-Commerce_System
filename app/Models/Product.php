<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'store_id',
        'product_name',
        'product_price',
        'product_category',
        'product_image',
        'product_definition',
    ];
    public function hasStore()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }
    public function hasCart()
    {
        return $this->hasMany(Cart::class, 'product_id');
    }
}
