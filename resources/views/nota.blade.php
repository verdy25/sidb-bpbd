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
      <h6 class="m-0 font-weight-bold text-primary">Tabel Nota</h6>
      <button class="btn btn-primary btn-sm" data-target="#tambah_nota" data-toggle="modal"><i class="fas fa-plus"></i>
        Nota</button>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Nomor Nota</th>
              <th>Tanggal</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($notas as $nota)
            <tr>
              <td>{{$nota->nota}}</td>
              <td>{{date('d F Y', strtotime($nota->created_at))}}</td>
              <td><a href="{{route('nota.show', $nota->id)}}" class="badge badge-primary"><i class="fas fa-eye"></i></a>
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

<!-- Modal -->
<div class="modal fade" id="tambah_nota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Nota</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('nota.store')}}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="tanggal">Nomor</label>
                <input type="text" class="form-control" name="nota" id="nota">
            </div>
            <div class="form-group col-md-8">
              <label for="tanggal">Tanggal</label>
              <div class="form-row">
                <input placeholder="masukkan tanggal" type="date" class="form-control col-md-6" name="tanggal"
                  id="tanggal">
                <button type="button" class="btn btn-primary ml-2" onclick="setDate()"><i
                    class="fas fa-calendar-day"></i></button>
              </div>
            </div>
          </div>
          <div id="dynamic_form">
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="barang">Barang</label>
                {{-- <input type="text" name="barang" id="barang" class="form-control"> --}}
                <select name="barang" id="barang" class="form-control">
                  @foreach ($barangs as $barang)
                  <option value="{{$barang->id}}">{{$barang->nama}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group col-md-2">
                <label for="jumlah">Volume</label>
                <input type="number" name="jumlah" id="jumlah" class="form-control">
              </div>
              <div class="form-group col-md-3">
                <label for="harga">Harga</label>
                <input type="number" name="harga" id="harga" class="form-control">
              </div>
              <div class="form-group button-group col-md-2 ml-2">
                <div class="row" style="position: absolute; bottom: 0;">
                  <a href="javascript:void(0)" class="btn btn-primary col-md-5 mr-2" id="plus"><i
                      class="fas fa-plus"></i></a>
                  <a href="javascript:void(0)" class="btn btn-danger col-md-5" id="minus"><i
                      class="fas fa-minus"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Tambah nota</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous">
</script>
<script src="{{asset('js/dynamic-form.js')}}"></script>
<script>
  var dynamic_form =  
  $("#dynamic_form").dynamicForm("#dynamic_form","#plus", "#minus", {
      limit:20,
      formPrefix : "dynamic_form",
      normalizeFullForm : false
  });

  $("#dynamic_form #minus").on('click', function(){
    var initDynamicId = $(this).closest('#dynamic_form').parent().find("[id^='dynamic_form']").length;
    if (initDynamicId === 2) {
      $(this).closest('#dynamic_form').next().find('#minus').hide();
    }
    $(this).closest('#dynamic_form').remove();
  });
</script>
<script>
  function setDate() {
    var date = new Date();
    var month = new Array();
    var i,j=1;
    for (i = 0; i < 12; i++) {
      month[i] = j;
      j = j +1;
    }
    var today = date.getFullYear()+"-"+"0"+month[date.getMonth()]+"-"+date.getDate();
    document.getElementById("tanggal").value = today;
  }
</script>
@endsection