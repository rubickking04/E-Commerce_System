<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'product_id',
        'user_id',
        'store_id',
        'quantity',
    ];
    protected $dates = [
        'deleted_at',
    ];
    public function hasProducts()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function hasProductsStore()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }
    public function hasUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
