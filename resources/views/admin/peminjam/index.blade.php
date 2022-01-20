@extends('layouts.master')

@section('title')
List Buku Di Pinjam
@endsection

@section('css')
<link href="{{ asset('assets/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-select.min.css') }}">
@endsection

@section('content')
<div class="section-header">
    <h1>List Buku Di Pinjam</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
        <div class="breadcrumb-item">List Buku Di Pinjam</div>
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
                                    <th>ISBN</th>
                                    <th>Judul</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Sampai Tanggal</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pinjam as $item)
                                <tr>
                                    <td>{{ $item->book->isbn }}</td>
                                    <td>{{ $item->book->title }}</td>
                                    <td>{{ $item->start }}</td>
                                    <td>{{ $item->end }}</td>
                                    <td>
                                        @if ($item->status == "0")
                                            <span class="badge badge-warning">Menunggu Persetujuan</span>
                                        @elseif($item->status == "1")
                                            <span class="badge badge-info">Disetujui</span>
                                        @elseif($item->status == "2" )
                                            <span class="badge badge-danger">Buku Belum Dikembalikan</span>
                                        @else
                                            <span class="badge badge-success">Buku Sudah Dikembalikan</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->status == "0")
                                            <form action="{{ route('pinjam-buku.update', $item->id) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="status" value="1">
                                                <button type="submit" class="btn btn-success">Setujui</button>
                                            </form>
                                        @elseif($item->status == "2" )
                                            <form action="{{ route('buku.dikembalikan', $item->id) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="status" value="3">
                                                <button type="submit" class="btn btn-success">Sudah Dikembalikan</button>
                                            </form>
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

@endsection

@section('js')
<script src="{{ asset('assets/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/datatables/datatables-demo.js') }}"></script>
<script src="{{ asset('assets/js/page/bootstrap-modal.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script>

@if (session('pinjam'))
<script>
    swal("harap tunggu konfirmasi dari admin",{
            title: "Pengajuan Peminjaman Berhasil",
            icon: "success",
        });
</script>
@endif

@if (session('update'))
<script>
    swal("Pinjaman Berhasil Di Setujui",{
            title: "Sukses",
            icon: "success",
        });
</script>
@endif

@if (session('delete'))
<script>
    swal("Buku Berhasil Di Hapus",{
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
        text: "Buku Ini Akan Di Hapus Permanen!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
          if (willDelete) {
              window.location.href = url;
          }
          else {
            swal("Buku Tetap Tersimpan!");
        }
      });
  });
  </script>

@if (session('error'))
<script>
    swal("Buku Gagal Di Hapus",{
            title: "Buku Tidak Bisa Di Hapus",
            text: "Buku Sudah Memiliki Produk",
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
