<!-- Navbar Start -->
<nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">

  <a href="#" class="sidebar-toggler flex-shrink-0 text-success">
    <i class="bi bi-justify"></i>
  </a>

  <div class="navbar-nav w-100 d-flex justify-content-between align-items-center m-2">

    @if (Auth::user()->role != 'mahasiswa')
    <div class="me-auto">
      <form class="d-flex align-items-center" action="/dashboard/admin" method="GET">
        <div class="input-group">
          <input class="form-control" type="search" name="search" placeholder="Search ..." aria-label="Search" value="{{ request()->input('search') ?: old('search') }}">
          <button class="btn btn-sm btn-outline-success" type="submit" id="button-addon2"><i class="bi bi-search"></i></button>
        </div>
      </form>
    </div>
    @endif

    <div class="text-end me-2 flex-grow-1"> 
      <a href="#">
        <span class="d-none text-success d-lg-inline-flex overflow-hidden" style="max-width: 150px;">{{ Auth::user()->nama }}</span>
      </a>
    </div>
    <div class="text-start">
      <a href="#" class="">
        <img class="rounded-circle " src="{{ Auth::user()->foto ? url('https://pmb.uinsu.ac.id/file/photo/' . Auth::user()->foto) : 'https://bootdey.com/img/Content/avatar/avatar7.png' }}" alt="" width="40vh"  height="40vh"  style="object-fit: cover;">
      </a>
    </div>
  </div>

</nav>

<!-- Navbar End -->