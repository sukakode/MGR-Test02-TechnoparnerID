@extends('layouts.master')

@section('content')
<div class="col-12">
  <div class="card">
    <div class="card-header">
      Data Kategori
      <span class="float-right">
        <a href="{{ route('kategori.create') }}" class="btn btn-sm btn-success">Tambah Data Kategori</a>
      </span>
    </div>
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-bordered m-0">
          <thead>
            <tr>
              <th width="8%" class="text-center">No.</th>
              <th>Jenis</th>
              <th>Nama</th>
              <th>Deskripsi</th>
              <th width="15%" class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($categories as $item)
              <tr>
                <td class="text-center">{{ $loop->iteration }}.</td>
                <td>{{ $item->type ? 'Pemasukan':'Pengeluaran' }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->description != null ? $item->description:'Tidak Ada Deskripsi' }}</td>
                <td class="text-center">
                  <div class="btn-group">
                    <form action="{{ route('kategori.destroy', $item->id) }}" method="post">
                      @csrf
                      @method('DELETE')

                      <a href="{{ route('kategori.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                      <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="5" class="text-center">
                  Belum Ada Data Kategori
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
    <div class="card-footer text-right p-2">
      
      <small>{{ env('APP_NAME') }}</small>
    </div>
  </div>
</div>
@endsection