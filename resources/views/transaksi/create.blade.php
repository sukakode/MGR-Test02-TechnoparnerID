@extends('layouts.master')  

@section('css')
<link rel="stylesheet" href="{{ asset('externalAssets/css/select2.min.css') }}">
<style>
  .select2-container .select2-selection--single {
    height: 38px !important;
  }
  .select2-container--default .select2-selection--single .select2-selection__rendered {
    line-height: 35px !important;
  }
  .select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 38px !important;
  }
  .has-error .select2-selection {
    border-color: rgb(185, 74, 72) !important;
  }
</style>
@endsection

@section('content')
<div class="col-12">
  <div class="card">
    <div class="card-header">
      Form Transaksi
      <span class="float-right">
        <a href="{{ route('transaksi.index') }}" class="btn btn-sm btn-danger">Kembali</a>
      </span>
    </div>
    <div class="card-body">
      <form action="{{ route('transaksi.store') }}" method="post">
        @csrf
        @livewire('kategori-combo')
        <div class="row"> 
          <div class="col-12">
            <div class="form-group">
              <label for="">Keterangan : </label>
              <textarea name="description" id="description" cols="1" rows="1" class="form-control @error('description') is-invalid @enderror" placeholder="Masukan Deskripsi Kategori...">{{ old('description') }}</textarea>
              <div class="invalid-feedback">
                {{ $errors->first('description') }}
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-2 col-xl-2 mb-2">
            <button type="submit" class="btn btn-success btn-sm btn-block">
              Simpan
            </button>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-2 col-xl-2 mb-2">
            <button type="reset" class="btn btn-danger btn-sm btn-block">
              Reset
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('script')
<script src="{{ asset('externalAssets/js/select2.min.js') }}"></script>
@endsection