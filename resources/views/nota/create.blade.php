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

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Tambah nota masuk</h6>
        </div>
        <div class="card-body">
            <form action="{{route('nota.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="no_nota">Nomor Nota</label>
                    <input type="text" class="form-control" id="no_nota" name="no_nota">
                </div>
                <div class="form-group">
                    <label for="pihak_ketiga">Nama PT / CV</label>
                    <input type="text" class="form-control" id="pihak_ketiga" name="pihak_ketiga">
                </div>
                <div class="form-group">
                    <label for="nama_perwakilan">Nama Perwakilan</label>
                    <input type="text" class="form-control" id="nama_perwakilan" name="nonama_perwakilan_nota">
                </div>
                <div class="form-group">
                    <label for="jabatan_perwakilan">Jabatan Perwakilan</label>
                    <input type="text" class="form-control" id="jabatan_perwakilan" name="jabatan_perwakilan">
                </div>
                <div class="form-group">
                    <label for="program">Program</label>
                    <input type="text" class="form-control" id="program" name="program">
                </div>
                <div class="form-group">
                    <label for="kegiatan">Kegiatan</label>
                    <textarea type="text" class="form-control" id="kegiatan" name="kegiatan"></textarea>
                </div>
                <div class="form-group">
                    <label for="penanda_tangan">Penanda Tangan</label>
                    <input type="text" class="form-control" id="penanda_tangan" name="penanda_tangan">
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal Nota</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <button onclick="setDate()" class="btn btn-primary"><i class="fas fa-calendar-day"></i></button>
                        </div>
                        <input type="text" class="form-control" id="tanggal" name="tanggal">
                    </div>
                    {{-- <div class="form-row">
                        <div class="col-11">
                            <input type="text" class="form-control" id="tanggal" name="tanggal">
                        </div>
                        <div class="col">
                            <button onclick="setDate()" class="btn btn-primary"><i
                                    class="fas fa-calendar-day"></i></button>
                        </div>
                    </div> --}}
                </div>
            </form>
        </div>
    </div>
</div>
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