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
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Tanggal</th>
              <th>Bidang</th>
              <th>Nama barang</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($permintaans as $permintaan)
            <tr>
              <td>{{date('d F Y', strtotime($permintaan->created_at))}}</td>
              <td>{{$permintaan->user->name}}</td>
              <td>{{$permintaan->barang->nama}} ({{$permintaan->jumlah_minta}} {{$permintaan->barang->satuan}})</td>
              <td>{{$permintaan->status}}</td>
              <td>
                <div class="btn-group btn-group-toggle">
                  <label class="btn btn-success">
                    <a href="{{route('sekretaris.permintaan.show', $permintaan->id)}}"><i class="fas fa-check" style="color:white"></i></a>
                  </label>
                  <label class="btn btn-primary">
                    <a href=""><i class="fas fa-eye" style="color:white"></i></a>
                  </label>
                </div>
              </td>
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