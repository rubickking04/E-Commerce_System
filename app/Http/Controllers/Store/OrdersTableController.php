<?php

namespace App\Http\Controllers\Store;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrdersTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Cart::where('store_id', '=', Auth::user()->id)->onlyTrashed()->latest()->paginate(10);
        return view('store.orders_table', compact('cart'));
    }
}
