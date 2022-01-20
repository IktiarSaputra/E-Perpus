@extends('layouts.master')

@section('title')
List Buku
@endsection

@section('css')
<link href="{{ asset('assets/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-select.min.css') }}">
@endsection

@section('content')
<div class="section-header">
    <h1>List Buku</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
        <div class="breadcrumb-item">List Buku</div>
    </div>
</div>

<button class="btn btn-primary mb-4" id="modal-7"><i class="fas fa-bookmark"></i>&nbsp; Pinjam Buku</button>

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
                                    <th>Pengarang</th>
                                    <th>Penerbit</th>
                                    <th>Tebal</th>
                                    <th>Tahun Terbit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($book as $item)
                                <tr>
                                    <td>{{ $item->isbn }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->author }}</td>
                                    <td>{{ $item->publisher }}</td>
                                    <td>{{ $item->pages }} Halaman</td>
                                    <td>{{ $item->year }}</td>
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

<form class="modal-part" id="modal-login-part" action="{{ route('pinjam.buku') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="isbn">Invoice</label>
        <input type="text" name="invoice" class="form-control" readonly value="{{ $invoice }}" placeholder="Invoice" required>
        <p class="text-danger">{{ $errors->first('invoice') }}</p>
    </div>
    <div class="form-group">
        <label for="parent_id">Pilih Buku</label>
        <select name="book_id" class="selectpicker2" id="select-suplier" data-show-subtext="true"
            data-live-search="true">
            @foreach ($book as $row)
                <option value="{{ $row->id }}">{{ $row->title }}</option>
            @endforeach
        </select>
        <p class="text-danger">{{ $errors->first('name') }}</p>
    </div>
    <div class="form-group">
        <label for="year">Tanggal Pinjam</label>
        <input type="date" name="start" class="form-control" placeholder="Tanggal Pinjam" required>
        <p class="text-danger">{{ $errors->first('start') }}</p>
    </div>
    <div class="form-group">
        <label for="year">Sampai Tanggal</label>
        <input type="date" name="end" class="form-control" placeholder="Sampai Tanggal" required>
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <p class="text-danger">{{ $errors->first('end') }}</p>
    </div>
    <div class="form-group">
        <button class="btn btn-primary btn-block">Pinjam</button>
    </div>
</form>

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
    swal("Buku Berhasil Di Update",{
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
