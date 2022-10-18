<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductViewerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product, Request  $request)
    {
        $products = Product::get();
        foreach ($products as $product) {
            $prodName = $product->product_name;
            $prodPrice = $product->product_price;
            $prodImg = $product->product_image;
            $prodDef = $product->product_definition;
            $prodCat = $product->product_category;
        }
        // dd($prodName);
        return view('user.product', compact('products', 'prodName', 'prodPrice', 'prodImg', 'prodDef', 'prodCat'));
    }
}
