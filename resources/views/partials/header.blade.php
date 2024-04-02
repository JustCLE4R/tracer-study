<div class="preloader">
    <div class="loader">
        <div class="spinner">
            <div class="spinner-container">
                <div class="spinner-rotator">
                    <div class="spinner-left">
                        <div class="spinner-circle"></div>
                    </div>
                    <div class="spinner-right">
                        <div class="spinner-circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<header class="header">
    <div class="navbar-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="/">
                            <img src="https://newuinsu.uinsu.ac.id/wp-content/uploads/2024/02/uin-dan-blu-png-2.png"
                                alt="Logo" />
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a class=" {{ Request::path() == '/' ? 'active' : '' }}" href="/">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll {{ Request::path() == 'tracer' ? 'active' : '' }}" href="#tracer">Tracer Study</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll {{ Request::path() == 'career' ? 'active' : '' }}" href="#career"
                                        onclick="window.location.href='/career'">Career</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll {{ Request::path() == 'dashboard/questioner' ? 'active' : '' }}" href="/dashboard/questioner"
                                        onclick="window.location.href='/dashboard/questioner'">Questioner</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll {{ Request::path() == 'laporan' ? 'active' : '' }}" href="#laporan">Laporan</a>
                                </li>
                                @if (auth()->check())
                                    <li class="nav-item">
                                        <a class="{{ Request::path() == 'dashboard' ? 'active' : '' }}" href="/dashboard">Dashboard</a>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a class="{{ Request::path() == 'login' ? 'active' : '' }}" href="/login">Login</a>
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
