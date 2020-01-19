@extends('layouts.master')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- DataTales Example -->
  @if ($message = Session::get('success'))
  <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
  </div>
  @endif
  @if ($message = Session::get('fail'))
  <div class="alert alert-danger alert-block">
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
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Merubah Persetujuan</h6>
      {{-- <a class="btn btn-primary btn-sm" href="{{route('cetak.pengajuan', $nota->id)}}"><i class="fas fa-print"></i>
      Cetak</a> --}}
    </div>
    <div class="card-body">
      <form action="{{route('persetujuan.update', $pengeluaran->id)}}" method="POST">
        @csrf
        @method('put')
        <input type="text" hidden value="{{$pengeluaran->id}}" name="id">
        <table>
          <tr>
            <td>Kepada </td>
            <td> : {{$pengeluaran->permintaan->kepada}}</td>
          </tr>
          <tr>
            <td>Pemohon </td>
            <td> : {{$pengeluaran->permintaan->pemohon}}</td>
          </tr>
          <tr>
            <td>Tanggal </td>
            <td> : {{date('d F Y', strtotime($pengeluaran->created_at))}}</td>
          </tr>
          <tr>
            <td>Nomor Permintaan </td>
            <td> : {{$pengeluaran->permintaan->nomor}}</td>
          </tr>
          <tr>
            <td>Perihal </td>
            <td> : {{$pengeluaran->permintaan->perihal}}</td>
          </tr>
        </table>
        <br>
        <div class="table-responsive">
          <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Barang</th>
                <th>Jumlah (permintaan)</th>
                <th>Stok</th>
                <th>Jumlah (disetujui)</th>
                <th>Satuan</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($detail_pengeluaran as $key => $detail)
              <tr>
                <td>{{$key+1}}</td>
                <td>{{$detail->barang->nama}} {{$detail->barang->merk}}</td>
                <td>{{$detail->pengeluaran->permintaan->detail[$key]->jumlah}}</td>
                <td>{{$detail->barang->stok}}</td>
                <td><input type="text" class="form-control" name="jumlah[]" value="{{$detail->jumlah}}">
                  <input type="text" class="form-control" name="barang[]" value="{{$detail->id_barang}}" hidden>
                </td>
                <td>{{$detail->barang->satuan}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <button type="submit" class="btn btn-primary">Ubah persetujuan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
@endsection