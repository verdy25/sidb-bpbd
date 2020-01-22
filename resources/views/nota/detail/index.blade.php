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
      <h6 class="m-0 font-weight-bold text-primary">Nota #{{$nota->id}} -
        {{date('d F Y', strtotime($nota->created_at))}}</h6>
      <a class="btn btn-primary btn-sm" href="{{route('cetak.pengajuan', $nota->id)}}" target="_blank"><i class="fas fa-print"></i>
        Cetak</a>
    </div>
    <div class="card-body">
      <form class="row" action="{{route('nota.update', $nota->id)}}" method="POST">
        @csrf
        @method('put')
        <div class="form-group col-6">
          <label class="mr-sm-2" for="inlineFormCustomSelect">Penerima</label>
          <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="penerima">
            <option value="{{$nota->penanda_tangan}}">{{$nota->penerima->nama}}</option>
            @foreach ($pejabat as $item)
            @if ($item->id != $nota->penanda_tangan)
            <option value="{{$item->id}}">{{$item->nama}}</option>
            @endif
            @endforeach
          </select>
          <button type="submit" class="btn btn-primary mt-2">Ubah Penerima</button>
        </div>
      </form>
      <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0" style="font-size: 14px;">
          <thead>
            <tr>
              <th>No</th>
              <th>Barang</th>
              <th>Merk</th>
              <th>Spesifikasi</th>
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
              <td>{{$detail->barang->merk}}</td>
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
            <td class="text-right" colspan="7"><strong>Total</strong></td>
            <td class="text-right">@currency($total)</td>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
@endsection
