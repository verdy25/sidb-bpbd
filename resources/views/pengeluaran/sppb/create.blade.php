@extends('layouts.master')
@section('content')
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
    <form action="{{route('sppb.store', $pengeluaran->id)}}" method="POST">
        @csrf
        @method('put')
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Form surat perintah pengeluaran / penyaluran barang</h6>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="nomor">Nomor Surat Perintah Pengeluaran / Penyaluran Barang</label>
                    <input type="text" class="form-control" id="nomor" name="nomor" value="{{ old('nomor') }}">
                </div>
                <div class="form-group">
                    <label for="kepada">Kepada</label>
                    <input type="text" class="form-control" id="kepada" name="kepada" value="{{ old('kepada') }}">
                </div>
                <div class="form-group">
                    <label for="dari">Dari</label>
                    <input type="text" class="form-control" id="dari" name="dari" value="{{ old('dari') }}">
                </div>
                <div class="form-group">
                    <label for="penandatangan">Penanda tangan</label>
                    <select name="penandatangan" id="penandatangan" class="form-control">
                        <option></option>
                        @foreach ($pejabats as $item)
                        <option value="{{$item->id}}">{{$item->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
<script>
    $(".btn-add").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
      });

      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".input-group").remove();
      });
</script>


@endsection