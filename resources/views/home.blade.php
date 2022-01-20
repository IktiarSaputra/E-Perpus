@extends('layouts.master')

@section('title')
Dashboard User
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
    <div class="col-lg-4 col-md-12 col-sm-12 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
                <i class="fas fa-book"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Buku Di Pinjam</h4>
                </div>
                <div class="card-body">
                   {{ $pinjam->count() }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12 col-sm-12 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-success">
                <i class="fas fa-book"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Buku Di kembalikan</h4>
                </div>
                <div class="card-body">
                    {{ $dikembalikan->count() }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12 col-sm-12 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
                <i class="fas fa-book"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Buku Belum Dikembalikan</h4>
                </div>
                <div class="card-body">
                    {{ $belumdikembalikan->count() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('assets/js/page/index-0.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/daterangepicker.min.js') }}"></script>
@endsection