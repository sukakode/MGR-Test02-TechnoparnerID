@extends('layouts.master')  

@section('content') 
<div class="col-lg-12 col-xl-12 mb-3">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title text-center">Saldo Saat Ini : </h5>
      <h6 class="card-subtitle text-center mb-2 text-muted">Rp. {{ number_format($saldo, 0, ',', '.') }}</h6>
    </div>
  </div>
</div>
<div class="col-lg-6 col-xl-6 mb-3">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title text-center">Total Pemasukan : </h5>
      <h6 class="card-subtitle text-center mb-2 text-muted">Rp. {{ number_format($pemasukan, 0, ',', '.') }}</h6>
      <a href="{{ route('transaksi.index') }}" class="card-link text-center btn-block">Menuju Transaksi</a>
    </div>
  </div>
</div>
<div class="col-lg-6 col-xl-6 mb-3">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title text-center">Total Pengeluaran : </h5>
      <h6 class="card-subtitle text-center mb-2 text-muted">Rp. {{ number_format($pengeluaran, 0, ',', '.') }}</h6>
      <a href="{{ route('transaksi.index') }}" class="card-link text-center btn-block">Menuju Transaksi</a>
    </div>
  </div>
</div> 
@endsection