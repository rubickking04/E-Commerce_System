<?php

namespace App\Http\Controllers\User;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $total = 0;
        $carts = Cart::where('user_id', '=', Auth::user()->id)->onlyTrashed()->latest()->get();
        foreach ($carts as $cart) {
            $total += $cart->hasProducts->product_price * $cart->quantity;
        }
        return view('user.order', compact('carts', 'total'));
    }
}
