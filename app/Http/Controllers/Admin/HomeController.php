<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Store;
use App\Models\Product;
use App\Charts\RevenueChart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
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
        $total_orders = Order::get()->count();
        $product_sold= Order::sum('qty');
        $total_sales = Order::sum('total_price');
        $yearly_sales = Order::whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_price');
        $user = User::get()->count();
        $store = Store::get()->count();
        $product = Product::get()->count();
        $products =Product::latest()->take(9)->get();
        $orders = Order::latest()->take(9)->get();
        $chart = new RevenueChart;
        $chart->labels(['Orders', 'Products Sold', 'Products', 'Store', 'Customers']);
        $chart->dataset('My stores Data', 'doughnut', [$total_orders, $product_sold, $product, $store, $user])
            ->color(collect([
                'rgba(255, 99, 132)',
                'rgba(255, 159, 64)',
                'rgba(255, 205, 86)',
                'rgba(75, 192, 192)',
                'rgba(54, 162, 235)',]
            ))->backgroundColor(collect([
                'rgba(255, 99, 132)',
                'rgba(255, 159, 64)',
                'rgba(255, 205, 86)',
                'rgba(75, 192, 192)',
                'rgba(54, 162, 235)',]
            ));
        return view('admin.home', compact(
            'total_orders',
            'product_sold',
            'total_sales',
            'yearly_sales',
            'products',
            'chart',
            'orders'
        ));
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
