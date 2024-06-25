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
