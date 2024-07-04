@extends('layout.main')

@section('title', 'Orders')

@section('content')
    <div class="container">
        <h1>Tambah Order</h1>
        <form action="{{ route('orders.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="customer_id">Customer</label>
                <select class="form-control" id="customer_id" name="customer_id" required>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="order_date">Order Date</label>
                <input type="date" class="form-control" id="order_date" name="order_date" required>
            </div>
            <div class="form-group">
                <label for="total_amount">Total Amount</label>
                <input type="number" class="form-control" id="total_amount" name="total_amount" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="price_id">Price</label>
                <select class="form-control" id="price_id" name="price_id" required>
                    @foreach ($prices as $price)
                        <option value="{{ $price->id }}">{{ $price->price }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
