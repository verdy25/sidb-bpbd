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
      <h6 class="m-0 font-weight-bold text-primary">Permintaan</h6>
      <div class="btn-group" role="group" aria-label="Button add data">
        <button class="btn btn-info btn-sm" data-target="#import" data-toggle="modal"><i
            class="fas fa-file-upload"></i>
           Import</button>
        <a href="{{route('permintaan.create')}}" class="btn btn-primary btn-sm"><i
            class="fas fa-plus"></i>
          Permintaan</a>
      </div>

    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Pemohon</th>
              <th>Kepada</th>
              <th>Nomor</th>
              <th>Perihal</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($permintaans as $permintaan)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$permintaan->pemohon}}</td>
              <td>{{$permintaan->kepada}}</td>
              <td>{{$permintaan->nomor}}</td>
            <td>{{$permintaan->perihal}}</td>
            <td><a href="{{route('permintaan.show',$permintaan->id)}}"><i class="fas fa-edit"></i></a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

<!-- Modal Add -->
<!-- <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="kepada">Kepada</label>
            <input type="text" name="kepada" id="kepada" class="form-control" placeholder="Masukkan Nama">
          </div>
          <div class="form-group">
            <label for="pemohon">Pemohon</label>
            <input type="text" name="pemohon" id="pemohon" class="form-control" placeholder="Masukkan Nama Pemohon">
          </div>
          <div class="form-group">
            <label for="nomor">Nomor</label>
            <input type="text" name="nomor" id="nomor" class="form-control" placeholder="Masukkan Nomor Surat">
          </div>
          <div class="form-group">
            <label for="perihal">Perihal</label>
            <input type="text" name="perihal" id="perihal" class="form-control" placeholder="Masukkan Perihal">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div> -->

<!-- Modal Import -->
<!-- <div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Import barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      </div>
    </div>
  </div>
</div> -->
@endsection