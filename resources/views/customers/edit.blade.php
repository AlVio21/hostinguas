@extends('layout.main')

@section('title', 'Edit Customer')

@section('content')
    <div class="container">
        <h1>Edit Customer</h1>
        <form action="{{ route('customers.update', $customer->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="order_id">Order</label>
                <select name="order_id" class="form-control" required>
                    @foreach ($orders as $order)
                        <option value="{{ $order->id }}" {{ $order->id == $customer->order_id ? 'selected' : '' }}>{{ $order->id }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $customer->name }}" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="alamat" name="email" class="form-control" value="{{ $customer->alamat }}" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" class="form-control" value="{{ $customer->phone }}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control">{{ $customer->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Testimoni</button>
        </form>
    </div>
@endsection
