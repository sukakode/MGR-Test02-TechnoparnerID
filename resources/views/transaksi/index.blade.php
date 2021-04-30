@extends('layouts.master')

@section('content')
<div class="col-12">
  <div class="card">
    <div class="card-header">
      <b>Data Transaksi</b>
      <span class="float-right">
        <a href="{{ route('transaksi.create') }}" class="btn btn-sm btn-success">Tambah Data Transaksi</a>
      </span>

      <div class="row mt-2">
        <div class="col-12">
          <h6>
            Saring Data Berdasarkan Tanggal : 
          </h6>
        </div>
        <div class="col-12">
          <form action="{{ route('transaksi.index') }}" method="get">
            <div class="row p-0">
              <div class="col-lg-4 col-xl-4">
                <div class="form-group m-0">
                  <label for="">Tanggal Mulai : </label>
                  <input type="date" name="start" id="start" class="form-control form-control-sm" required>
                </div>
              </div>
              <div class="col-lg-4 col-xl-4">
                <div class="form-group m-0">
                  <label for="">Sampai Tanggal : </label>
                  <input type="date" name="end" id="end" class="form-control form-control-sm" required>
                </div>
              </div>
              <div class="col-lg-2 col-xl-2">
                <label for="">&ensp;</label>
                <button type="submit" class="btn btn-block btn-primary btn-sm">Saring Data</button>
              </div>
              <div class="col-lg-2 col-xl-2">
                <label for="">&ensp;</label>
                @if (isset($_GET['start']) && isset($_GET['end']))
                <a href="{{ route('transaksi.index') }}" class="btn btn-block btn-danger btn-sm">Reset</a>
                @else
                <button type="reset" class="btn btn-block btn-danger btn-sm">Reset</button>
                @endif
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="card-body p-0">
      <h6 class="text-center p-2">Data Transaksi Pemasukan - Pengeluaran : Bulan {{ isset($_GET['start']) && isset($_GET['end']) ? $_GET['start'] . ' - ' . $_GET['end']:date('F-Y') }}</h6>
      <div class="table-responsive">
        <table class="table table-bordered m-0">
          <thead>
            <tr>
              <th width="5%" class="text-center">No.</th>
              <th>Jenis</th>
              <th>Kategori</th>
              <th>Nominal</th>
              <th>Deskripsi</th>
              <th class="text-center" width="15%">Tanggal Buat</th>
              <th width="15%" class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @php
              $total = 0;
            @endphp
            @forelse ($transactions as $item)
              @php
                $item->type ? $total += $item->nominal : $total -= $item->nominal;
              @endphp
              <tr>
                <td class="text-center">{{ $loop->iteration }}.</td>
                <td>{{ $item->type ? 'Pemasukan':'Pengeluaran' }}</td>
                <td>{{ $item->category->name }}</td>
                <td>Rp. {{ !$item->type ? '-':''  }} {{ number_format($item->nominal, 0, ',', '.') }}</td>
                <td>{{ $item->description != null ? $item->description:'Tidak Ada Deskripsi' }}</td>
                <td class="text-center">{{ date('d/m/y H:i:s', strtotime($item->created_at)) }}</td>
                <td class="text-center">
                  <div class="btn-group">
                    <form action="{{ route('transaksi.destroy', $item->id) }}" method="post">
                      @csrf
                      @method('DELETE')

                      <a href="{{ route('transaksi.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                      <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="7" class="text-center">
                  Belum Ada Data Transaksi
                </td>
              </tr>
            @endforelse
          </tbody>
          <tfoot>
            <tr>
              <td colspan="3" class="text-right">Total : </td>
              <td colspan="4">Rp. {{ number_format($total, 0, ',', '.') }}</td>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
    <div class="card-footer text-right p-2">
      
      <small>{{ env('APP_NAME') }}</small>
    </div>
  </div>
</div>
@endsection