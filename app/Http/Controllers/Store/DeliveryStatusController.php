<?php

namespace App\Http\Controllers\Store;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\DeliveryStatus;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DeliveryStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
        ]);
        $users = User::find($id);
        $product = Product::find($id);
        $status = DeliveryStatus::create([
            'user_id' => $users->id,
            'product_id' => $product->id,
            'store_id' => Auth::user()->id,
            'status' => $request->status,
        ]);
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
