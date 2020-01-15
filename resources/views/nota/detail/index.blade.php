@extends('layouts.master')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Nota #{{$nota->id}} -
        {{date('d F Y', strtotime($nota->created_at))}}</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Barang</th>
              <th>Jumlah</th>
              <th>Harga</th>
              {{-- <th>Aksi</th> --}}
            </tr>
          </thead>
          <tbody>
            @foreach ($details as $detail)
            <tr>
              <td>{{$detail->barang->nama}}</td>
              <td>{{$detail->jumlah}}</td>
              <td class="text-right">@currency($detail->harga)</td>
              {{-- <td><a href="{{route('detail.nota.edit', $detail->id)}}"><i class="fas fa-edit"></i></a>
                <i href="{{route('nota.destroy', $detail->id)}}"><i class="fas fa-edit"></i></i>
              </td> --}}
            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <td></td>
            <td class="text-right"><strong>Total</strong></td>
            <td class="text-right">@currency($total)</td>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
@endsection