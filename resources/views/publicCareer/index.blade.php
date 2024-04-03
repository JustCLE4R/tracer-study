@extends('layouts.main')
@section('content')

    <div class="container-fluid py-3 " style="margin-top: 100px; background-image: url(https://preview.uideck.com/items/bliss/assets/img/hero/hero-bg.jpg);">
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
                                    <span class="text-white">{{ $career->created_at->translatedFormat('d F Y') }}</span>
                                    
                                </div>
                                <a href="{{ route('career.publicShow', ['career' => $career->slug]) }}" class="h2 m-0 text-white font-weight-bold" href="#">{{ $career->position }}</a>
                                <span class="h5 text-white">{{ $career->category }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                    
                </div>
                <div class="col-lg-4">
                    <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3 border">
                        <h3 class="m-0">Kategori</h3>
                    </div>
                    <div id="hover" class="position-relative overflow-hidden mb-3" style="height: 80px;">
                        <img class="img-fluid w-100 h-100" src="https://ziliun.com/wp-content/uploads/2022/04/Magang-di-instansi-pemerintahan.gif" style="object-fit: cover;">
                        <a href="/career?category=Instansi Pemerintahan" class="overlay text-start justify-content-center h5 m-0 text-white text-decoration-none">
                            Instansi Pemerintahan
                        </a>
                    </div>
                    <div id="hover" class="position-relative overflow-hidden mb-3" style="height: 80px;">
                        <img class="img-fluid w-100 h-100" src="https://dakwah.uin-suka.ac.id/media/gambar/02_20220404_WhatsApp_Image_2022-04-01_at_16.33.06_(1).jpeg" style="object-fit: cover;">
                        <a href="/career?category=Lembaga Swadaya Masyarakat" class="overlay text-start justify-content-center h5 m-0 text-white text-decoration-none">
                            Lembaga Swadaya Masyarakat
                        </a>
                    </div>
                    <div id="hover" class="position-relative overflow-hidden mb-3" style="height: 80px;">
                        <img class="img-fluid w-100 h-100" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQa19ZHhBgIwnuXfQSgpRMijdg2C0KQVrQVMCcKl_C1-Q&s" style="object-fit: cover;">
                        <a href="/career?category=Perusahaan Swasta" class="overlay text-start justify-content-center h5 m-0 text-white text-decoration-none">
                            Perusahaan Swasta
                        </a>
                    </div>
                    <div id="hover" class="position-relative overflow-hidden" style="height: 80px;">
                        <img class="img-fluid w-100 h-100" src="https://asset.kompas.com/crops/82L1ew9xRM-9Ndi3B6hM0FlryyU=/0x0:997x665/750x500/data/photo/2019/06/24/3743393451.jpg" style="object-fit: cover;">
                        <a href="/career?category=Freelancer" class="overlay text-start justify-content-center h5 m-0 text-white text-decoration-none">
                            Freelancer
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div id="content" class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3 border">
                                <h3 class="m-0">Perusahaan Swasta</h3>
                            </div>
                        </div>
                        @foreach($careers as $career)
                        <div class="col-lg-6 ">
                            <div id="hover" class="position-relative mb-3 border" onclick="window.location.href='{{ route('career.publicShow', ['career' => $career->slug]) }}'" >
                                @if($career->image)
                                <img style="width: 100%; height: 200px; object-fit: cover;" src="{{ asset('storage/' . $career->image) }}" style="object-fit: cover;">
                                @else
                                <img style="width: 100%; height: 200px; object-fit: cover;" src="https://jobsnews.id/wp-content/uploads/2021/01/Jobsnews-01-300x157.png" style="object-fit: cover;">
                                @endif
                                <div class="overlay position-relative bg-light">
                                    <div class="mb-2" style="font-size: 14px;">
                                        <a href="">{{ $career->category }}</a>
                                        <span class="px-1">/</span>
                                        <span>{{ $career->created_at->translatedFormat('d F Y') }}</span>
                                    </div>
                                    <a href="{{ route('career.publicShow', ['career' => $career->slug]) }}" class="h4" href="">{{ $career->position }}</a>
                                    <span class="mb-3"><a href="{{ $career->url }}">{{ $career->company_name }}</a></span>
                                    <p class="m-0">{{ Str::limit(strip_tags($career->description), 100) }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    {{ $careers->onEachSide(1)->links() }}                  
                    
                </div>

                <div class="col-lg-4 pt-3 pt-lg-0">

                    <div class="pb-3">
                        <div class="bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">Terbaru</h3>
                        </div>
                        
                        @foreach($careersLatest->take(6) as $career)
                        <div id="hover" class="d-flex mb-3 border" onclick="window.location.href='{{ route('career.publicShow', ['career' => $career->slug]) }}'">
                            @if($career->image)
                            <img src="{{ asset('storage/' . $career->image) }}" style="width: 100px; height: 100px; object-fit: cover;">
                            @else
                            <img  src="https://jobsnews.id/wp-content/uploads/2021/01/Jobsnews-01-300x157.png"style="width: 100px; height: 100px; object-fit: cover;">
                            @endif 
                            
                            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                <div class="mb-1" style="font-size: 13px;">
                                    <a href="">{{ $career->category }}</a>
                                    <span class="px-1">/</span>
                                    <span>{{ $career->created_at->translatedFormat('d F Y') }}</span>
                                </div>
                                <a href="{{ route('career.publicShow', ['career' => $career->slug]) }}" class="h6 m-0" href="">{{ $career->position }}</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                    

                    <div class="pb-3">
                        <div class="bg-light py-2 px-4 mb-3 border" >
                            <h3 class="m-0">Tags</h3>
                        </div>
                        <div id="tags" class="d-flex flex-wrap m-n1">
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
    
@endsection