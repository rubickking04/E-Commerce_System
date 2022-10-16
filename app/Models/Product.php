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
        'prodcut_category',
        'product_image',
        'product_definition',
    ];
    public function product()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }
}
