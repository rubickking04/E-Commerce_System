<?php

namespace App\Http\Controllers\Store;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProductsTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('store_id', '=', Auth::user()->id)->latest()->paginate(10);
        // dd($products);
        return view('store.products_table', compact('products'));
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
        $products = Product::with(['hasStore' => function ($query) {
            $query->where('id', '=', Auth::id());
        }])->where('product_name', 'LIKE', '%' . $search . '%')->orWhere('id', 'LIKE', '%' . $search . '%')->orWhere('product_category', 'LIKE', '%' . $search . '%')->paginate(10);
        if (count($products) > 0) {
            return view('store.products_table', compact('products'));
        } else {
            return back()->with('msg', 'We couldn\'t find "' . $search . '" on this page.');
        }
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
        $product = Product::find($id)->delete();
        Alert::toast('Removed Successfully!', 'success');
        return back();
    }
}
