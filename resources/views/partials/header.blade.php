
<div class="loader-container" id="loader-container">
  <div class="loader"></div>
  <div class="text-loader">Tracer-Study </div>
</div>	


<header class="header">
  <div class="navbar-area">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-12">
          <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="/">
              <img src="/img/logo.png" alt="Logo" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
              aria-label="Toggle navigation">
              <span class="toggler-icon"></span>
              <span class="toggler-icon"></span>
              <span class="toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
              <ul id="nav" class="navbar-nav ms-auto">
                <li class="nav-item">
                  <a class=" {{ Request::is('/') ? 'active' : '' }}" href="/">Halaman Depan</a>
                </li>
                <li class="nav-item">
                  <a class="page-scroll {{ Request::is('tracer') ? 'active' : '' }}" href="#tracer">Tracer
                    Study</a>
                </li>
                <li class="nav-item">
                  <a class="page-scroll {{ Request::is('career*') ? 'active' : '' }}" href="#career"
                    onclick="window.location.href='/career'">Karir</a>
                </li>
                <li class="nav-item">
                  <a class="page-scroll {{ Request::is('laporan') ? 'active' : '' }}" href="#laporan">Laporan</a>
                </li>
                @if (Auth::check())
                <li class="nav-item">
                  <a class="{{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard">Beranda</a>
                </li>
                @else
                <li class="nav-item">
                  <a class="{{ Request::is('login') ? 'active' : '' }}" href="/login">Masuk</a>
                </li>
                @endif
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </div>
</header>