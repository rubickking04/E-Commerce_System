<?php

namespace App\Http\Controllers\User;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total = 0;
        $carts = Cart::where('user_id', '=', Auth::user()->id)->latest()->get();
        foreach ($carts as $cart) {
            $total += $cart->hasProducts->product_price * $cart->quantity;
            Product::where('id', '=', $cart->product_id)->where('product_stocks', '>', 0)->decrement('product_stocks', $cart->quantity);
        }
        return view('user.cart', compact('carts', 'total'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Cart::find($id)->forceDelete();
        Alert::toast('Removed Successfully!', 'success');
        return back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyAll()
    {
        $carts = Cart::where('user_id', '=', Auth::user()->id)->delete();
        // foreach ((array) $carts as  $cart){
        //     Product::where('id', '=', $cart->product_id)->where('product_stocks', '>', 0)->decrement('product_stocks', $cart->quantity);
        // }
        // $carts;
        Alert::toast('Checked out Successfully!', 'success');
        return redirect()->route('order');
    }
}
