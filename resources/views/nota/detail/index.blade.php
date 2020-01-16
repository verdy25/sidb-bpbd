@extends('layouts.master')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Nota #{{$nota->id}} -
        {{date('d F Y', strtotime($nota->created_at))}}</h6>
        <a class="btn btn-primary btn-sm" href="{{route('cetak.pengajuan', $nota->id)}}"><i class="fas fa-print"></i>
          Cetak</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Barang</th>
              <th>Merk</th>
              <th>Volume</th>
              <th>Satuan</th>
              <th>Harga Satuan (Rp)</th>
              <th>Jumlah (Rp)</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($details as $key => $detail)
            <tr>
              <td>{{$key+1}}</td>
              <td>{{$detail->barang->nama}}</td>
              <td>{{$detail->barang->spesifikasi}}</td>
              <td>{{$detail->volume}}</td>
              <td>{{$detail->barang->satuan}}</td>
              <td class="text-right">{{$detail->harga}}</td>
              <td class="text-right">{{$jumlah[$key]}}</td>
              {{-- <td><a href="{{route('detail.nota.edit', $detail->id)}}"><i class="fas fa-edit"></i></a>
                <i href="{{route('nota.destroy', $detail->id)}}"><i class="fas fa-edit"></i></i>
              </td> --}}
            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <td class="text-right" colspan="6"><strong>Total</strong></td>
            <td class="text-right">@currency($total)</td>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
@endsection