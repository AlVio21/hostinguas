@extends('layout.main')

@section('title', 'Prices')

@section('content')
    <div class="container">
        <h1>Menu Prices</h1>
        <svg class="nav-icon" width="25" height="20">
            <use xlink:href="{{url('vendors/@coreui/icons/svg/free.svg#cil-money')}}"></use>
          </svg> Harga Logam Mulia di-update setiap hari pukul. 08.30 WIB</a></li>
          <br>
          <br>
        @can('create', App\Price::class)
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
