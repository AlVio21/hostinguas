<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $ordersByCustomer = Order::selectRaw('customer_id, COUNT(*) as total_orders')
            ->groupBy('customer_id')
            ->get()
            ->map(function ($order) {
                $order->customer_name = Customer::find($order->customer_id)->name;
                return $order;
            });

        return view('dashboard.index', compact('ordersByCustomer'));
    }
}

