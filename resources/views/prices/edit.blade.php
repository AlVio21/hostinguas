@extends('layout.main')

@section('title', 'Prices')

@section('content')
    <div class="container">
        <h1>Edit Price</h1>
        <form action="{{ route('prices.update', $price->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="product_id">Product</label>
                <select class="form-control" id="product_id" name="product_id" required>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}" {{ $price->product_id == $product->id ? 'selected' : '' }}>
                            {{ $product->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $price->price }}" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="effective_date">Effective Date</label>
                <input type="date" class="form-control" id="effective_date" name="effective_date" value="{{ $price->effective_date }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
