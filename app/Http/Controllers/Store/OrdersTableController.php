<?php

namespace App\Http\Controllers\Store;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Database\Query\Builder;

class OrdersTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Order::where('store_id', '=', Auth::user()->id)->latest()->paginate(10);
        return view('store.orders_table', compact('cart'));
    }

    /**
     * Search a product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $search = $request->input('search');
        $store_id = Auth::user()->id;
        $cart = Order::where('order_number', 'LIKE', '%' . $search . '%')
        ->orWhereHas('hasProducts', function (Builder $query) use ($search)
        {
            $query->where('product_name','LIKE','%'.$search.'%');
        })
        ->orWhereHas('hasUser', function (Builder $query) use ($search)
        {
            $query->where('name','LIKE','%'.$search.'%');
        })->paginate(10);
        if (count($cart) > 0) {
            return view('store.orders_table', compact('cart'));
        } else {
            return back()->with('msg', 'We couldn\'t find "' . $search . '" on this page.');
        }
    }
}
