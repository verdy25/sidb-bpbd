@extends('layouts.master')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
  @if ($message = Session::get('success'))
  <div class="alert alert-success">
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
      <h6 class="m-0 font-weight-bold text-primary">Pejabat barang</h6>
      @if (Auth::user()->status != "bidang")
      <button class="btn btn-primary btn-sm" data-target="#tambah_barang" data-toggle="modal"><i
          class="fas fa-plus"></i>
        Pejabat</button>
      @endif
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size:14px">
          <thead>
            <tr>
              <th>NIP</th>
              <th>Nama</th>
              <th>Jabatan</th>
              @if (Auth::user()->status != "bidang")
              <th>Edit</th>
              <th>Hapus</th>
              @endif
            </tr>
          </thead>
          <tbody>
            @foreach ($pejabats as $pejabat)
            <tr>
              <td>{{$pejabat->nip}}</td>
              <td>{{$pejabat->nama}}</td>
              <td>{{$pejabat->jabatan}}</td>
              @if (Auth::user()->status != "bidang")
              <td>
                <a href="{{route('pejabat.edit', $pejabat->id)}}" class="btn btn-sm btn-primary" title="Ubah data"><i
                    class="fas fa-edit"></i></a>
              </td>
              <td>
                <form action="{{route('pejabat.destroy', $pejabat->id)}}" method="POST" class="d-inline">
                  @csrf
                  @method('delete')
                  <button class="btn btn-sm btn-danger" title="Hapus data" type="submit"><i
                      class="fas fa-trash"></i></button>
                </form>
              </td>
              @endif
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

<!-- Modal -->
<div class="modal fade" id="tambah_barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah pejabat barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('pejabat.store')}}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="nip">NIP</label>
            <input type="text" name="nip" id="nip" class="form-control" placeholder="Masukkan NIP">
          </div>
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama">
          </div>
          <div class="form-group">
            <label for="jabatan">Jabatan</label>
            <input type="text" name="jabatan" id="jabatan" class="form-control" placeholder="Masukkan jabatan">
          </div>
          <div class="form-group">
            <label for="bidang">Bidang</label>
            <select name="bidang" id="bidang" class="form-control">
              <option>Pilih bidang</option>
              @foreach ($bidangs as $item)
              @if ($item->id != 1)
              <option value="{{$item->id}}">{{$item->nama}}</option>
              @endif
              @endforeach
            </select>
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
@endsection