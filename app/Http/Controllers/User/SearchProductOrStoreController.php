<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Database\Query\Builder;

class SearchProductOrStoreController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->input('search');
        $products = Product::where('product_name', 'LIKE', '%' . $search . '%')->orWhere('product_category', 'LIKE', '%' . $search . '%')->paginate(10);
        if (count($products) > 0) {
            // dd($products);
            return view('user.shop', compact('products'))->with('success', 'Search result for "' . $search . '"');
        } else {
            return back()->with('msg', 'We couldn\'t find "' . $search . '" on this page.');
        }
    }
}
