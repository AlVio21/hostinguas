@extends('layout.main')

@section('title', 'Customers')

@section('content')
    <div class="container">
        <h1>Menu Customers</h1>
        <svg class="nav-icon" width="25" height="20">
            <use xlink:href="{{url('vendors/@coreui/icons/svg/free.svg#cil-group')}}"></use>
          </svg> Ini adalah Menu Customers Silahkan Masukkan Data Customers Disini</a></li>
          <br>
          <br>
        <a href="{{ route('customers.create') }}" class="btn btn-primary">Tambah Customer</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>
                            <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
