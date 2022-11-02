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
        'quantity',
    ];
    protected $dates = [
        'deleted_at',
    ];
    public function hasProducts()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
