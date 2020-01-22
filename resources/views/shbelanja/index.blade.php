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
        <button class="btn btn-primary btn-sm" data-target="#import" data-toggle="modal"><i class="fas fa-file-upload"></i>
          Import</button>
        {{-- <a class="btn btn-info btn-sm" href=""><i class="fas fa-question"></i>
          Panduan</a> --}}
      </div>

    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size:14px">
          <thead>
            <tr>
              <th>Kode barang</th>
              <th>Nama barang</th>
              <th>Spesifikasi</th>
              <th>Satuan</th>
              <th>Harga</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

<!-- Modal Import -->
<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form method="post" action="{{route('shb.import')}}" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
        </div>
        <div class="modal-body">
          @csrf
          <label>Pilih file excel</label>
          <div class="form-group">
            <input type="file" name="file" required="required">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Import</button>
        </div>
      </div>
    </form>
  </div>
</div>
<script src="http://code.jquery.com/jquery.js"></script>
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script>
  $(function() {
      $('#dataTable').DataTable({
          processing: true,
          serverSide: true,
          ajax: '{!! route('shb.data') !!}',
          columns: [
              { data: 'kode_barang', name: 'kode_barang' },
              { data: 'nama_barang', name: 'nama_barang' },
              { data: 'spesifikasi', name: 'spesifikasi' },
              { data: 'satuan', name: 'satuan' },
              { data: 'harga', name: 'harga'}
          ]
      });
  });
</script>
@endsection