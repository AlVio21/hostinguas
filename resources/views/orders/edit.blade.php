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
            <div class="form-group">
                <label for="order_date">Order Date</label>
                <input type="date" class="form-control" id="order_date" name="order_date" value="{{ $order->order_date }}" required>
            </div>
            <div class="form-group">
                <label for="total_amount">Total Amount</label>
                <input type="number" class="form-control" id="total_amount" name="total_amount" step="0.01" value="{{ $order->total_amount }}" required>
            </div>
            <div class="form-group">
                <label for="price_id">Price</label>
                <select class="form-control" id="price_id" name="price_id" required>
                    @foreach ($prices as $price)
                        <option value="{{ $price->id }}" {{ $order->price_id == $price->id ? 'selected' : '' }}>
                            {{ $price->price }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
