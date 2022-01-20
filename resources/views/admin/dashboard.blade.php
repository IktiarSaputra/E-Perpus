@extends('layouts.master')

@section('title')
Dashboard Admin
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/daterangepicker.css') }}" />
<style>
    .section-title{
        margin: 10px !important;
    }
</style>
@endsection

@section('content')
<div class="section-header">
    <h1>Dashboard</h1>
</div>
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="fas fa-book"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Buku</h4>
                </div>
                <div class="card-body">
                    {{ \DB::table('books')->count() }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-info">
                <i class="fas fa-map-marker-alt"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Location</h4>
                </div>
                <div class="card-body">
                    {{ \DB::table('locations')->count() }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-success">
                <i class="fas fa-book-reader"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Peminjam</h4>
                </div>
                <div class="card-body">
                    {{ \DB::table('peminjams')->count() }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
                <i class="fas fa-user"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Anggota</h4>
                </div>
                <div class="card-body">
                    {{ \DB::table('users')->count() }}
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="fas fa-box"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Produk</h4>
                </div>
                <div class="card-body">
                    {{ \DB::table('categories')->count() }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-info">
                <i class="fas fa-people-carry"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Supplier</h4>
                </div>
                <div class="card-body">
                    {{ \DB::table('supliers')->count() }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-success">
                <i class="fas fa-dolly-flatbed"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Produk Masuk</h4>
                </div>
                <div class="card-body">
                    {{ \DB::table('products')->count() }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
                <i class="fas fa-dolly"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Produk Keluar</h4>
                </div>
                <div class="card-body">
                    {{ \DB::table('product_ins')->count() }}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <h2 class="section-title">Total Pemasukan & Pengeluaran</h2>
    </div>
    <div class="col-md-4">
        <form action="{{ route('dashboard.income') }}" method="get">
            <div class="input-group pl-0 mb-3  ml-auto">
                <input type="text" id="created_at_pemasukan" name="date" class="form-control">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-filter"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 col-md-12 col-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="summary">
                    <div class="summary-info">
                        @php $total = 0; @endphp
                        @foreach ($income as $t)
                        @php $total += $t->subtotal @endphp
                        @endforeach
                        <h4>Rp. {{ number_format($total) }}</h4>

                        <div class="text-muted">
                            @forelse ($pemasukan as $item)
                                Pemasukan <span class="text-success">+ Rp. {{ number_format($t->subtotal) }}</span>
                            @empty
                                Tidak Ada Pemasukan
                            @endforelse
                        </div>
                        
                        <div class="d-block mt-2">
                            <a href="{{ route('expense.index') }}">View All</a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-12 col-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="summary">
                    <div class="summary-info">
                        @php $total = 0; @endphp
                        @foreach ($expense as $row)
                        @php $total += $row->subtotal @endphp
                        @endforeach
                        <h4>Rp. {{ number_format($total) }}</h4>

                        <div class="text-muted">
                            @forelse ($pengeluaran as $p)
                                Pengeluaran <span class="text-success">+ Rp. {{ number_format($p->subtotal) }}</span>
                            @empty
                                Tidak Ada Pengeluaran
                            @endforelse
                        </div>
                        
                        <div class="d-block mt-2">
                            <a href="{{ route('expense.index') }}">View All</a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection

@section('js')
<script src="{{ asset('assets/js/page/index-0.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/daterangepicker.min.js') }}"></script>
@endsection