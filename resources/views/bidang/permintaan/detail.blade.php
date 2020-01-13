@extends('layouts.master')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Formulir permintaan barang</h6>
    </div>
    <div class="card-body">
      <div class="form-group row">
        <label for="user" class="col-sm-3 col-form-label">Bidang</label>
        <div class="col-sm-9">
          <input type="text" readonly class="form-control-plaintext" id="user" value=": {{$permintaan->user->name}}">
        </div>
      </div>
      <div class="form-group row">
        <label for="barang" class="col-sm-3 col-form-label">Barang</label>
        <div class="col-sm-9">
          <input type="text" readonly name="barang" class="form-control-plaintext" id="barang"
            value=": {{$permintaan->barang->nama}}">
        </div>
      </div>
      <div class="form-group row">
        <label for="jumlah" class="col-sm-3 col-form-label">Jumlah</label>
        <div class="col-sm-9">
          <input type="text" readonly class="form-control-plaintext" id="jumlah"
            value=": {{$permintaan->jumlah_minta}} {{$permintaan->barang->satuan}}">
        </div>
      </div>
      <div class="form-group row">
        <label for="jumlah_ambil" class="col-sm-3 col-form-label">Jumlah yang bisa diambil</label>
        <div class="col-sm-9">
          <input type="text" readonly class="form-control-plaintext" id="jumlah_ambil"
            value=": {{$permintaan->jumlah_ambil}} {{$permintaan->barang->satuan}}">
        </div>
      </div>
      <div class="form-group row">
        <label for="status" class="col-sm-3 col-form-label">Keterangan</label>
        <div class="col-sm-9">
          <input type="text" readonly class="form-control-plaintext" id="status"
            value=": {{$permintaan->status}}">
        </div>
      </div>
      <div class="form-group row">
        <label for="jumlah" class="col-sm-3 col-form-label">Keterangan</label>
        <div class="col-sm-9">
          <input type="text" readonly class="form-control-plaintext" id="keterangan"
            value=": {{$permintaan->keterangan}}">
        </div>
      </div>
    </div>
  </div>
</div>
@endsection