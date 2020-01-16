@extends('layouts.master')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
  @if ($message = Session::get('success'))
  <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <p>{{ $message }}</p>
  </div>
  @endif
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Permintaan</h6>
      <a class="btn btn-primary btn-sm" href="{{route('bidang.permintaan.create')}}"><i class="fas fa-plus"></i>
        Pengajuan</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Tanggal</th>
              <th>Nama barang</th>
              <th>Jumlah</th>
              <th>Status</th>
              <th>Keterangan</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($permintaans as $key => $permintaan)
            <tr>
              <td>{{date('d F Y', strtotime($permintaan->created_at))}}</td>
              <td>{{$permintaan->barang->nama}}</td>
              <td>{{$permintaan->jumlah_minta}}</td>
              <td>{{$permintaan->status}}</td>
              <td><a class="btn btn-primary btn-sm" href="{{route('bidang.permintaan.show', $permintaan->id)}}">
                  <i class="fas fa-eye"></i></a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
@endsection