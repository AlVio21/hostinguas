<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        if ($customers->isEmpty()) {
            $response['message'] = 'Tidak ada testimoni yang ditemukan.';
            $response['success'] = false;
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }

        $response['success'] = true;
        $response['message'] = 'Testimoni ditemukan.';
        $response['data'] = $customers;
        return response()->json($response, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'name' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'phone' => 'nullable|string|max:15',
            'description' => 'nullable|string',
           
        ]);

        $customer = Customer::create($validate);
        if ($customer) {
            $response['success'] = true;
            $response['message'] = 'Testimoni berhasil ditambahkan.';
            return response()->json($response, Response::HTTP_CREATED);
        }
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'name' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'phone' => 'nullable|string|max:15',
            'description' => 'nullable|string',
        ]);

        Customer::where('id', $id)->update($validate);
        $response['success'] = true;
        $response['message'] = 'Testimoni berhasil diperbarui.';
        return response()->json($response, Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $customer = Customer::where('id', $id);
        if ($customer->exists()) {
            $customer->delete();
            $response['success'] = true;
            $response['message'] = 'Testimoni berhasil dihapus.';
            return response()->json($response, Response::HTTP_OK);
        } else {
            $response['success'] = false;
            $response['message'] = 'Testimoni tidak ditemukan.';
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }
    }
}
