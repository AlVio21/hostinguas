@extends('layout.main')

@section('title', 'Orders')

@section('content')
    <div class="container">
        <h1>Menu Orders</h1>
        <svg class="nav-icon" width="25" height="20">
            <use xlink:href="{{ url('vendors/@coreui/icons/svg/free.svg#cil-cart') }}"></use>
        </svg> Ini adalah Menu Orders Silahkan Masukkan Data Orders Disini</a></li>
        <br><br>
        <a href="{{ route('orders.create') }}" class="btn btn-primary">Tambah Order</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Order Date</th>
                    <th>Banyak Produk</th>
                    <th>Price</th>
                    <th>Total Harga</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->order_date }}</td>
                        <td>{{ $order->total_amount }}</td>
                        <td>{{ $order->price->price }}</td>
                        <td>{{ $order->total_harga }}</td>
                        <td>
                            <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger show_confirm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    @if (session('success'))
        <script>
            Swal.fire({
                title: "Good job!",
                text: "{{ session('success') }}",
                icon: "success"
            });
        </script>
    @endif
    
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            let form = $(this).closest("form");
            let name = $(this).data("name");
            event.preventDefault();
            Swal.fire({
                title: "Beneran Mau Dihapus Bang?",
                text: "Kalo Dihapus Nanti Hilang Permanen Lohh!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yaa, Hapus Aja Bang!"
            }).then((willDelete) => {
                if (willDelete.isConfirmed) {
                    form.submit();
                }
            });
        });
    </script>
@endsection
