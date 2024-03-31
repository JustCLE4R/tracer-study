<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Career</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link href="img/favicon.ico" rel="icon">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">   

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


    <link href="/css/public-carrer.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/bootstrap-5.0.0-beta2.min.css" />
    <link rel="stylesheet" href="/css/LineIcons.2.0.css" />
    <link rel="stylesheet" href="/css/tiny-slider.css" />
    <link rel="stylesheet" href="/css/animate.css" />
    <link rel="stylesheet" href="/css/style.css" />	
    <link rel="stylesheet" href="/css/lindy-uikit.css"/>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>


<body> 
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
                    <img src="https://newuinsu.uinsu.ac.id/wp-content/uploads/2024/02/uin-dan-blu-png-2.png" alt="Logo" />
                  </a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="toggler-icon"></span>
                    <span class="toggler-icon"></span>
                    <span class="toggler-icon"></span>
                  </button>
  
                  <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                    <ul id="nav" class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="page-scroll" href="#" onclick="window.location.href='/'">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="page-scroll" href="#" onclick="document.getElementById('about').scrollIntoView()">Tracer Study</a>
                        </li>
                        <li class="nav-item">
                            <a class="page-scroll active" href="#" >Career</a>
                        </li>
                        <li class="nav-item">
                            <a class="" href="#" onclick="window.location.href='/dashboard/questioner'">Questioner</a>
                        </li>
                        <li class="nav-item">
                            <a class="" href="#" onclick="document.getElementById('laporan').scrollIntoView()">Laporan</a>
                        </li>
                        <li class="nav-item">
                            <a class="" href="#" onclick="window.location.href='/login'">Login</a>
                        </li>                        
                    </ul>
                  </div>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </header>

    <div class="container-fluid py-3 " style="margin-top: 100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="owl-carousel owl-carousel-2 carousel-item-1 position-relative mb-3 mb-lg-0">
                        @foreach($careers->sortByDesc('created_at') as $career)
                        <div class="position-relative overflow-hidden" style="height: 435px;">
                            @if($career->image)
                            <img class="img-fluid h-100" src="{{ asset('storage/' . $career->image) }}" style="object-fit: cover;">
                            @else
                            <img class="img-fluid h-100" src="https://jobsnews.id/wp-content/uploads/2021/01/Jobsnews-01-300x157.png"style="object-fit: cover;">
                            @endif                            
                            <div class="overlay">
                                <div class="mb-1">
                                    <a class="text-white" href="#">{{ $career->company_name }}</a>
                                    <span class="px-2 text-white">/</span>
                                    <span class="text-white">{{ $career->created_at->format('F d, Y') }}</span>
                                    
                                </div>
                                <a href="{{ route('career.publicShow', ['career' => $career->slug]) }}" class="h2 m-0 text-white font-weight-bold" href="#">{{ $career->position }}</a>
                                <span class="h5 text-white">{{ getCategoryName($career->category) }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                    
                </div>
                <div class="col-lg-4">
                    <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Kategori</h3>
                    </div>
                    <div class="position-relative overflow-hidden mb-3" style="height: 80px;">
                        <img class="img-fluid w-100 h-100" src="https://ziliun.com/wp-content/uploads/2022/04/Magang-di-instansi-pemerintahan.gif" style="object-fit: cover;">
                        <a href="" class="overlay text-start justify-content-center h5 m-0 text-white text-decoration-none">
                            Instansi Pemerintahan
                        </a>
                    </div>
                    <div class="position-relative overflow-hidden mb-3" style="height: 80px;">
                        <img class="img-fluid w-100 h-100" src="https://dakwah.uin-suka.ac.id/media/gambar/02_20220404_WhatsApp_Image_2022-04-01_at_16.33.06_(1).jpeg" style="object-fit: cover;">
                        <a href="" class="overlay text-start justify-content-center h5 m-0 text-white text-decoration-none">
                            Lembaga Swadaya Masyarakat
                        </a>
                    </div>
                    <div class="position-relative overflow-hidden mb-3" style="height: 80px;">
                        <img class="img-fluid w-100 h-100" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQa19ZHhBgIwnuXfQSgpRMijdg2C0KQVrQVMCcKl_C1-Q&s" style="object-fit: cover;">
                        <a href="" class="overlay text-start justify-content-center h5 m-0 text-white text-decoration-none">
                            Perusahaan Swasta
                        </a>
                    </div>
                    <div class="position-relative overflow-hidden" style="height: 80px;">
                        <img class="img-fluid w-100 h-100" src="https://asset.kompas.com/crops/82L1ew9xRM-9Ndi3B6hM0FlryyU=/0x0:997x665/750x500/data/photo/2019/06/24/3743393451.jpg" style="object-fit: cover;">
                        <a href="" class="overlay text-start justify-content-center h5 m-0 text-white text-decoration-none">
                            Freelancer
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                                <h3 class="m-0">Perusahaan Swasta</h3>
                            </div>
                        </div>
                        @foreach($careers->where('category', 3)->sortByDesc('created_at')->take(4) as $career)
                        <div class="col-lg-6">
                            <div class="position-relative mb-3">
                                @if($career->image)
                                <img style="width: 100%; height: 200px; object-fit: cover;" src="{{ asset('storage/' . $career->image) }}" style="object-fit: cover;">
                                @else
                                <img style="width: 100%; height: 200px; object-fit: cover;" src="https://jobsnews.id/wp-content/uploads/2021/01/Jobsnews-01-300x157.png" style="object-fit: cover;">
                                @endif
                                <div class="overlay position-relative bg-light">
                                    <div class="mb-2" style="font-size: 14px;">
                                        <a href="">{{ getCategoryName($career->category) }}</a>
                                        <span class="px-1">/</span>
                                        <span>{{ $career->created_at->format('F d, Y') }}</span>
                                    </div>
                                    <a href="{{ route('career.publicShow', ['career' => $career->slug]) }}" class="h4" href="">{{ $career->position }}</a>
                                    <p class="m-0">{{ Str::limit(strip_tags($career->description), 100) }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach


                    </div>
                    
                                     
                    <div class="row">
                        @foreach($careers as $career)
                        <div class="col-lg-6">
                            <div class="d-flex mb-3">
                                @if($career->image)
                                <img src="{{ asset('storage/' . $career->image) }}" style="width: 100px; height: 100px; object-fit: cover;">
                                @else
                                <img  src="https://jobsnews.id/wp-content/uploads/2021/01/Jobsnews-01-300x157.png" style="width: 100px; height: 100px; object-fit: cover;">
                                @endif                               
                                <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                    <div class="mb-1" style="font-size: 13px;">
                                        <a href="">{{ getCategoryName($career->category) }}</a>
                                        <span class="px-1">/</span>
                                        <span>{{ $career->created_at->format('F d, Y') }}</span>
                                    </div>
                                    <a href="{{ route('career.publicShow', ['career' => $career->slug]) }}" class="h6 m-0" href="">{{ $career->position }}</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>                   
                    
                    {{ $careers->links() }}                           
                    
                </div>

                <div class="col-lg-4 pt-3 pt-lg-0">

                    <div class="pb-3">
                        <div class="bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">Terbaru</h3>
                        </div>
                        
                        @foreach($careers->sortByDesc('created_at')->take(8) as $career)
                        <div class="d-flex mb-3">
                            @if($career->image)
                            <img src="{{ asset('storage/' . $career->image) }}" style="width: 100px; height: 100px; object-fit: cover;">
                            @else
                            <img  src="https://jobsnews.id/wp-content/uploads/2021/01/Jobsnews-01-300x157.png"style="width: 100px; height: 100px; object-fit: cover;">
                            @endif 
                            
                            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                <div class="mb-1" style="font-size: 13px;">
                                    <a href="">{{ getCategoryName($career->category) }}</a>
                                    <span class="px-1">/</span>
                                    <span>{{ $career->created_at->format('F d, Y') }}</span>
                                </div>
                                <a href="{{ route('career.publicShow', ['career' => $career->slug]) }}" class="h6 m-0" href="">{{ $career->position }}</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                    

                    <div class="pb-3">
                        <div class="bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">Tags</h3>
                        </div>
                        <div class="d-flex flex-wrap m-n1">
                            <a href="" class="btn btn-sm btn-outline-secondary m-1">BUMN</a>
                            <a href="" class="btn btn-sm btn-outline-secondary m-1">Buruh</a>
                            <a href="" class="btn btn-sm btn-outline-secondary m-1">Web Developer</a>
                            <a href="" class="btn btn-sm btn-outline-secondary m-1">Guru</a>
                            <a href="" class="btn btn-sm btn-outline-secondary m-1">Dosen</a>
                            <a href="" class="btn btn-sm btn-outline-secondary m-1">Data Saintis</a>
                            <a href="" class="btn btn-sm btn-outline-secondary m-1">Teknologi</a>
                            <a href="" class="btn btn-sm btn-outline-secondary m-1">Pegawai Swasta</a>
                            <a href="" class="btn btn-sm btn-outline-secondary m-1">Kuli Bangunan</a>
                            <a href="" class="btn btn-sm btn-outline-secondary m-1">Artis</a>
                            <a href="" class="btn btn-sm btn-outline-secondary m-1">Arsitek</a>
                            <a href="" class="btn btn-sm btn-outline-secondary m-1">Ustad</a>
                        </div>
                    </div>
      
                </div>
            </div>
        </div>
    </div>
    </div>


    <footer class="footer">
        <div class="container">
            <div class="widget-wrapper">
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="footer-widget">
                            <div class="logo mb-35">
                                <a href="index.html"> <img src="https://newuinsu.uinsu.ac.id/wp-content/uploads/2024/02/uin-dan-blu-png-2.png" width="200px" alt=""> </a>
                            </div>
                            <p class="desc mb-35">UIN Sumatera Utara memiliki 8 Fakultas dan 1 Program Pascasarjana. UINSU adalah kampus islam yang memiliki moto “Smart Islamic University”</p>
                            <ul class="socials">
                                <li>
                                    <a href="https://www.facebook.com/uinsuofficial/"> <i class="lni lni-facebook-filled"></i> </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/UINSumutMedan"> <i class="lni lni-twitter-filled"></i> </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/uinsu_official/"> <i class="lni lni-instagram-filled"></i> </a>
                                </li>
                                <li>
                                    <a href="https://www.youtube.com/channel/UCu-kpT7tJfg6y2tJ71e1vtQ"> <i class="lni lni-youtube"></i> </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-xl-2 offset-xl-1 col-md-5 offset-md-1 col-sm-6">
                        <div class="footer-widget">
                            <h3>Link</h3>
                            <ul class="links">
                                <li> <a href="javascript:void(0)">Home</a> </li>
                                <li> <a href="javascript:void(0)">Tracer Study</a> </li>
                                <li> <a href="javascript:void(0)">Career</a> </li>
                                <li> <a href="javascript:void(0)">Questioner</a> </li>
                                <li> <a href="javascript:void(0)">Laporan</a> </li>
                                <li> <a href="javascript:void(0)">Login</a> </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 col-sm-6">
                        <div class="footer-widget">
                            <h3>Layanan</h3>
                            <ul class="links">
                                <li> <a href="javascript:void(0)">Portal SIA</a> </li>
                                <li> <a href="javascript:void(0)">SI-SELMA</a> </li>
                                <li> <a href="javascript:void(0)">E-LEARNING</a> </li>
                                <li> <a href="javascript:void(0)">SI-JURNAL</a> </li>
                                <li> <a href="javascript:void(0)">Repository</a> </li>
                                <li> <a href="javascript:void(0)">SI-DAHLIA</a> </li>
                                <li> <a href="javascript:void(0)">SI-PERPUS</a> </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="footer-widget">
                            <h3>Kontak</h3>
                            <ul>
                                
                                <li>humas@uinsu.ac.id</li>
                                <li>Jl. Willem Iskandar Pasar V, Medan Estate</li>
                            </ul>
                            <div class="contact_map" style="width: 100%; height: 150px; margin-top: 25px;">
                                <div class="gmap_canvas">
                                    <iframe id="gmap_canvas"src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.923855729958!2d98.71849827371673!3d3.604906850184647!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3031316be49d74e9%3A0x2f82fd7c9bd27f!2sUniversitas%20Islam%20Negeri%20Sumatera%20Utara%20Medan!5e0!3m2!1sid!2sid!4v1711774604762!5m2!1sid!2sid" style="width: 100%;"></iframe>
                                    
                                </div>
                                </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="copy-right">
                <p>Copyright © 2024  <a href="https://uinsu.ac.id/" rel="nofollow" target="_blank"> UIN Sumatera Utara Medan </a></p>
            </div>

        </div>
    </footer>

    <a href="#" class="scroll-top btn-hover">
        <i class="lni lni-chevron-up"></i>
    </a>

  
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="/lib/easing/easing.min.js"></script>
    <script src="/lib/owlcarousel/owl.carousel.min.js"></script>
    
    <script src="/js/bootstrap-5.0.0-beta2.min.js"></script>    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="/js/wow.min.js"></script>

    <script src="/js/public-carrer.js"></script>
    <script>
        $(document).ready(function(){
            var previousText = 'Sebelumnya';
            var nextText = 'Selanjutnya';
            
            var previousElement = $('body > div.container-fluid.py-3 > div:nth-child(2) > div > div.col-lg-8 > nav > div.flex.justify-between.flex-1.sm\\:hidden > span');
            var nextElement = $('body > div.container-fluid.py-3 > div:nth-child(2) > div > div.col-lg-8 > nav > div.flex.justify-between.flex-1.sm\\:hidden > a');
            
            if (previousElement.text().trim() === 'pagination.previous') {
                previousElement.text(previousText);
            }
            
            if (nextElement.text().trim() === 'pagination.next') {
                nextElement.text(nextText);
            }
        });




        $(document).ready(function(){
            setTimeout(function(){
                $('span.relative.z-0.inline-flex.rtl\\:flex-row-reverse.shadow-sm.rounded-md').css('display', 'none');
            });
        });
    </script>
    
</body>

</html>