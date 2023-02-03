<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $cart = Order::latest()->paginate(10);
        return view('admin.orders_table', compact('cart'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $month = date('m');
        $year = date('Y');
        $total_orders = Order::get()->count();
        $product_sold= Order::sum('qty');
        $total_sales = Order::sum('total_price');
        $yearly_sales = Order::whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_price');
        $search = $request->input('search');
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
            return view('store.orders_table', compact('cart', 'total_orders', 'product_sold', 'total_sales', 'yearly_sales'));
        } else {
            return back()->with('msg', 'We couldn\'t find "' . $search . '" on this page.');
        }
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
