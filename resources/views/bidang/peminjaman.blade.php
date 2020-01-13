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
      <h6 class="m-0 font-weight-bold text-primary">Formulir peminjaman barang</h6>
    </div>
    <div class="card-body">
      <form action="" method="POST">
        @csrf
        <div class="form-group row">
          <label for="user" class="col-sm-3 col-form-label">Bidang</label>
          <div class="col-sm-9">
            <input type="text" readonly class="form-control-plaintext" id="user" value="xxx">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword" class="col-sm-3 col-form-label">Barang</label>
          <div class="col-sm-9">
            <select name="barang" id="barang" class="form-control">
              @foreach ($barangs as $barang)
              <option value="{{$barang->id}}">{{$barang->nama}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="jumlah" class="col-sm-3 col-form-label">Jumlah</label>
          <div class="col-sm-9">
            <input type="number" name="jumlah" class="form-control" id="jumlah" value="xxx">
          </div>
        </div>
        <div class="form-group row">
          <label for="tanggal_pinjam" class="col-sm-3 col-form-label">Tanggal Pinjam</label>
          <div class="col-sm-9">
            <input type="date" name="tanggal_pinjam" class="form-control" id="tanggal_pinjam">
          </div>
        </div>
        <div class="form-group row">
          <label for="tanggal_pengembalian" class="col-sm-3 col-form-label">Tanggal Pengembalian</label>
          <div class="col-sm-9">
            <input type="date" name="tanggal_pengembalian" class="form-control" id="tanggal_pengembalian">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-3"></div>
          <div class="col-sm-9">
            <button type="submit" class="btn btn-primary">Ajukan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

@endsection