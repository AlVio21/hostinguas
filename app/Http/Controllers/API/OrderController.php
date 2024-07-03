<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        if ($orders->isEmpty()) {
            $response['message'] = 'Tidak ada order yang ditemukan.';
            $response['success'] = false;
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }

        $response['success'] = true;
        $response['message'] = 'Order ditemukan.';
        $response['data'] = $orders;
        return response()->json($response, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'product_id' => 'required|exists:products,id',
            'order_date' => 'required|date',
            'total_amount' => 'required|numeric',
            
        ]);

        $order = Order::create($validate);
        if ($order) {
            $response['success'] = true;
            $response['message'] = 'Order berhasil ditambahkan.';
            return response()->json($response, Response::HTTP_CREATED);
        }
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'product_id' => 'required|exists:products,id',
            'order_date' => 'required|date',
            'total_amount' => 'required|numeric',
            // Tambahkan validasi lain yang diperlukan
        ]);

        Order::where('id', $id)->update($validate);
        $response['success'] = true;
        $response['message'] = 'Order berhasil diperbarui.';
        return response()->json($response, Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $order = Order::where('id', $id);
        if ($order->exists()) {
            $order->delete();
            $response['success'] = true;
            $response['message'] = 'Order berhasil dihapus.';
            return response()->json($response, Response::HTTP_OK);
        } else {
            $response['success'] = false;
            $response['message'] = 'Order tidak ditemukan.';
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }
    }
}
