@extends('layout.main')

@section('title', 'Prices')

@section('content')
    <div class="container">
        <h1>Menu Kategori Prices</h1>
        <svg class="nav-icon" width="25" height="20">
            <use xlink:href="{{url('vendors/@coreui/icons/svg/free.svg#cil-money')}}"></use>
          </svg> Harga Logam Mulia di-update setiap hari pukul. 08.30 WIB</a></li>
          <br>
          <br>
        @can('create', App\Price::class)
        <a href="{{ route('prices.create') }}" class="btn btn-primary">Tambah Kategori</a>
        @endcan
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kategori</th>
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
                        <td>{{ $price->kategori}}</td>
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
                                <button type="submit" class="btn btn-danger show_confirm">Delete</button>
                            </form>
                            @endcan
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
            text: "{{session('success')}}",
            icon: "success"
          });
        </script>
    @endif
    
    <script type="text/javascript">
     
      $('.show_confirm').click(function(event) {
           let form =  $(this).closest("form");
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
          })
           .then((willDelete) => {
             if (willDelete.isConfirmed) {
               form.submit();
             }
           });
       });
    
    </script>
@endsection
