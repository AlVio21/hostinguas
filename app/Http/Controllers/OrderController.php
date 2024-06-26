<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('customer', 'product')->get();
        return view('orders.index', compact('orders'));

    }

    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('orders.create', compact('customers', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'product_id' => 'required|exists:products,id',
            'order_date' => 'required|date',
            'total_amount' => 'required|numeric',
        ]);

        Order::create($request->all());
        return redirect()->route('orders.index')->with('success', 'Mantap, Order Sudah Berhasil Ditambahkan.');
    }

    public function edit(Order $order)
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('orders.edit', compact('order', 'customers', 'products'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'product_id' => 'required|exists:products,id',
            'order_date' => 'required|date',
            'total_amount' => 'required|numeric',
        ]);

        $order->update($request->all());
        return redirect()->route('orders.index')->with('success', 'Mantap, Order Sudah Berhasil Diperbarui.');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Mantap, Order Sudah Berhasil Dihapus.');
    }
}