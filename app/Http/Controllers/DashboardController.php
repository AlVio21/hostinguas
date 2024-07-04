<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $customersByOrder = Customer::selectRaw('order_id, COUNT(*) as total_customers')
            ->groupBy('order_id')
            ->get()
            ->map(function ($customer) {
                $order = Order::find($customer->order_id);
                $customer->order_name = $order ? $order->name : 'Unknown Order';
                return $customer;
            });

        return view('dashboard.index', compact('customersByOrder'));
    }
}
