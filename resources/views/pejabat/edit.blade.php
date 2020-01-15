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
      <h6 class="m-0 font-weight-bold text-primary">Merubah data pejabat barang</h6>
    </div>
    <div class="card-body">
      <form action="{{route('pejabat.update', $pejabat->id)}}" method="POST">
        @csrf
        @method('put')
        <div class="form-group row">
          <label for="nip" class="col-sm-2 col-form-label">NIP</label>
          <div class="col-sm-10">
            <input type="text" name="nip" class="form-control" id="nip"
              value="{{$pejabat->nip}}">
          </div>
        </div>
        <div class="form-group row">
          <label for="nama" class="col-sm-2 col-form-label">Nama</label>
          <div class="col-sm-10">
            <input type="text" name="nama" class="form-control" id="nama" value="{{$pejabat->nama}}">
          </div>
        </div>
        <div class="form-group row">
          <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
          <div class="col-sm-10">
            <input type="text" name="jabatan" class="form-control" id="jabatan" value="{{$pejabat->jabatan}}">
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
    </div>
  </div>
</div>
@endsection