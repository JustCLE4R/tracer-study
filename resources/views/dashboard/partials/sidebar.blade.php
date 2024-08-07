<!-- Spinner Start -->
<div id="spinner"
  class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
  <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
    <span class="sr-only">Loading...</span>
  </div>
</div>
<!-- Spinner End -->

<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3 shadow ">
  <nav class="navbar">
    <a href="/" class="navbar-brand mx-4 ">
      <img src="/img/logo-admin.png" width="160px" alt="">
    </a>

    <div class="navbar-nav w-100 ">
      <a href="/dashboard" class="nav-item nav-link {{ Request::is('dashboard') ? 'active' : '' }}"><i class="bi bi-house-fill me-2 fs-5"></i>Beranda</a>
  
      @if (Auth::user()->role == 'mahasiswa')
          <a href="/" class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}"><i class="bi bi-speedometer2 me-2 fs-5"></i>Halaman Depan</a>
          <a href="/dashboard/profile" class="nav-item nav-link {{ Request::is('dashboard/profile') ? 'active' : '' }}"><i class="bi bi-person-circle me-2 fs-5"></i>Profil</a>
          <a href="/dashboard/perjalanan-karir" class="nav-item nav-link {{ Request::is('dashboard/perjalanan-karir') ? 'active' : '' }}"><i class="bi bi-person-fill-gear me-2 fs-5"></i>Perjalanan Karir</a>
          <a href="/dashboard/questioner" class="nav-item nav-link {{ Request::is('dashboard/questioner') ? 'active' : '' }}"><i class="bi bi-ui-checks me-2 fs-5"></i>Kuesioner</a>
          <a href="/dashboard/sertifikat" class="nav-item nav-link {{ Request::is('dashboard/sertifikat') ? 'active' : '' }}"><i class="bi bi-file-earmark-check me-2 fs-5"></i>Sertifikat</a>
      @endif
  
      <a href="/dashboard/career" class="nav-item nav-link {{ Request::is('dashboard/career') ? 'active' : '' }}"><i class="bi bi-newspaper me-2 fs-5"></i>Karir</a>
  
      @if (Auth::user()->role == 'superadmin' OR Auth::user()->role == 'admin')
          <a href="/dashboard/admin" class="nav-item nav-link {{ Request::is('dashboard/admin') ? 'active' : '' }}"><i class="bi bi-shield-lock me-2 fs-5"></i>Admin</a>
          <a href="/dashboard/visual" class="nav-item nav-link {{ Request::is('dashboard/visual') ? 'active' : '' }}"><i class="bi bi-graph-down me-2 fs-5"></i>Visualisasi</a>
      @endif
  
      @if (Auth::user()->role == 'superadmin')
          <a href="/dashboard/admin/laporan" class="nav-item nav-link {{ Request::is('dashboard/admin/laporan') ? 'active' : '' }}"><i class="bi bi-bookmark-check-fill me-2 fs-5"></i>Laporan</a>
      @endif
  
      <a href="/dashboard/logout" class="nav-item nav-link"><i class="bi bi-box-arrow-right me-2 fs-5"></i>Logout</a>
  </div>
  
  </nav>
</div>
<!-- Sidebar End -->