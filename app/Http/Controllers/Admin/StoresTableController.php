<?php

namespace App\Http\Controllers\Admin;

use App\Models\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class StoresTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $store = Store::paginate(10);
        return view('admin.stores_table', compact('store'));
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
     * Search the specified Store.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $search = $request->input('search');
        $store = Store::where('store_name', 'LIKE', '%' . $search . '%')->orWhere('email', 'LIKE', '%' . $search . '%')->paginate(10);
        if (count($store) > 0) {
            return view('admin.stores_table', compact('store', 'search'));
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
        $request->validate([
            'store_name' => 'required|string',
            'email' => 'required|email|string|max:255',
        ]);
        $store = Store::find($id);
        $store->store_name = $request['store_name'];
        $store->email = $request['email'];
        $store->save();
        Alert::toast('Updated Successfully!', 'success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $store = Store::find($id)->delete();
        Alert::toast('Store Removed Successfully!', 'success');
        return back();
    }
}
