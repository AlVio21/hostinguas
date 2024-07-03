<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PriceController extends Controller
{
    public function index()
    {
        $prices = Price::all();
        if ($prices->isEmpty()) {
            $response['message'] = 'Tidak ada price yang ditemukan.';
            $response['success'] = false;
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }

        $response['success'] = true;
        $response['message'] = 'Price ditemukan.';
        $response['data'] = $prices;
        return response()->json($response, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'product_id' => 'required|exists:products,id',
            'price' => 'required|numeric',
            'effective_date' => 'required|date',
            
        ]);

        $price = Price::create($validate);
        if ($price) {
            $response['success'] = true;
            $response['message'] = 'Price berhasil ditambahkan.';
            return response()->json($response, Response::HTTP_CREATED);
        }
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'product_id' => 'required|exists:products,id',
            'price' => 'required|numeric',
            'effective_date' => 'required|date',
            // Tambahkan validasi lain yang diperlukan
        ]);

        Price::where('id', $id)->update($validate);
        $response['success'] = true;
        $response['message'] = 'Price berhasil diperbarui.';
        return response()->json($response, Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $price = Price::where('id', $id);
        if ($price->exists()) {
            $price->delete();
            $response['success'] = true;
            $response['message'] = 'Price berhasil dihapus.';
            return response()->json($response, Response::HTTP_OK);
        } else {
            $response['success'] = false;
            $response['message'] = 'Price tidak ditemukan.';
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }
    }
}
