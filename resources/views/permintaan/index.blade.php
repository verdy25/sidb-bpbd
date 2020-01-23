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
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Permintaan</h6>
      <div class="btn-group" role="group" aria-label="Button add data">
        <a href="{{route('permintaan.create')}}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>
          Permintaan</a>
      </div>

    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 14px">
          <thead>
            <tr>
              <th>No</th>
              <th>Bidang</th>
              <th>Pemohon</th>
              {{-- <th>Kepada</th> --}}
              <th>Nomor permintaan</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($permintaans as $permintaan)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$permintaan->pemohon_user->bidang->nama}}</td>
              <td>{{$permintaan->pemohon_user->nama}}</td>
              {{-- <td>{{$permintaan->kepada_user->nama}}</td> --}}
              <td>{{$permintaan->nomor}}</td>
              <td>{{$permintaan->status}}</td>
              <td>
                <a href="{{route('permintaan.show',$permintaan->id)}}" class="btn btn-primary btn-sm"><i
                    class="fas fa-eye"></i></a>
                @if ($permintaan->status == "Belum disetujui" && Auth::user()->status != "bidang")
                <a href="{{route('permintaan.ubah',$permintaan->id)}}" class="btn btn-primary btn-sm"><i
                    class="fas fa-edit"></i></a>
                <form action="{{route('permintaan.destroy', $permintaan->id)}}" method="POST" class="d-inline">
                  @csrf
                  @method('delete')
                  <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                </form>
                @endif
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