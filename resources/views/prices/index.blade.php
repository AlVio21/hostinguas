@extends('layout.main')

@section('title', 'Prices')

@section('content')
    <div class="container">
        <h1>Menu Prices</h1>
        @can('create', App\Prices::class)
        <a href="{{ route('prices.create') }}" class="btn btn-primary">Tambah Price</a>
        @endcan
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Effective Date</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prices as $price)
                    <tr>
                        <td>{{ $price->id }}</td>
                        <td>{{ $price->product->name }}</td>
                        <td>{{ $price->price }}</td>
                        <td>{{ $price->effective_date }}</td>
                        <td>
                            @can('update', $price)
                            <a href="{{ route('prices.edit', $price->id) }}" class="btn btn-warning">Edit</a>
                            @endcan
                            @can('delete', $price)
                            <form action="{{ route('prices.destroy', $price->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
