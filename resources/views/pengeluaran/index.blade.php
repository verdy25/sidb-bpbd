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
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Nomor Surat Perintah Pengeluaran</th>
              <th>Nomor Nota Permintaan</th>
              <th>Nomor Bukti Pengambilan</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($pengeluarans as $p)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>
                @if ($p->nomor_keluar == null)
                <button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add"><i
                    class="fas fa-edit"></i></button>
                <!-- Modal Add -->
                <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        {{-- <h5 class="modal-title" id="exampleModalLabel">Masukkan nomor surat perintah pengeluaran</h5> --}}
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="{{route('pengeluaran.update', $p->id)}}" method="POST">
                        @csrf
                        @method('put')
                        <div class="modal-body">
                          <div class="form-group">
                            <label for="nomor_keluar">Nomor surat perintah pengeluaran</label>
                            <input type="text" name="nomor_keluar" id="nomor_keluar" class="form-control">
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                @else
                {{$p->nomor_keluar}}
                @endif
              </td>
              <td>{{$p->permintaan->nomor}}</td>
              <td>
                @if ($p->nomor_ambil == null)
                <button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add"><i
                    class="fas fa-edit"></i></button>
                <!-- Modal Add -->
                <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        {{-- <h5 class="modal-title" id="exampleModalLabel">Masukkan nomor surat perintah pengeluaran</h5> --}}
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="{{route('pengeluaran.update', $p->id)}}" method="POST">
                        @csrf
                        @method('put')
                        <div class="modal-body">
                          <div class="form-group">
                            <label for="nomor_ambil">Nomor Bukti Pengambilan Barang dari Gudang</label>
                            <input type="text" name="nomor_ambil" id="nomor_ambil" class="form-control">
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                @else
                {{$p->nomor_ambil}}
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