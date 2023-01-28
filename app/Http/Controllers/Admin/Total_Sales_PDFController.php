<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Store;
use App\Models\Product;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class Total_Sales_PDFController extends Controller
{
    public function download()
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
        view('admin.total_sales_pdf', compact('total_orders', 'product_sold', 'total_sales', 'yearly_sales'));
        $pdf = PDF::loadView('admin.total_sales_pdf', [
            'total_sales' => $total_sales,
            'total_orders' => $total_orders,
            'product_sold' => $product_sold,
            'user' => $user,
            'store' => $store,
            'product' => $product
        ]);
        return $pdf->download('Total Sales.pdf');
    }
}
