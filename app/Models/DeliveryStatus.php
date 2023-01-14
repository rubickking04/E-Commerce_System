<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'user_id',
        'product_id',
        'store_id',
        'status',
    ];
    public function hasStore()
    {
        return $this->hasMany(Order::class, 'order_id');
    }
}
