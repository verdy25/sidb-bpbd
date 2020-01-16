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
      <h6 class="m-0 font-weight-bold text-primary">Formulir permintaan barang</h6>
    </div>
    <div class="card-body">
      <div class="form-group row">
        <label for="user" class="col-sm-2 col-form-label">Bidang</label>
        <div class="col-sm-10">
          <input type="text" readonly class="form-control-plaintext" id="user" value="{{$permintaan->user->name}}">
        </div>
      </div>
      <div class="form-group row">
        <label for="barang" class="col-sm-2 col-form-label">Barang</label>
        <div class="col-sm-10">
          <input type="text" readonly name="barang" class="form-control-plaintext" id="barang"
            value="{{$permintaan->barang->nama}}">
        </div>
      </div>
      <div class="form-group row">
        <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
        <div class="col-sm-10">
          <input type="text" readonly name="jumlah" class="form-control-plaintext" id="jumlah"
            value="{{$permintaan->jumlah_minta}} {{$permintaan->barang->satuan}}">
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Verifikasi</h6>
    </div>
    <div class="card-body">
      <form action="{{route('sekretaris.permintaan.update', $permintaan->id)}}" method="POST">
        @csrf
        @method('put')
        <div class="form-group row">
          <label for="status" class="col-sm-3 col-form-label">Status</label>
          <div class="col-sm-9">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="status" id="status1" value="ditolak">
              <label class="form-check-label" for="status">Tolak</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="status" id="status2" value="disetujui">
              <label class="form-check-label" for="status">Setujui</label>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="jumlah" class="col-sm-3 col-form-label">Jumlah yang bisa diambil</label>
          <div class="col-sm-9">
            <input type="number" name="jumlah" class="form-control" id="jumlah">
          </div>
        </div>
        <div class="form-group row">
          <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
          <div class="col-sm-9">
            <textarea type="text" name="keterangan" class="form-control" id="keterangan" rows="3"></textarea>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-3"></div>
          <div class="col-sm-9">
            <button type="submit" class="btn btn-success">Verifikasi</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection