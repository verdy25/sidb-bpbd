@extends('layouts.master')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
  @if ($errors->any())
  <div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Barang</h6>
    </div>
    <div class="card-body">
      <form action="{{route('barang.update', $barang->id)}}" method="POST">
        @csrf
        @method('put')
        <div class="form-group row">
          <label for="barang" class="col-sm-2 col-form-label">Barang</label>
          <div class="col-sm-10">
            <input type="text" name="barang" class="form-control" id="barang" value="{{$barang->nama}}">
          </div>
        </div>
        <div class="form-group row">
          <label for="harga_pokok" class="col-sm-2 col-form-label">Harga pokok</label>
          <div class="col-sm-10">
            <input type="text" name="harga_pokok" class="form-control" id="harga_pokok"
              value="{{$barang->harga_pokok}}">
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
    </div>
  </div>
</div>
@endsection