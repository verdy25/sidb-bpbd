<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
    <div class="sidebar-brand-text mx-3">SIDB</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="/">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{route('pejabat.index')}}">
      <i class="fas fa-fw fa-table"></i>
      <span>Pejabat</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{route('shb.index')}}">
      <i class="fas fa-fw fa-table"></i>
      <span>Standar Harga Belanja</span></a>
  </li>
  
  @if (Auth::user()->status != "bidang")
  <li class="nav-item">
    <a class="nav-link" href="{{route('nota.index')}}">
      <i class="fas fa-fw fa-table"></i>
      <span>Nota Pengiriman Barang</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{route('gudang')}}">
      <i class="fas fa-fw fa-table"></i>
      <span>Stok barang</span></a>
  </li>
  @endif

  <li class="nav-item">
    <a class="nav-link" href="{{route('permintaan.index')}}">
      <i class="fas fa-fw fa-table"></i>
      <span>Permintaan</span></a>
  </li>

  @if (Auth::user()->status != "bidang")
  <li class="nav-item">
    <a class="nav-link" href="{{route('pengeluaran.index')}}">
      <i class="fas fa-fw fa-table"></i>
      <span>Pengeluaran</span></a>
  </li>
  @endif
  
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->