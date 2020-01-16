<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Admin</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="/">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Interface
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
      aria-controls="collapseTwo">
      <i class="fas fa-fw fa-cog"></i>
      <span>Components</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Custom Components:</h6>
        <a class="collapse-item" href="/buttons">Buttons</a>
        <a class="collapse-item" href="/cards">Cards</a>
      </div>
    </div>
  </li>

  <!-- Nav Item - Utilities Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true"
      aria-controls="collapseUtilities">
      <i class="fas fa-fw fa-wrench"></i>
      <span>Utilities</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Custom Utilities:</h6>
        <a class="collapse-item" href="/utilities-color">Colors</a>
        <a class="collapse-item" href="/utilities-border">Borders</a>
        <a class="collapse-item" href="/utilities-animation">Animations</a>
        <a class="collapse-item" href="/utilities-other">Other</a>
      </div>
    </div>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Addons
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
      aria-controls="collapsePages">
      <i class="fas fa-fw fa-folder"></i>
      <span>Pages</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Login Screens:</h6>
        <a class="collapse-item" href="/login">Login</a>
        <a class="collapse-item" href="/register">Register</a>
        <a class="collapse-item" href="/forgot-password">Forgot Password</a>
        <div class="collapse-divider"></div>
        <h6 class="collapse-header">Other Pages:</h6>
        <a class="collapse-item" href="/404">404 Page</a>
        <a class="collapse-item" href="/blank">Blank Page</a>
      </div>
    </div>
  </li>

  <!-- Nav Item - Charts -->
  <li class="nav-item">
    <a class="nav-link" href="/charts">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Charts</span></a>
  </li>

  <!-- Nav Item - Tables -->
  <li class="nav-item">
    <a class="nav-link" href="/tables">
      <i class="fas fa-fw fa-table"></i>
      <span>Tables</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{route('pejabat.index')}}">
      <i class="fas fa-fw fa-table"></i>
      <span>Pejabat</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages1" aria-expanded="true"
      aria-controls="collapsePages">
      <i class="fas fa-fw fa-folder"></i>
      <span>SHB</span>
    </a>
    <div id="collapsePages1" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Bidang :</h6>
        <a class="collapse-item" href="{{route('shb.index')}}">Semua</a>
        <a class="collapse-item" href="{{route('shb.bahan')}}">Bahan</a>
        <a class="collapse-item" href="{{route('shb.suku_cadang')}}">Suku Cadang</a>
        <a class="collapse-item" href="{{route('shb.natura')}}">Natura dan Pakan</a>
        <a class="collapse-item" href="{{route('shb.alat_besar')}}">Alat Besar</a>
        <a class="collapse-item" href="{{route('shb.alat_angkutan')}}">Alat Angkutan</a>
        <a class="collapse-item" href="{{route('shb.alat_bengkel')}}">Alat Bengkel dan Ukur</a>
        <a class="collapse-item" href="{{route('shb.alat_kantor')}}">Alat Kantor dan RT</a>
        <a class="collapse-item" href="{{route('shb.alat_studio')}}">Alat Studio</a>
        <a class="collapse-item" href="{{route('shb.komputer')}}">Komputer</a>
        <a class="collapse-item" href="{{route('shb.pertanian')}}">Pertanian & Kesehatan</a>
        <a class="collapse-item" href="{{route('shb.obat')}}">Obat Obatan</a>
        <a class="collapse-item" href="{{route('shb.buku')}}">Buku Perpus</a>
        <a class="collapse-item" href="{{route('shb.honor')}}">Honor dan Jasa Pelayanan</a>
        <a class="collapse-item" href="{{route('shb.biaya')}}">Biaya</a>
      </div>
    </div>
  </li>

  {{-- <li class="nav-item">
    <a class="nav-link" href="{{route('barang.index')}}">
      <i class="fas fa-fw fa-table"></i>
      <span>Barang</span></a>
  </li> --}}

  <li class="nav-item">
    <a class="nav-link" href="{{route('nota.index')}}">
      <i class="fas fa-fw fa-table"></i>
      <span>Nota</span></a>
  </li>

  {{-- <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePermintaan" aria-expanded="true"
      aria-controls="collapsePermintaan">
      <i class="fas fa-fw fa-folder"></i>
      <span>Permintaan</span>
    </a>
    <div id="collapsePermintaan" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Bidang:</h6>
        <a class="collapse-item" href="{{route('bidang.permintaan.index')}}">Permintaan</a>
        <a class="collapse-item" href="{{route('bidang.peminjaman.index')}}">Perminjaman</a>
        <div class="collapse-divider"></div>
        <h6 class="collapse-header">Sekretaris:</h6>
        <a class="collapse-item" href="{{route('sekretaris.permintaan.index')}}">Permintaan</a>
        <a class="collapse-item" href="{{route('sekretaris.peminjaman.index')}}">Perminjaman</a>
      </div>
    </div>
  </li> --}}

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->