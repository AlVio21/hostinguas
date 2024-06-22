<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
        public function index(){
            $ordersByProduct = Order::selectRaw('product_id, COUNT(*) as total_orders')
            ->groupBy('product_id')
            ->get()
            ->map(function ($order) {
                $order->product_name = Product::find($order->product_id)->name;
                return $order;
            });

        return view('dashboard.index', compact('ordersByProduct'));
        
    }
}
