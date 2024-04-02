<!DOCTYPE html>
<html class="no-js" lang="">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Tracer Study UINSU</title>
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="shortcut icon" type="image/x-icon" href="https://newuinsu.uinsu.ac.id/wp-content/uploads/2024/02/uin-dan-blu-png-2.png"/>

  <link rel="stylesheet" href="/css/bootstrap-5.0.0-beta2.min.css" />
  <link rel="stylesheet" href="/css/LineIcons.2.0.css" />
  <link rel="stylesheet" href="/css/tiny-slider.css" />
  <link rel="stylesheet" href="/css/animate.css" />
  <link rel="stylesheet" href="/css/style.css" />	
  <link rel="stylesheet" href="/css/lindy-uikit.css"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">   

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
  <link href="/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  @if (Request::is('career*'))
    <link href="/css/public-carrer.css" rel="stylesheet">
      
  @endif


</head>
<body>

  @include('partials.header')

  @yield('content')

  @include('partials.footer')
  


  <script src="/js/bootstrap-5.0.0-beta2.min.js"></script>    
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="/js/count-up.min.js"></script>
  <script src="/js/glightbox.min.js"></script>
  <script src="/js/tiny-slider.js"></script>
  <script src="/js/wow.min.js"></script>
  <script src="/js/polifill.js"></script>
  <script src="/js/main.js"></script>
    
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
  <script src="/lib/easing/easing.min.js"></script>
  <script src="/lib/owlcarousel/owl.carousel.min.js"></script>

  @if (Request::is('career*'))
  <script src="/js/public-carrer.js"></script>
    <script>
           
    </script>
  @endif

</body>
</html>
    