@extends('layouts.master')
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<meta name="csrf-token" content="{{ csrf_token() }}">
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
    <form action="{{route('nota.store')}}" method="POST">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Form nota pengiriman</h6>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="no_nota">Nomor Nota</label>
                        <input type="text" class="form-control" id="no_nota" name="no_nota"
                            value="{{ old('no_nota') }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="tanggal">Tanggal Nota</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <button onclick="setDate()" type="button" class="btn btn-primary"><i
                                        class="fas fa-calendar-day"></i></button>
                            </div>
                            <input type="date" class="form-control" id="tanggal" name="tanggal"
                                value="{{ old('tanggal') }}">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="pihak_ketiga">Nama PT / CV</label>
                        <input type="text" class="form-control" id="pihak_ketiga" name="pihak_ketiga"
                            value="{{ old('pihak_ketiga') }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="nama_perwakilan">Nama Perwakilan</label>
                        <input type="text" class="form-control" id="nama_perwakilan" name="nama_perwakilan"
                            value="{{ old('nama_perwakilan') }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="jabatan_perwakilan">Jabatan Perwakilan</label>
                        <input type="text" class="form-control" id="jabatan_perwakilan" name="jabatan_perwakilan"
                            value="{{ old('jabatan_perwakilan') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="program">Program</label>
                    <input type="text" class="form-control" id="program" name="program" value="{{ old('program') }}">
                </div>
                <div class="form-group">
                    <label for="kegiatan">Kegiatan</label>
                    <textarea type="text" class="form-control" id="kegiatan" name="kegiatan"
                        value="{{ old('kegiatan') }}"></textarea>
                </div>
                <div class="form-group">
                    <label for="penanda_tangan">Penanda Tangan</label>
                    <select class="custom-select" id="penanda_tangan" name="penanda_tangan">
                        <option></option>
                        @foreach ($pejabat as $p)
                        <option value="{{$p->id}}">{{$p->nama}}</option>
                        @endforeach
                    </select>
                </div>

            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tambah barang</h6>
            </div>
            <div class="card-body">
                <div class="input-group increment mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="">Barang</span>
                    </div>
                    {{-- <select class="custom-select cari" name="barang[]"></select> --}}
                    <select class="custom-select" id="barang" name="barang[]">
                        <option></option>
                        @foreach ($shb as $s)
                        <option value="{{$s->id}}">{{$s->nama_barang}} - {{$s->spesifikasi}}</option>
                    @endforeach
                    </select>
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="">Merk</span>
                    </div>
                    <input type="text" class="form-control" name="merk[]">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="">vol</span>
                    </div>
                    <input type="text" class="form-control" name="volume[]">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="">harga</span>
                    </div>
                    <input type="text" class="form-control" name="harga[]">
                    <div class="input-group-append">
                        <button class="btn btn-primary btn-add" type="button"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
                <div class="clone d-none">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="">Barang</span>
                        </div>
                        {{-- <select class="custom-select cari" name="barang[]"></select> --}}
                        <select class="custom-select" id="barang" name="barang[]">
                            <option></option>
                            @foreach ($shb as $s)
                            <option value="{{$s->id}}">{{$s->nama_barang}} - {{$s->spesifikasi}}</option>
                        @endforeach
                        </select>
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="">Merk</span>
                        </div>
                        <input type="text" class="form-control" name="merk[]">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="">vol</span>
                        </div>
                        <input type="text" class="form-control" name="volume[]">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="">harga</span>
                        </div>
                        <input type="text" class="form-control" name="harga[]">
                        <div class="input-group-append">
                            <button class="btn btn-danger btn-remove" type="button"><i
                                    class="fas fa-minus"></i></button>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
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

      $("body").on("click",".btn-remove",function(){ 
          $(this).parents(".input-group").remove();
      });
</script>
{{-- <script type="text/javascript">
    $('.cari').select2({
      placeholder: 'Pilih barang',
      ajax: {
        url: "{{route('cari.shb')}}",
        dataType: 'json',
        delay: 250,
        processResults: function (data) {
            return {
              results:  $.map(data, function (item) {
                    return {
                        text: item.nama_barang,
                        id: item.id
                    }
                })
            };
          },
        cache: true
      }
    });
  
</script> --}}

@endsection