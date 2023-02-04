<?php

namespace App\Http\Controllers\Store;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\DeliveryStatus;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
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
        $month = date('m');
        $year = date('Y');
        $total_orders = Order::where('store_id',Auth::id())->get()->count();
        $product_sold= Order::where('store_id',Auth::id())->sum('qty');
        $total_sales = Order::where('store_id', Auth::id())->sum('total_price');
        $yearly_sales = Order::whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_price');
        $cart = Order::where('store_id', '=', Auth::user()->id)->orderBy('created_at', 'DESC')->latest()->paginate(10);
        dd($cart);
        // return view('store.orders_table', compact('cart', 'total_orders', 'product_sold', 'total_sales', 'yearly_sales'));
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
        $month = date('m');
        $year = date('Y');
        $total_orders = Order::where('store_id',Auth::id())->get()->count();
        $product_sold= Order::where('store_id',Auth::id())->sum('qty');
        $total_sales = Order::where('store_id', Auth::id())->sum('total_price');
        $yearly_sales = Order::whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_price');
        $cart = Order::where('order_number', 'LIKE', '%' . $search . '%')->where('store_id', $store_id)
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order= Order::find($id)->delete();
        Alert::toast('Order has been confirmed', 'success');
        return back();
    }
}
