@extends('layouts.master')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
  @if ($message = Session::get('success'))
  <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
  </div>
  @endif
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Penerimaan barang</h6>
      <button class="btn btn-primary btn-sm" data-target="#tambah_barang" data-toggle="modal"><i class="fas fa-plus"></i>
        Barang</button>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Nama barang</th>
              <th>Harga pokok</th>
              <th>Jumlah</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($barangs as $barang)
            <tr>
              <td>{{$barang->nama}}</td>
              <td>@currency($barang->harga_pokok)</td>
              <td>{{$barang->stok}} {{$barang->satuan}}</td>
              <td><a href="{{route('barang.edit', $barang->id)}}"><i class="fas fa-edit"></i></a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

<!-- Modal -->
<div class="modal fade" id="tambah_barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('barang.store')}}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="nama_barang">Nama barang</label>
            <input type="text" name="nama_barang" id="nama_barang"
              class="form-control @error('nama_barang') is-invalid @enderror" placeholder="Masukkan nama barang">
            @error('nama_barang')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="harga_pokok">Harga pokok</label>
            <input type="text" name="harga_pokok" id="harga_pokok"
              class="form-control @error('harga_pokok') is-invalid @enderror" placeholder="Masukkan harga pokok">
            @error('harga_pokok')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="satuan">Satuan</label>
            <select name="satuan" id="satuan" class="form-control">
              @foreach ($satuans as $satuan)
              <option value="{{ $satuan }}">{{ $satuan }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Tambah barang</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection