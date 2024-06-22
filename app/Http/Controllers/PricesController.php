<?php

namespace App\Http\Controllers;

use App\Models\prices;
use App\Models\Product;
use Illuminate\Http\Request;

class PricesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prices = Prices::with('product')->get();
        return view('prices.index', compact('prices'));
    }

    public function create()
    {
        $products = Product::all();
        return view('prices.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'price' => 'required|numeric',
            'effective_date' => 'required|date',
        ]);

        Prices::create($request->all());
        return redirect()->route('prices.index')->with('success', 'Price created successfully.');
    }

    public function edit(Prices $price)
    {
        $products = Product::all();
        return view('prices.edit', compact('price', 'products'));
    }

    public function update(Request $request, Prices $price)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'price' => 'required|numeric',
            'effective_date' => 'required|date',
        ]);

        $price->update($request->all());
        return redirect()->route('prices.index')->with('success', 'Price updated successfully.');
    }

    public function destroy(Prices $price)
    {
        $price->delete();
        return redirect()->route('prices.index')->with('success', 'Price deleted successfully.');
    }
}