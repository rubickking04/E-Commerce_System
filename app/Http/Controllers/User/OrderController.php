<?php

namespace App\Http\Controllers\User;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class OrderController extends Controller
{
    public function index()
    {
        $total = 0;
        $carts = Order::where('user_id', '=', Auth::user()->id)->latest()->get();
        foreach ($carts as $cart) {
            $total += $cart->total_price;
        }
        return view('user.order', compact('carts', 'total'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $total = 0;
        $cartitems = Cart::where('user_id', Auth::user()->id)->get();
        foreach ($cartitems as $items) {
            $total = $items->hasProducts->product_price * $items->quantity;
            Product::where('id', '=', $items->product_id)->where('product_stocks', '>', 0)->decrement('product_stocks', $items->quantity);
            Order::create([
                'user_id' => Auth::user()->id,
                'cart_id' => $items->id,
                'store_id' => $items->store_id,
                'product_id' => $items->hasProducts->id,
                'order_number' => 'E'.rand(1111111,999999),
                'qty' => $items->quantity,
                'total_price' => $total,
            ]);
            $cart = Cart::find($items->id)->delete();
        }
        Alert::toast('Checked out successfully!', 'success');
        return redirect()->route('order');
    }
}
