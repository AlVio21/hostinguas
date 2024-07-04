<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Price;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('price')->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $prices = Price::all();
        return view('orders.create', compact('prices'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_date' => 'required|date',
            'total_amount' => 'required|numeric',
            'price_id' => 'required|exists:prices,id',
        ]);

        $order = new Order($request->all());
        $order->total_harga = $order->total_amount * $order->price->price;
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Mantap, Order Sudah Berhasil Ditambahkan.');
    }

    public function edit(Order $order)
    {
        $prices = Price::all();
        return view('orders.edit', compact('order', 'prices'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'order_date' => 'required|date',
            'total_amount' => 'required|numeric',
            'price_id' => 'required|exists:prices,id',
        ]);

        $order->update($request->all());
        $order->total_harga = $order->total_amount * $order->price->price;
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Mantap, Order Sudah Berhasil Diperbarui.');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Mantap, Order Sudah Berhasil Dihapus.');
    }
}
