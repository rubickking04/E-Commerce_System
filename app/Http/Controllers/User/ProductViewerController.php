<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\DeliveryStatus;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductViewerController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $status = DeliveryStatus::where('user_id', Auth::id())->take(3)->get();
        $product = Product::find($id);
        $prod = Product::where('store_id', '=', $product->store_id)->latest()->get();
        // dd($prod);
        return view('user.product', compact('product', 'prod', 'status'));
    }
}
