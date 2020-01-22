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
    <form action="{{route('bpbg.update', $pengeluaran->id)}}" method="POST">
        @csrf
        @method('put')
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Form bukti pengambilan barang dari gudang</h6>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="nomor">Nomor Bukti Pengambilan Barang dari Gudang</label>
                    <input type="text" class="form-control" id="nomor" name="nomor"
                        value="{{ $pengeluaran->nomor_ambil }}">
                </div>
                <div class="form-group">
                    <label for="kepada">Yang Menyerahkan</label>
                    <select name="pejabat" id="pejabat" class="form-control">
                        @if ($pengeluaran->penyerah_user == null)
                        <option></option>
                        @else
                        <option value="{{$pengeluaran->penyerah_user }}"> {{$pengeluaran->penyerah->nama}}</option>
                        @endif
                        @foreach ($pejabats as $item)
                        @if ($pengeluaran->penyerah_user != $item->id)
                        <option value="{{$item->id}}">{{$item->nama}}</option>
                        @endif
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