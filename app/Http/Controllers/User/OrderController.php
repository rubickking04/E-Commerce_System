<?php

namespace App\Http\Controllers\User;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Haruncpi\LaravelIdGenerator\IdGenerator;

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

    public function store(Request $request, $data){
        $id = IdGenerator::generate(['table' => 'orders', 'length' => 6, 'prefix' => date('y')]);
        foreach ( $data as $param) {
            $orders = Order::create([
                'user_id' => Auth::user()->id,
                'cart_id' => $param['cart_id'],
                'order_number' => $param['order_number'],
                'subtotal_price' => $param['subtotal_price'],
                'total_price' => $param['total_price'],
            ]);
        }
        // $data = [];
        // foreach( $request->query->all() as $row) {
        //     $data[] = [
        //         'id' => $id,
        //         'user_id' => Auth::user()->id,
        //         'title' => $request->title,
        //         'description' => $request->description,
        // }
        // DB::table('orders')->insert($data);
    }
}
