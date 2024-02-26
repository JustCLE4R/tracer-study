<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Pusat Pengembangan Karir</title>

  <!-- Favicon -->
  <link href="/img/favicon.ico" rel="icon">

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap">

  <!-- Icons Font -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer"/>

  <!-- Libraries Stylesheet -->
  <link rel="stylesheet" href="/lib/owlcarousel/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css"/>

  <!-- Custom Stylesheet -->
  <link href="/css/dashboard.css" rel="stylesheet">
</head>

<body>

  <div class="container-fluid position-relative bg-white p-0">
    @include('dashboard.partials.sidebar')

    <div class="content">
      @include('dashboard.partials.navbar')

      @yield('content')

      @include('dashboard.partials.footer')
    </div>
  </div>

  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>


  <script src="/lib/waypoints/waypoints.min.js"></script>
  <script src="/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="/lib/tempusdominus/js/moment.min.js"></script>
  <script src="/lib/tempusdominus/js/moment-timezone.min.js"></script>
  <script src="/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

  <!-- Custom Javascript -->
  <script src="/js/dashboard.js"></script>
</body>

</html>