<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::get();
        // dd($products);
        return view('user.shop', compact('products'), ['product' => $products]);
    }
    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }
}
