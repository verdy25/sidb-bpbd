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
      <h6 class="m-0 font-weight-bold text-primary">Verifikasi permintaan</h6>
      {{-- <a class="btn btn-primary btn-sm" href="{{route('cetak.pengajuan', $nota->id)}}"><i class="fas fa-print"></i>
      Cetak</a> --}}
    </div>
    <div class="card-body">
      <form action="{{route('persetujuan.store', $permintaan->id)}}" method="POST">
        @csrf
        @method('put')
        <input type="text" hidden value="{{$permintaan->id}}" name="id">
        <table>
          <tr>
            <td>Kepada </td>
            <td> : {{$permintaan->kepada}}</td>
          </tr>
          <tr>
            <td>Pemohon </td>
            <td> : {{$permintaan->pemohon}}</td>
          </tr>
          <tr>
            <td>Tanggal </td>
            <td> : {{date('d F Y', strtotime($permintaan->created_at))}}</td>
          </tr>
          <tr>
            <td style="padding-right:20px;">Nomor Permintaan </td>
            <td> : {{$permintaan->nomor}}</td>
          </tr>
          <tr>
            <td>Perihal </td>
            <td> : {{$permintaan->perihal}}</td>
          </tr>
        </table>
        <br>
        <div class="table-responsive">
          <table class="table table-bordered text-center" width="100%" cellspacing="0">
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
              @foreach ($detail_permintaan as $key => $detail)
              <tr>
                <td class="align-middle">{{$key+1}}</td>
                <td class="align-middle">{{$detail->barang->nama}} {{$detail->barang->merk}}</td>
                <td class="align-middle">{{$detail->jumlah}}</td>
                <td class="align-middle">{{$detail->barang->stok}}</td>
                <td class="align-middle"><input type="text" class="form-control font-weight-bold" name="jumlah[]"
                    value="{{$detail->jumlah}}">
                  <input type="text" class="form-control" name="barang[]" value="{{$detail->id_barang}}" hidden>
                </td>
                <td class="align-middle">{{$detail->barang->satuan}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <div class="form-group">
            <label for="keterngan">Keterangan</label>
            <textarea name="keterangan" id="keterangan" rows="3" class="form-control"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Setujui</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
@endsection