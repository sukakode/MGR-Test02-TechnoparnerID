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
      Form Edit Kategori
      <span class="float-right">
        <a href="{{ route('kategori.index') }}" class="btn btn-sm btn-danger">Kembali</a>
      </span>
    </div>
    <div class="card-body">
      <form action="{{ route('kategori.update', $edit->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-lg-4 col-xl-4">
            <div class="form-group @error('type') has-error @enderror">
              <label for="">Jenis Kategori : ({{ $edit->type ? 'Pemasukan':'Pengeluaran' }})</label>
              <select name="type" id="type" class="form-control" style="width: 100% !important; " data-placeholder="Pilih Jenis Kategori" required>
                <option value=""></option>
                <option value="1" {{ $edit->type ? 'selected':'' }}>Pemasukan</option>
                <option value="0" {{ !$edit->type ? 'selected':'' }}>Pengeluaran</option>
              </select>
              <div class="text-danger" style="width: 100%; margin-top: .25rem; font-size: 80%;">
                {{ $errors->first('type') }}
              </div>
            </div>
          </div>
          <div class="col-lg-8 col-xl-8">
            <div class="form-group">
              <label for="">Nama Kategori : ({{ $edit->name }})</label>
              <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukan Nama Kategori..." value="{{ $edit->name }}" required>
              <div class="invalid-feedback">
                {{ $errors->first('name') }}
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="form-group">
              <label for="">Keterangan : ({{ $edit->description }})</label>
              <textarea name="description" id="description" cols="1" rows="1" class="form-control @error('description') is-invalid @enderror" placeholder="Masukan Deskripsi Kategori...">{{ $edit->description }}</textarea>
              <div class="invalid-feedback">
                {{ $errors->first('description') }}
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-2 col-xl-2 mb-2">
            <button type="submit" class="btn btn-success btn-sm btn-block">
              Ubah Data
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

<script>
  $(document).ready(function () {
    $('#type').select2();
  });
</script>
@endsection