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

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Tabel Nota</h6>
      <a class="btn btn-primary btn-sm" href="{{route('nota.create')}}"><i class="fas fa-plus"></i>
        Nota</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size:14px">
          <thead>
            <tr>
              <th>Tanggal</th>
              <th>Nomor Nota</th>
              <th>Nama PT/CV</th>
              <th>Program</th>
              <th>Penanda Tangan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($notas as $nota)
            <tr>
              <td>{{date('d F Y', strtotime($nota->created_at))}}</td>
              <td>{{$nota->no_nota}}</td>
              <td><a href="" data-target="#pihak_ketiga" data-toggle="modal">{{$nota->pihak_ketiga}}
                </a></td>
              <td><a href="" data-target="#program" data-toggle="modal">{{$nota->program}}
                </a></td>
              <td>{{$nota->penanda_tangan}}</td>
              <td><a href="{{route('nota.show', $nota->id)}}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                @if (Auth::user()->status != "bidang")
                <form action="{{route('nota.destroy', $nota->id)}}" method="POST" class="d-inline">
                  @csrf
                  @method('delete')
                  <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                </form>  
                @endif
              </td>
              <!-- Modal -->
              <div class="modal fade" id="pihak_ketiga" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Detail {{$nota->pihak_ketiga}}</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="form-row">
                        <div class="form-group col-md-12">
                          <label for="nama_perwakilan">Nama :</label>
                          <input type="text" class="form-control-plaintext" id="nama_perwakilan"
                            value="{{$nota->nama_perwakilan}}" readonly>
                        </div>
                        <div class="form-group col-md-12">
                          <label for="jabatan">Jabatan :</label>
                          <input type="text" class="form-control-plaintext" readonly id="jabatan"
                            value="{{$nota->jabatan_perwakilan}}">
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Modal Program -->
              <div class="modal fade" id="program" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Detail Program {{$nota->program}}</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="form-row">
                        <div class="form-group col">
                          <input type="text" class="form-control-plaintext" value=" Kegiatan : {{$nota->kegiatan}}">
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
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