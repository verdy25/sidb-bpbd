@extends('layouts.master')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
  @if ($errors->has('file'))
  <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('file') }}</strong>
  </span>
  @endif

  @if ($message = Session::get('success'))
  <div class="alert alert-success alert-block">
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
      <h6 class="m-0 font-weight-bold text-primary">Standar Satuan Harga Belanja</h6>
      <div class="btn-group" role="group" aria-label="Button add data">
        {{-- <button class="btn btn-primary btn-sm" data-target="#add" data-toggle="modal"><i class="fas fa-plus"></i>
          Barang</button> --}}
      </div>

    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Kode barang</th>
              <th>Nama barang</th>
              <th>Merk</th>
              <th>Spesifikasi</th>
              <th>Stok</th>
              <th>Satuan</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

<script src="http://code.jquery.com/jquery.js"></script>
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script>
  $(function() {
      $('#dataTable').DataTable({
          processing: true,
          serverSide: true,
          ajax: '{!! route('gudang.data') !!}',
          columns: [
              { data: 'kode', name: 'kode' },
              { data: 'nama', name: 'nama' },
              { data: 'merk', name: 'merk' },
              { data: 'spesifikasi', name: 'spesifikasi' },
              { data: 'stok', name: 'stok' },
              { data: 'satuan', name: 'satuan'}
          ]
      });
  });
</script>
@endsection