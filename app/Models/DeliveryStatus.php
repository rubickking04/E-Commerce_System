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
        'created_at',
    ];
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
