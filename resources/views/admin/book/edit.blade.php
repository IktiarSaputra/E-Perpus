@extends('layouts.master')

@section('title')
    Update Buku
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-select.min.css') }}">
@endsection

@section('content')
<div class="section-header">
    <h1>Update Lokasi</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard.admin') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="{{ route('book.index') }}">Buku</a></div>
        <div class="breadcrumb-item">Update Buku</div>
    </div>
</div>

<a href="{{ route('book.index') }}" class="btn btn-primary mb-4"><i class="fas fa-arrow-left"></i> Kembali</a>

<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('book.update', $book->id) }}" method="post">
                        @csrf
                        @method('PUT')
                         
                        <div class="form-group">
                            <label for="isbn">ISBN</label>
                            <input type="text" name="isbn" class="form-control" value="{{ $book->isbn }}" placeholder="ISBN Buku" required>
                            <p class="text-danger">{{ $errors->first('isbn') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="parent_id">Lokasi</label>
                            <select name="location_id" class="selectpicker2" id="select-suplier" data-show-subtext="true"
                                data-live-search="true">
                                <option selected>Pilih Lokasi :</option>
                                @foreach ($location as $row)
                                    <option value="{{ $row->id }}"  {{ $book->location_id == $row->id ? 'selected':'' }}>{{ $row->name }}</option>
                                @endforeach
                            </select>
                            <p class="text-danger">{{ $errors->first('name') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" name="title" class="form-control" value="{{ $book->title }}" placeholder="Judul Buku" required>
                            <p class="text-danger">{{ $errors->first('title') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="author">Pengarang</label>
                            <input type="text" name="author" class="form-control" value="{{ $book->author }}" placeholder="Pengarang Buku" required>
                            <p class="text-danger">{{ $errors->first('author') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="publisher">Penerbit</label>
                            <input type="text" name="publisher" class="form-control" value="{{ $book->publisher }}" placeholder="Penerbit Buku" required>
                            <p class="text-danger">{{ $errors->first('publisher') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <textarea name="description" class="form-control" id="" cols="30" rows="10" required>{{ $book->description }}</textarea>
                            <p class="text-danger">{{ $errors->first('description') }} </p>
                        </div>
                        <div class="form-group">
                            <label for="pages">Jumlah Halaman</label>
                            <input type="number" name="pages" class="form-control" value="{{ $book->pages }}" placeholder="Jumlah Halaman Buku" required>
                            <p class="text-danger">{{ $errors->first('pages') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="year">Tahun Terbit</label>
                            <input type="date" name="year" class="form-control" value="{{ $book->year }}" placeholder="Tahun Terbit" required>
                            <p class="text-danger">{{ $errors->first('year') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="stok">Jumlah</label>
                            <input type="number" name="stok" class="form-control" value="{{ $book->stok }}" placeholder="Jumlah Buku" required>
                            <p class="text-danger">{{ $errors->first('stok') }}</p>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script>
<script>
    $(function () {
        $('.selectpicker2').selectpicker();
    });
</script>
@endsection