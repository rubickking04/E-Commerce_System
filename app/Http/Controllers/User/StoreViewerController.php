<?php

namespace App\Http\Controllers\User;

use App\Models\Store;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreViewerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $store = Store::find($id);
        $products = Product::where('store_id', '=', $store->id)->latest()->get();
        // dd($store);
        return view('user.store_viewer', compact('store', 'products'));
    }
}
