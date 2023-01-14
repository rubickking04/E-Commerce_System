<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'store_id',
        'product_id',
        'cart_id',
        'qty',
        'order_number',
        'total_price',
    ];
    public function hasUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function hasProducts()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function hasCarts()
    {
        return $this->belongsTo(Cart::class, 'cart_id');
    }
    public function hasStore()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }
    public function hasDeliveryStatus()
    {
        return $this->belongsTo(DeliveryStatus::class, 'order_id');
    }
}
