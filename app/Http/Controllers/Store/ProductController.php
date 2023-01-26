<?php

namespace App\Http\Controllers\Store;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
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
        return view('store.add_products',  compact('total_orders', 'product_sold', 'total_sales', 'yearly_sales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd('hello');
        $request->validate([
            'product_name' => 'required',
            'product_stocks' => 'required',
            'product_price' => 'required|integer|min:0',
            'product_category' => 'required',
            'product_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'product_definition' => 'required',
        ]);
        $products = Product::create([
            'store_id' => Auth::user()->id,
            'product_name' => $request->input('product_name'),
            'product_stocks' => $request->input('product_stocks'),
            'product_price' => $request->input('product_price'),
            'product_category' => $request->input('product_category'),
            'product_definition' => $request->input('product_definition'),
        ]);
        if (request()->hasFile('product_image')) {
            $filename = request()->product_image->getClientOriginalName();
            request()->product_image->storeAs('products', $filename, 'public');
            $products->update(['product_image' => $filename]);
        }
        Alert::toast('Added Successfully!', 'success');
        return redirect()->route('store.products.table');
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
