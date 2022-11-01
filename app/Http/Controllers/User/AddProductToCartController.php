<?php

namespace App\Http\Controllers\User;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AddProductToCartController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     */
    public function store($id, Request $request)
    {
        $product = Product::find($id);
        $cart = Cart::create([
            'product_id' => $product->id,
            'user_id' => Auth::user()->id,
            'quantity' => $request->input('quantity'),
        ]);
        Alert::toast('Added to cart!', 'success');
        return redirect()->route('cart');
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
        //
    }
}
