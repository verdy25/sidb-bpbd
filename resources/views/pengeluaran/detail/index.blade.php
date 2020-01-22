@extends('layouts.master')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Nota #{{$permintaan->id}} -
        {{date('d F Y', strtotime($permintaan->created_at))}}</h6>
      <a class="btn btn-primary btn-sm" href="{{route('cetak.pengajuan', $permintaan->id)}}"><i
          class="fas fa-print"></i>
        Cetak</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Kepada</th>
              <td>{{$permintaan->kepada}}</td>
            </tr>
            <tr>
              <th>Pemohon</th>
              <td>{{$permintaan->pemohon}}</td>
            </tr>
            <tr>
              <th>Nomor</th>
              <td>{{$permintaan->nomor}}</td>
            </tr>
            <tr>
              <th>Perihal</th>
              <td>{{$permintaan->perihal}}</td>
            </tr>
            <tr>
              <th>barang</th>
              <td>

                @foreach ($detail_permintaan as $d)
                -{{$d->barang->nama}} (volume : {{$d->jumlah}})<br>
                @endforeach

              </td>
            </tr>

          </thead>


          {{-- <td><a href="{{route('detail.nota.edit', $detail->id)}}"><i class="fas fa-edit"></i></a>
          <i href="{{route('nota.destroy', $detail->id)}}"><i class="fas fa-edit"></i></i>
          </td> --}}
          </tr>
          </tbody>
          <tfoot>


          </tfoot>
        </table>

        <table>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
@endsection