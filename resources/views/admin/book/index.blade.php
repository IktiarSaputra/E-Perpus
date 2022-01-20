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
        <div class="breadcrumb-item active"><a href="{{ route('dashboard.admin') }}">Dashboard</a></div>
        <div class="breadcrumb-item">Buku</div>
    </div>
</div>

<button class="btn btn-primary mb-4" id="modal-5"><i class="fas fa-plus"></i> Tambah Buku</button>

<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ISBN</th>
                                    <th>Judul</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($book as $item)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $item->isbn }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->created_at->format('d M Y, H:i') }}</td>
                                    <td>{{ $item->updated_at->format('d M Y, H:i') }}</td>
                                    <td>
                                        <a href="{{ route('book.edit', $item->id) }}"
                                            class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('delete.book', $item->id) }}"
                                            class="btn btn-danger btn-sm delete"><i class="fas fa-trash"></i></a>
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

<form class="modal-part" id="modal-login-part" action="{{ route('book.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="isbn">ISBN</label>
        <input type="text" name="isbn" class="form-control" placeholder="ISBN Buku" required>
        <p class="text-danger">{{ $errors->first('isbn') }}</p>
    </div>
    <div class="form-group">
        <label for="parent_id">Lokasi</label>
        <select name="location_id" class="selectpicker2" id="select-suplier" data-show-subtext="true"
            data-live-search="true">
            <option selected>Pilih Lokasi :</option>
            @foreach ($location as $row)
                <option value="{{ $row->id }}">{{ $row->name }}</option>
            @endforeach
        </select>
        <p class="text-danger">{{ $errors->first('name') }}</p>
    </div>
    <div class="form-group">
        <label for="judul">Judul</label>
        <input type="text" name="title" class="form-control" placeholder="Judul Buku" required>
        <p class="text-danger">{{ $errors->first('title') }}</p>
    </div>
    <div class="form-group">
        <label for="author">Pengarang</label>
        <input type="text" name="author" class="form-control" placeholder="Pengarang Buku" required>
        <p class="text-danger">{{ $errors->first('author') }}</p>
    </div>
    <div class="form-group">
        <label for="publisher">Penerbit</label>
        <input type="text" name="publisher" class="form-control" placeholder="Penerbit Buku" required>
        <p class="text-danger">{{ $errors->first('publisher') }}</p>
    </div>
    <div class="form-group">
        <label for="description">Deskripsi</label>
        <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
        <p class="text-danger">{{ $errors->first('description') }}</p>
    </div>
    <div class="form-group">
        <label for="pages">Jumlah Halaman</label>
        <input type="number" name="pages" class="form-control" placeholder="Jumlah Halaman Buku" required>
        <p class="text-danger">{{ $errors->first('pages') }}</p>
    </div>
    <div class="form-group">
        <label for="year">Tahun Terbit</label>
        <input type="date" name="year" class="form-control" placeholder="Tahun Terbit" required>
        <p class="text-danger">{{ $errors->first('year') }}</p>
    </div>
    <div class="form-group">
        <label for="stok">Jumlah</label>
        <input type="number" name="stok" class="form-control" placeholder="Jumlah Buku" required>
        <p class="text-danger">{{ $errors->first('stok') }}</p>
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
    swal("Buku Berhasil Di Tambah",{
            title: "Sukses",
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
