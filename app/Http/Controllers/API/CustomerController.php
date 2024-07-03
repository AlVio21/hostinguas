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
            $response['message'] = 'Tidak ada customer yang ditemukan.';
            $response['success'] = false;
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }

        $response['success'] = true;
        $response['message'] = 'Customer ditemukan.';
        $response['data'] = $customers;
        return response()->json($response, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|unique:customers',
            'email' => 'required|email|unique:customers',
            'phone' => 'nullable',
           
        ]);

        $customer = Customer::create($validate);
        if ($customer) {
            $response['success'] = true;
            $response['message'] = 'Customer berhasil ditambahkan.';
            return response()->json($response, Response::HTTP_CREATED);
        }
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers,email,' . $id,
            'phone' => 'nullable',
            // Tambahkan validasi lain yang diperlukan
        ]);

        Customer::where('id', $id)->update($validate);
        $response['success'] = true;
        $response['message'] = 'Customer berhasil diperbarui.';
        return response()->json($response, Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $customer = Customer::where('id', $id);
        if ($customer->exists()) {
            $customer->delete();
            $response['success'] = true;
            $response['message'] = 'Customer berhasil dihapus.';
            return response()->json($response, Response::HTTP_OK);
        } else {
            $response['success'] = false;
            $response['message'] = 'Customer tidak ditemukan.';
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }
    }
}
