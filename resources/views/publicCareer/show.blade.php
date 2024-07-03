@extends('layouts.main')
@section('content')

      <div class="container-fluid py-3 " style="margin-top: 100px; background-image: url(https://preview.uideck.com/items/bliss/assets/img/hero/hero-bg.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="position-relative mb-3">
                        @if($career->image)
                        {{-- <img class="img-fluid w-100" src="{{ asset('storage/' . $career->image) }}" style="object-fit: cover;"> --}}
                        <img class="img-fluid w-100" src="{{ $career->image }}"  style="object-fit: cover;">
                        
                         
                        @else
                        <img class="img-fluid w-100" src="https://jobsnews.id/wp-content/uploads/2021/01/Jobsnews-01-300x157.png" style="object-fit: cover;">
                        @endif
                        
                        <div class="overlay position-relative bg-light">
                            <div class="mb-3">
                                <a href="#">{{$career->category }}</a>
                                <span class="px-1">/</span>
                                <span>{{ $career->created_at->format('F d, Y') }}</span>
                            </div>
                            <div>
                                <h3 class="">{{ $career->position }}</h3> 
                                <span class="mb-3"><a href="{{ $career->url }}">{{ $career->company_name }}</a></span>
                                <p>{{ strip_tags($career->description) }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-primary border" onclick="history.back()">Kembali</button>  
                        </div>
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
                    <div class="pt-4">
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
 
@endsection