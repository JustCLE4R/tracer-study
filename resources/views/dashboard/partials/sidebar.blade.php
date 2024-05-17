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
    <a href="https://uinsu.ac.id" class="navbar-brand mx-4 ">
      <img src="/img/logo-admin.png" width="160px" alt="">
    </a>

    <div class="navbar-nav w-100 ">
      <a href="/dashboard" class="nav-item nav-link "><i class="bi bi-house-fill me-2 fs-5"></i>Dashboard</a>

      @if (Auth::user()->role == 'mahasiswa')
        <a href="/dashboard/profile" class="nav-item nav-link"><i class="bi bi-person-circle me-2 fs-5"></i>Profile</a>
        <a href="/" class="nav-item nav-link"><i class="bi bi-speedometer2 me-2 fs-5"></i>Landing Page</a>
        <a href="/dashboard/tracer" class="nav-item nav-link"><i class="bi bi-ui-checks me-2 fs-5"></i>Questioner</a>
        <a href="/dashboard/perjalanan-karir" class="nav-item nav-link"><i class="bi bi-person-fill-gear me-2 fs-5"></i>Perjalanan Karir</a>
      @endif

      <a href="/dashboard/career" class="nav-link "><i class="bi bi-newspaper me-2 fs-5"></i>Career</a>

      @if (Auth::user()->role == 'superadmin' OR Auth::user()->role == 'admin')
        <a href="/dashboard/admin" class="nav-link "><i class="bi bi-shield-lock me-2 fs-5"></i>Admin</a>
      @endif

      @if (Auth::user()->role == 'superadmin')
        <a href="/dashboard/admin/laporan" class="nav-link "><i class="bi bi-bookmark-check-fill me-2 fs-5"></i>Laporan</a>
      @endif
        
      <a href="/dashboard/logout" class="nav-item nav-link"><i class="bi bi-box-arrow-right me-2 fs-5"></i>Logout</a>
    </div>
  </nav>
</div>
<!-- Sidebar End -->