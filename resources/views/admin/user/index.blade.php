@extends('layouts.master')

@section('title')
List User
@endsection

@section('css')
<link href="{{ asset('assets/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-select.min.css') }}">
@endsection

@section('content')
<div class="section-header">
    <h1>List User</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard.admin') }}">Dashboard</a></div>
        <div class="breadcrumb-item">User</div>
    </div>
</div>

<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        @if ($item->role == 1)
                                            <span class="badge badge-success">Admin</span>
                                        @else
                                            <span class="badge badge-primary">User</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->created_at->format('d M Y, H:i') }}</td>
                                    <td>{{ $item->updated_at->format('d M Y, H:i') }}</td>
                                    <td>
                                        @if (auth()->user()->id != $item->id)
                                            <a href="{{ route('delete.location', $item->id) }}"
                                            class="btn btn-danger btn-sm delete"><i class="fas fa-trash"></i></a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<form class="modal-part" id="modal-login-part" action="{{ route('location.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="name">Nama</label>
        <input type="text" name="name" class="form-control" placeholder="Nama Lokasi" required>
        <p class="text-danger">{{ $errors->first('name') }}</p>
    </div>
    <div class="form-group">
        <button class="btn btn-primary btn-block">Tambah</button>
    </div>
</form>

@endsection

@section('js')
<script src="{{ asset('assets/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/datatables/datatables-demo.js') }}"></script>
<script src="{{ asset('assets/js/page/bootstrap-modal.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script>

@if (session('insert'))
<script>
    swal("Lokasi Berhasil Di Tambah",{
            title: "Sukses",
            icon: "success",
        });
</script>
@endif

@if (session('update'))
<script>
    swal("Lokasi Berhasil Di Update",{
            title: "Sukses",
            icon: "success",
        });
</script>
@endif

@if (session('delete'))
<script>
    swal("User Berhasil Di Hapus",{
            title: "Sukses",
            icon: "success",
        });
</script>
@endif

<script>
    $('.delete').on('click', function (event) {
      event.preventDefault();
      const url = $(this).attr('href');
      swal({
        title: "Apa Kamu Yakin?",
        text: "User Ini Akan Di Hapus Permanen!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
          if (willDelete) {
              window.location.href = url;
          }
          else {
            swal("User Tetap Tersimpan!");
        }
      });
  });
  </script>

@if (session('error'))
<script>
    swal("Lokasi Gagal Di Hapus",{
            title: "Lokasi Tidak Bisa Di Hapus",
            text: "Lokasi Sudah Memiliki Produk",
            icon: "error",
        });
</script>
@endif

<script>
    $(function () {
        $('.selectpicker2').selectpicker();
    });
</script>

@endsection
