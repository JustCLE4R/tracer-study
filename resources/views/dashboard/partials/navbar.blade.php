<!-- Navbar Start -->
<nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">

  <a href="#" class="sidebar-toggler flex-shrink-0 text-success">
    <i class="bi bi-justify"></i>
  </a>

  <div class="navbar-nav d-flex align-items-center ms-auto m-2">
    <div class="text-end me-2 flex-grow-1">
      <a href="/dashboard/profile">
        <span class="d-none text-success d-lg-inline-flex overflow-hidden" style="max-width: 150px;">{{ Auth::user()->nama }}</span>
      </a>
    </div>
    <div class="text-start">
      <a href="/dashboard/profile" class="">
        <img class="rounded-circle " src="/img/account.png" alt="" width="40vh">        
      </a>
    </div>
  </div>

</nav>

<!-- Navbar End -->