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
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Detail Permintaan</h6>
      <div class="button-group">
        <a class="btn btn-primary btn-sm" href="{{route('cetak.permintaan', $permintaan->id)}}"><i
            class="fas fa-print"></i>
          Cetak</a>
        @if ($permintaan->status == 'Belum disetujui')
        <a href="{{route('permintaan.verif', $permintaan->id)}}" class="btn btn-sm btn-primary">Buat persetujuan</a>
        @endif
      </div>
    </div>
    <div class="card-body">
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
          <td>Nomor Permintaan </td>
          <td> : {{$permintaan->nomor}}</td>
        </tr>
        <tr>
          <td>Perihal </td>
          <td> : {{$permintaan->perihal}}</td>
        </tr>
      </table>
      <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Barang</th>
              <th>Jumlah</th>
              <th>Satuan</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($detail_permintaan as $key => $detail)
            <tr>
              <td>{{$key+1}}</td>
              <td>{{$detail->barang->nama}} {{$detail->barang->merk}}</td>
              <td>{{$detail->jumlah}}</td>
              <td>{{$detail->barang->satuan}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>


  @if ($permintaan->status != 'Belum disetujui')
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Persetujuan</h6>
      @if ($permintaan->status != 'Barang telah diambil')
      <a class="btn btn-primary btn-sm" href="{{route('persetujuan.edit', $permintaan->pengeluaran->id)}}"><i
          class="fas fa-edit"></i>
        Ubah persetujuan</a>
      @endif
    </div>
    <div class="card-body">
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
          <td>Nomor Permintaan </td>
          <td> : {{$permintaan->nomor}}</td>
        </tr>
        <tr>
          <td>Perihal </td>
          <td> : {{$permintaan->perihal}}</td>
        </tr>
      </table>
      <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Barang</th>
              <th>Jumlah</th>
              <th>Satuan</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($detail_pengeluaran as $key => $detail)
            <tr>
              <td>{{$key+1}}</td>
              <td>{{$detail->barang->nama}} {{$detail->barang->merk}}</td>
              <td>{{$detail->jumlah}}</td>
              <td>{{$detail->barang->satuan}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="form-group">
          <label><b>Keterangan</b></label>
          <textarea rows="3" class="form-control-plaintext" disabled>{{$pengeluaran->keterangan}}</textarea>
        </div>
      </div>
    </div>
  </div>
  @endif
</div>
<!-- /.container-fluid -->
@endsection