<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'store_id',
        'product_name',
        'product_price',
        'product_image',
        'product_definition',
    ];
    public function product()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }
}
