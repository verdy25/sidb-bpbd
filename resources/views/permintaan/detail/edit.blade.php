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
    <form action="{{route('persetujuan.update', $permintaan->id)}}" method="POST">
        @csrf
        @method('put')
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Form Permintaan</h6>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="kepada">Kepada</label>
                        <select class="custom-select" id="kepada" name="kepada">
                            <option value="{{$permintaan->kepada}}">{{$permintaan->kepada_user->nama}}</option>
                            @foreach ($pejabat as $p)
                            @if ($permintaan->kepada != $p->id)
                            <option value="{{$p->id}}">{{$p->nama}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="pemohon">Pemohon</label>
                        <select class="custom-select" id="pemohon" name="pemohon">
                            <option value="{{$permintaan->pemohon}}">{{$permintaan->pemohon_user->nama}}</option>
                            @foreach ($pejabat as $p)
                            @if ($permintaan->kepada != $p->id)
                            <option value="{{$p->id}}">{{$p->nama}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nomor">Nomor Surat</label>
                        <input type="text" class="form-control" id="nomor" name="nomor"
                            value="{{ $permintaan->nomor }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="tanggal">Tanggal Permintaan</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <button onclick="setDate()" type="button" class="btn btn-primary"><i
                                        class="fas fa-calendar-day"></i></button>
                            </div>
                            <input type="date" class="form-control" id="tanggal" name="tanggal"
                                value="{{ date('Y-m-d', strtotime($permintaan->created_at)) }}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Perihal">Perihal</label>
                    <input type="text" class="form-control" id="perihal" name="perihal"
                        value="{{ $permintaan->perihal }}">
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tambah barang</h6>
            </div>
            <div class="card-body">
                @foreach ($detail_permintaan as $item)
                @if ($loop->first)
                <div class="input-group increment mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="">Barang</span>
                    </div>
                    <select class="custom-select" id="barang" name="barang[]">
                        <option value="{{$item->id_barang}}">{{$item->barang->nama}} {{$item->barang->merk}}
                            {{$item->barang->spesifikasi}}</option>
                        @foreach ($barang as $b)
                        @if ($item->id_barang != $b->id)
                        <option value="{{$b->id}}">{{$b->nama}} {{$b->merk}} {{$b->spesifikasi}}</option>
                        @endif
                        @endforeach
                    </select>
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="">volume</span>
                    </div>
                    <input type="text" class="form-control" name="volume[]" value="{{$item->jumlah}}">
                    <div class="input-group-append">
                        <button class="btn btn-primary btn-add" type="button"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
                @else
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="">Barang</span>
                    </div>
                    <select class="custom-select" id="barang" name="barang[]">
                        <option value="{{$item->id_barang}}">{{$item->barang->nama}} {{$item->barang->merk}}
                            {{$item->barang->spesifikasi}}</option>
                        @foreach ($barang as $b)
                        @if ($item->id_barang != $b->id)
                        <option value="{{$b->id}}">{{$b->nama}} {{$b->merk}} {{$b->spesifikasi}}</option>
                        @endif
                        @endforeach
                    </select>
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="">volume</span>
                    </div>
                    <input type="text" class="form-control" name="volume[]" value="{{$item->jumlah}}">
                    <div class="input-group-append">
                        <button class="btn btn-danger" type="button"><i class="fas fa-minus"></i></button>
                    </div>
                </div>
                @endif
                @endforeach
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="clone d-none">
    <div class="input-group mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text" id="">Barang</span>
        </div>
        <select class="custom-select" id="barang" name="barang[]">
            <option></option>
            @foreach ($barang as $s)
            <option value="{{$s->id}}">{{$s->nama}} {{$s->merk}} {{$s->spesifikasi}}</option>
            @endforeach
        </select>
        <div class="input-group-prepend">
            <span class="input-group-text" id="">volume</span>
        </div>
        <input type="text" class="form-control" name="volume[]">

        <div class="input-group-append">
            <button class="btn btn-danger" type="button"><i class="fas fa-minus"></i></button>
        </div>
    </div>
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