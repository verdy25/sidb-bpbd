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
      <form action="{{route('bidang.permintaan.store')}}" method="POST">
        @csrf
        <div class="form-group row">
          <label for="user" class="col-sm-2 col-form-label">Bidang</label>
          <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="user" value="xxx">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword" class="col-sm-2 col-form-label">Barang</label>
          <div class="col-sm-10">
            <select name="barang" id="barang" class="form-control">
              @foreach ($barangs as $barang)
              <option value="{{$barang->id}}">{{$barang->nama}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
          <div class="col-sm-10">
            <input type="number" name="jumlah" class="form-control" id="jumlah" value="xxx">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-2"></div>
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Ajukan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

@endsection