<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Pusat Pengembangan Karir</title>

  <!-- Favicon -->
  <link href="favicon.ico" type="image/x-icon" rel="icon">

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap">

  <!-- Icons Font -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer"/>

  <!-- Libraries Stylesheet -->
  <link rel="stylesheet" href="/lib/owlcarousel/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel='stylesheet' href='https://cdn.lineicons.com/1.0.1/LineIcons.min.css'>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:100,300,400,600&amp;display=swap'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css'>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  
  {{-- Trix --}}
  <link rel="stylesheet" type="text/css" href="/css/trix.css">

  <!-- Custom Stylesheet -->
  <link href="/css/dashboard.css" rel="stylesheet">
  <link href="/css/timeline.css" rel="stylesheet">
  @if (Request::is('dashboard/profile*'))
    <link href="/css/profile.css" rel="stylesheet">
  @endif

  @if (Request::is('dashboard/perjalanan-karir*'))
    <link href="/css/perjalanan-karir.css" rel="stylesheet">
  @endif

  @stack('styles')
</head>

<body>

  <div class="container-fluid position-relative bg-white p-0">
    {{-- sidebar --}}
    @if(Auth::user()->role == 'superadmin')
      @include('dashboard.partials.super-admin.sidebar')
    @elseif (Auth::user()->role == 'superadmin2')
      @include('dashboard.partials.super-admin2.sidebar')
    @elseif (Auth::user()->role == 'adminfakultas')
      @include('dashboard.partials.admin-fakultas.sidebar')
    @elseif (Auth::user()->role == 'adminprodi')
      @include('dashboard.partials.admin-prodi.sidebar')
    @elseif (Auth::user()->role == 'surveyor')
      @include('dashboard.partials.surveyor.sidebar')
    @elseif (Auth::user()->role == 'mahasiswa')
      @include('dashboard.partials.mahasiswa.sidebar')
    @endif

    <div class="content">
      @include('dashboard.partials.navbar')

      @yield('content')

      @include('dashboard.partials.footer')
    </div>
  </div>

  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://kit.fontawesome.com/fc596df623.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="/js/wow.min.js"></script>
  
  <script src="/lib/waypoints/waypoints.min.js"></script>
  <script src="/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="/lib/tempusdominus/js/moment.min.js"></script>
  <script src="/lib/tempusdominus/js/moment-timezone.min.js"></script>
  <script src="/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

  {{-- trix --}}
  <script type="text/javascript" src="/js/trix.js"></script>
  <script>    
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl)
    });
  </script>

  <!-- Custom Javascript -->
  <script src="/js/dashboard.js"></script>
  
  @if (Request::is('dashboard/tracer*'))
    <script src="/js/form.js"></script>
  @endif

  @if (Request::is('dashboard/perjalanan-karir*'))
    <script src="/js/tambah-pekerjaan.js"></script>
  @endif

  @if (Request::is('dashboard/pendidikan*'))
    <script src="/js/tambah-pendidikan.js"></script>
  @endif

  @if (Request::is('dashboard/career*'))
    <script src="/js/career.js"></script>
  @endif

  @stack('scripts')
</body>

</html>