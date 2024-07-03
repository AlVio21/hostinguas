<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        if ($products->isEmpty()) {
            $response['message'] = 'Tidak ada produk yang ditemukan.';
            $response['success'] = false;
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }

        $response['success'] = true;
        $response['message'] = 'Produk ditemukan.';
        $response['data'] = $products;
        return response()->json($response, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|unique:products',
            'description' => 'required',
            'price' => 'required|numeric',
            
        ]);

        $product = Product::create($validate);
        if ($product) {
            $response['success'] = true;
            $response['message'] = 'Produk berhasil ditambahkan.';
            return response()->json($response, Response::HTTP_CREATED);
        }
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'name' => 'required|unique:products,name,' . $id,
            'description' => 'required',
            'price' => 'required|numeric',
            // Tambahkan validasi lain yang diperlukan
        ]);

        Product::where('id', $id)->update($validate);
        $response['success'] = true;
        $response['message'] = 'Produk berhasil diperbarui.';
        return response()->json($response, Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $product = Product::where('id', $id);
        if ($product->exists()) {
            $product->delete();
            $response['success'] = true;
            $response['message'] = 'Produk berhasil dihapus.';
            return response()->json($response, Response::HTTP_OK);
        } else {
            $response['success'] = false;
            $response['message'] = 'Produk tidak ditemukan.';
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }
    }
}
