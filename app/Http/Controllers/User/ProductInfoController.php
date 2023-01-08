<?php

namespace App\Http\Controllers\User;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductInfoController extends Controller
{
    public function index(Order $orders) {
        $prodName = $orders->hasProducts->product_name;
        $prodPrice = $orders->hasProducts->product_price;
        $prodImage = $orders->hasProducts->product_image;
        $storeName = $orders->hasStore->store_name;
        $qty = $orders->qty;
        $totalPrice = $orders->total_price;
        $prodCategory = $orders->hasProducts->product_category;
        $orderDate = $orders->created_at;
        $orderNum = $orders->order_number;
        // dd($orders->hasProducts->product_name);
        return view('user.product_info', compact('prodPrice', 'prodName', 'storeName', 'prodImage', 'qty', 'totalPrice', 'prodCategory', 'orderNum', 'orderDate'));
    }
}
