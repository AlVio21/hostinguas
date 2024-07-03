<?php

namespace App\Http\Controllers;

use App\Models\Price;
use App\Models\Product;
use Illuminate\Http\Request;

class PricesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prices = Price::with('product')->get();
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
            'kategori' => 'required',
            'product_id' => 'required|exists:products,id',
            'price' => 'required|numeric',
            'effective_date' => 'required|date',
        ]);

        Price::create($request->all());
        return redirect()->route('prices.index')->with('success', 'Mantap, Price Sudah Berhasil Ditambahkan.');
    }

    public function edit(Price $price)
    {
        $products = Product::all();
        return view('prices.edit', compact('price', 'products'));
    }

    public function update(Request $request, Price $price)
    {
        $request->validate([
            'kategori' => 'required',
            'product_id' => 'required|exists:products,id',
            'price' => 'required|numeric',
            'effective_date' => 'required|date',
        ]);

        $price->update($request->all());
        return redirect()->route('prices.index')->with('success', 'Mantap, Price Sudah Berhasil Diperbarui.');
    }

    public function destroy(Price $price)
    {
        $price->delete();
        return redirect()->route('prices.index')->with('success', 'Mantap, Price Sudah Berhasil Dihapus.');
    }
}