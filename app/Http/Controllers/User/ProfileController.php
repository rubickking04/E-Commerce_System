<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Order;
use App\Charts\RevenueChart;
use Illuminate\Http\Request;
use App\Models\DeliveryStatus;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
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
        // $monthly_order = Order::whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_price');
        // $today_users = Order::whereDate('created_at', today())->count();
        $chart = new RevenueChart;
        $chart->labels(['One', 'Two', 'Three', 'Four']);
        $chart->dataset('My dataset', 'line', [1, 2, 3]);
        $chart->dataset('My dataset 2', 'line', [4, 3, 2, 1]);
        $status = DeliveryStatus::where('user_id', Auth::id())->take(5)->get();
        // dd($todays_order);
        return view('user.profile', compact('chart', 'total_orders', 'yearly_sales', 'product_sold','status', 'total_sales'));
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
