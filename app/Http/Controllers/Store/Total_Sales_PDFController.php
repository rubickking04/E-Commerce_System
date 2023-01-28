<?php

namespace App\Http\Controllers\Store;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class Total_Sales_PDFController extends Controller
{
    public function download()
    {
        $month = date('m');
        $year = date('Y');
        $total_orders = Order::where('store_id',Auth::id())->get()->count();
        $product_sold= Order::where('store_id',Auth::id())->sum('qty');
        $total_sales = Order::where('store_id',Auth::id())->sum('total_price');
        $yearly_sales = Order::where('store_id',Auth::id())->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_price');
        view('store.total_sales_pdf', compact('total_orders', 'product_sold', 'total_sales', 'yearly_sales'));
        $pdf = PDF::loadView('admin.total_sales_pdf', [
            'total_sales' => $total_sales,
            'total_orders' => $total_orders,
            'product_sold' => $product_sold,
        ]);
        return $pdf->download('Total Sales.pdf');
    }
}
