@extends('layout.main')

@section('title', 'Products')

@section('content')
    <div class="container">
        <h1>Menu Products</h1>
        <svg class="nav-icon" width="25" height="20">
            <use xlink:href="{{url('vendors/@coreui/icons/svg/free.svg#cil-diamond')}}"></use>
          </svg> Ini adalah Menu Products Silahkan Melihat Berbagai Products yang Tersedia Disini</a></li>
          <br>
          <br>
        @can('create', App\Product::class)
        <a href="{{ route('products.create') }}" class="btn btn-primary">Tambah Product</a>
        @endcan
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            @can('update', $product)
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                            @endcan
                            @can('delete', $product)
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
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
