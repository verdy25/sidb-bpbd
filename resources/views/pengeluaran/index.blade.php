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
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Data Pengeluaran</h6>
      <div class="btn-group" role="group" aria-label="Button add data">
        {{-- <a href="{{route('permintaan.create')}}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>
          Permintaan</a> --}}
      </div>

    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size:14px">
          <thead>
            <tr>
              <th>No</th>
              <th>Nota Permintaan</th>
              <th>Surat Perintah Pengeluaran</th>
              <th>Bukti Pengambilan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($pengeluarans as $p)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td><a href="{{route('permintaan.show',$p->permintaan->id)}}">{{$p->permintaan->nomor}}</a></td>
              <td>
                @if ($p->nomor_keluar == null)
                Belum keluar
                @else
                <a href="{{route('sppb.edit', $p->id)}}">{{$p->nomor_keluar}}</a>
                @endif
              </td>
              <td>
                @if ($p->nomor_ambil == null)
                Belum keluar
                @else
                <a href="{{route('bpbg.edit', $p->id)}}">{{$p->nomor_ambil}}</a>
                @endif
              </td>
              <td>
                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                  <div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Buat
                    </button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                      @if ($p->nomor_keluar == null)
                      <a class="dropdown-item" href="{{route('sppb.create', $p->id)}}">SPPB</a>
                      @endif
                      @if ($p->nomor_ambil == null)
                      <a class="dropdown-item" href="{{route('bpbg.create', $p->id)}}">BPBG</a>
                      @endif
                    </div>
                  </div>
                
                  <div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-sm btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Cetak
                    </button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                      @if ($p->nomor_keluar != null)
                      <a class="dropdown-item" href="{{route('cetak.sppb', $p->id)}}" target="_blank" >SPPB</a>
                      @endif
                      @if ($p->nomor_ambil != null)
                      <a class="dropdown-item" href="{{route('cetak.bpbg', $p->id)}}" target="_blank" >BPBG</a>
                      @endif
                    </div>
                  </div>
                </div>
                {{-- <form action="{{route('permintaan.destroy', $permintaan->id)}}" method="POST" class="d-inline">
                  @csrf
                  @method('delete')
                  <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                </form> --}}
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