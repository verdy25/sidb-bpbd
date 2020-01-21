@extends('layouts.master')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-12 col-md-12 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Halo, {{Auth::user()->name}}</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">Selamat datang di sistem informasi pendistribusian barang<br>Badan Penanggulangan Bencana Daerah Kabupaten Banyuwangi</div>
            </div>
            <div class="col-auto">
              {{-- <i class="fas fa-calendar fa-2x text-gray-300"></i> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
 @endsection