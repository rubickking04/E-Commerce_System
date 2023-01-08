<?php

namespace App\Models;


use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Store extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'store_name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function hasUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function hasProduct()
    {
        return $this->hasMany(Product::class, 'store_id');
    }
    public function hasUserProduct()
    {
        return $this->hasMany(Cart::class, 'store_id');
    }
    public function hasOrders()
    {
        return $this->hasMany(Order::class, 'store_id');
    }
}
