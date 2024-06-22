@extends('layout.main')

@section('title', 'Orders')

@section('content')
    <div class="container">
        <h1>Edit Order</h1>
        <form action="{{ route('orders.update', $order->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="customer_id">Customer</label>
                <select class="form-control" id="customer_id" name="customer_id" required>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}" {{ $order->customer_id == $customer->id ? 'selected' : '' }}>
                            {{ $customer->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="product_id">Product</label>
                <select class="form-control" id="product_id" name="product_id" required>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}" {{ $order->product_id == $product->id ? 'selected' : '' }}>
                            {{ $product->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="order_date">Order Date</label>
                <input type="date" class="form-control" id="order_date" name="order_date" value="{{ $order->order_date }}" required>
            </div>
            <div class="form-group">
                <label for="total_amount">Total Amount</label>
                <input type="number" class="form-control" id="total_amount" name="total_amount" value="{{ $order->total_amount }}" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
