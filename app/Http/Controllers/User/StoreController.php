<?php

namespace App\Http\Controllers\User;

use App\Models\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'store_name' => 'required|string',
            'store_email' => 'required|email|string|max:255',
            'password' => 'required|min:6',
            'password' => 'required|confirmed|min:6',
        ]);
        $store = Store::create([
            'user_id' => Auth::user()->id,
            'store_name' => $request->input('store_name'),
            'store_email' => $request->input('store_email'),
            'password' => Hash::make($request->input('password')),
        ]);
        // dd($teacher);
        // Mail::to($teacher['email'])->send(new WelcomeTeacherMail($teacher));
        Alert::toast('Store Created Successfully!', 'success');
        return redirect()->back();
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
