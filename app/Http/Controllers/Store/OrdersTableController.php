<?php

namespace App\Http\Controllers\Store;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DeliveryStatus;
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
        $cart = Order::where('store_id', '=', Auth::user()->id)->latest()->paginate(10);
        foreach($cart as $order) {
            $prod_id = $order->hasProducts->id;
            $order_id = $order->id;
            $user_id = $order->hasUser->id;
        }
        $carts = Order::with( 'hasStore','hasStatus', 'hasCarts','hasUser', 'hasProducts')->get();
        $status = DeliveryStatus::where('store_id', Auth::user()->id)->where('order_id', $order_id)->where('product_id', $prod_id)->get();
        dd($carts);
        // return view('store.orders_table', compact('cart', 'status'));
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
