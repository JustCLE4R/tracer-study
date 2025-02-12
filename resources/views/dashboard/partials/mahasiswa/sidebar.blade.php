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
      <a href="/" class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}"><i class="bi bi-speedometer2 me-2 fs-5"></i>Halaman Depan</a>
      <a href="/dashboard/profile" class="nav-item nav-link {{ Request::is('dashboard/profile') ? 'active' : '' }}"><i class="bi bi-person-circle me-2 fs-5"></i>Profil</a>
      <a href="/dashboard/perjalanan-karir" class="nav-item nav-link {{ Request::is('dashboard/perjalanan-karir') ? 'active' : '' }}"><i class="bi bi-person-fill-gear me-2 fs-5"></i>Perjalanan Karir</a>
      <a href="/dashboard/questioner" class="nav-item nav-link {{ Request::is('dashboard/questioner') ? 'active' : '' }}"><i class="bi bi-ui-checks me-2 fs-5"></i>Kuesioner</a>
      <a href="/dashboard/sertifikat" class="nav-item nav-link {{ Request::is('dashboard/sertifikat') ? 'active' : '' }}"><i class="bi bi-file-earmark-check me-2 fs-5"></i>Sertifikat</a>
      <a href="/dashboard/career" class="nav-item nav-link {{ Request::is('dashboard/career') ? 'active' : '' }}"><i class="bi bi-newspaper me-2 fs-5"></i>Karir</a>
      <a href="/dashboard/logout" class="nav-item nav-link"><i class="bi bi-box-arrow-right me-2 fs-5"></i>Logout</a>
  </div>
  
  </nav>
</div>
<!-- Sidebar End -->