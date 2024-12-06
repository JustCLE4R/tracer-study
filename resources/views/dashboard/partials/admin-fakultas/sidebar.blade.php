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
      <div class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle {{ Request::is('dashboard/admin/fakultas/career*') ? 'active' : '' }}" data-bs-toggle="dropdown"><i class="bi bi-newspaper me-2 fs-5"></i>Karir</a>
        <div class="dropdown-menu bg-transparent border-0">
          <a href="/dashboard/admin/fakultas/career/pending" class="dropdown-item {{ Request::is('dashboard/admin/fakultas/career/pending') ? 'active' : '' }}">Pending</a>
          <a href="/dashboard/admin/fakultas/career/approved" class="dropdown-item {{ Request::is('dashboard/admin/fakultas/career/approved') ? 'active' : '' }}">Approved</a>
          <a href="/dashboard/admin/fakultas/career/rejected" class="dropdown-item {{ Request::is('dashboard/admin/fakultas/career/rejected') ? 'active' : '' }}">Rejected</a>
        </div>
      </div>
      <div class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle {{ Request::is('dashboard/admin/fakultas/user*') ? 'active' : '' }}" data-bs-toggle="dropdown"><i class="bi bi-shield-lock me-2 fs-5"></i>Akun</a>
        <div class="dropdown-menu bg-transparent border-0">
          <a href="/dashboard/admin/fakultas/user" class="dropdown-item {{ Request::is('dashboard/admin/fakultas/user') ? 'active' : '' }}">Mahasiswa</a>
          <a href="/dashboard/admin/fakultas/user-admin" class="dropdown-item {{ Request::is('dashboard/admin/fakultas/user-admin') ? 'active' : '' }}">Admin</a>

          <a href="/dashboard/profile/edit/password" class="dropdown-item {{ Request::is('/dashboard/profile/edit/password') ? 'active' : '' }}">Ganti Password</a>
        </div>
      </div>
      <a href="/dashboard/admin/fakultas/visual" class="nav-item nav-link {{ Request::is('dashboard/admin/fakultas/visual') ? 'active' : '' }}"><i class="bi bi-graph-down me-2 fs-5"></i>Visualisasi</a>
  
      <a href="/dashboard/logout" class="nav-item nav-link"><i class="bi bi-box-arrow-right me-2 fs-5"></i>Logout</a>
  </div>
  
  </nav>
</div>
<!-- Sidebar End -->