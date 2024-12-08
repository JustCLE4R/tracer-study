@extends('layouts.main')
@section('content')
    <section id="home" class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <span class="wow fadeInLeft fs-5 text-secondary" data-wow-delay=".2s">Selamat Datang Di Website</span>
                        <h1 class="wow fadeInUp" data-wow-delay=".4s">Tracer Study Universitas Islam Negeri Sumatera Utara
                        </h1>
                        <p class="wow fadeInUp" data-wow-delay=".6s">Menyediakan Informasi Seputar Rekam Jejak Karir Lulusan
                            UIN Sumatera Utara Dan Informasi Tentang Berita Lowongan Pekerjaan</p>

                        <div class="about-counter mt-50 ">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="single-counter counter-color-2 d-flex wow fadeInUp" data-wow-duration="1s"
                                        data-wow-delay="0.6s">
                                        <div class="counter-shape">
                                            <span class="shape-1"></span>
                                            <span class="shape-2"></span>
                                        </div>
                                        <div class="counter-content media-body">
                                            <div class="counter-count">
                                                <div class="counter" id="satisfactionCount">-</div>
                                            </div>
                                            <p class="text">Alumni</p>
                                        </div>
                                    </div> <!-- single counter -->
                                </div>
                                <div class="col-sm-4">
                                    <div class="single-counter counter-color-3 d-flex wow fadeInUp" data-wow-duration="1s"
                                        data-wow-delay="0.9s">
                                        <div class="counter-shape">
                                            <span class="shape-1"></span>
                                            <span class="shape-2"></span>
                                        </div>
                                        <div class="counter-content media-body">
                                            <div class="counter-count">
                                                <div class="counter" id="projectsCount">-</div>
                                            </div>
                                            <p class="text">Telah Mengisi</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-img wow fadeInUp" data-wow-delay=".5s">
                        <div class="hero-figure-box hero-figure-box-09"></div>
                        <div class="hero-figure-box hero-figure-box-07"></div>
                        <div class="hero-figure-box hero-figure-box-08 " data-wow-delay=".5s" data-rotation="-22deg"
                            style="transform: rotate(-22deg) scale(1); opacity: 1;"></div>
                        <img src="/img/hero-1.png" alt="" style="max-width: 600px">
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section id="tracer" class="about-section pt-100">
        <div class="container">
            <div id="roker" class="row justify-content-between" >
                <div id="col1" class="col-lg-5 p-5 ">
                    <div id="chart" class="about-img mb-50  wow fadeInUp" data-wow-delay=".5s">
                        <canvas id="status"></canvas>
                        <canvas id="jenis-kelamin"></canvas>
                        <canvas id="pengisi"></canvas>
                        <canvas style="display:none;" id="myChart" width="400" height="200"></canvas>

                    </div>
                </div>
                <div id="col2" class="col-lg-7">
                    <div class="about-content mb-50">
                        <div class="section-title mb-10 wow fadeInUp" data-wow-delay=".5s">
                            <h1 class="mb-20">Data Statistik Tracer Study</h1>
                            <p>Tracer Study UIN Sumatera Utara adalah sebuah Website yang mengungkapkan hasil penelitian dan
                                analisis mendalam terhadap jejak karir alumni dari UIN Sumatera Utara para alumni, tren
                                karir, serta dampak pendidikan dari universitas setiap tahunnya.</p>
                        </div>

                        <div class="accordion pb-15 wow fadeInUp" data-wow-delay=".2s" id="accordionExample">
                            <div class="single-faq">
                                <button class="w-100 text-start" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <h3>Pilih Statistik Untuk Ditampilkan</h3>
                                </button>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                    data-bs-parent="#accordionExample">

                                    <div class="faq-content d-flex flex-wrap">
                                        Perbandingan Berdasarkan Status Alumni Tracer Study 2024
                                        <a href="#0" class="button-sm radius-30 mt-2 show-chart"
                                            data-chart="status">Tampilkan <i class="lni lni-display"></i></a>
                                    </div>
                                    <div class="faq-content d-flex flex-wrap">
                                        Perbandingan Jenis Kelamin Yang Mengisi Tracer Study 2024
                                        <a href="#0" class="button-sm radius-30 mt-2 show-chart"
                                            data-chart="jenis-kelamin">Tampilkan <i class="lni lni-display"></i></a>
                                    </div>
                                    <div class="faq-content d-flex flex-wrap">
                                        Perbandingan Jumlah Alumni Yang Mengisi Tracer Study 2024
                                        <a href="#0" class="button-sm radius-30 mt-2 show-chart"
                                            data-chart="pengisi">Tampilkan <i class="lni lni-display"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="service" class="service-section img-bg pt-100 pb-100 mt-150">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-xl-9 col-lg-12 col-md-12">
                    <div class="section-title text-center mb-50 wow fadeInUp" data-wow-delay=".5s">
                        <h1>Virtual Tour </h1>
                        <p>UIN Sumatera Utara Menyediakan Sarana Virtual Tour Bagi Para Pengunjung Yang Ingin Mengunjungi
                            Setiap Kampus UINSU Secara Virtual</p>
                    </div>
                </div>
            </div>

            <div class="row  justify-content-center">
                <div class="col-xl-4 col-md-6">
                    <div class="single-service">
                        <div class="icon color-1">
                            <i class="lni lni-map-marker"></i>
                        </div>
                        <div class="content wow fadeInUp" data-wow-delay=".5s">
                            <h3>Kampus I UINSU</h3>
                            <p>Berlokasikan di Jl. Sutomo Ujung Kota Medan, Sumatera Utara</p>
                            <a href="https://sutomo.uinsu.ac.id/" class="button-sm radius-30 mt-2">Kunjungi <i
                                    class="lni lni-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="single-service">
                        <div class="icon color-2">
                            <i class="lni lni-map-marker"></i>
                        </div>
                        <div class="content wow fadeInUp" data-wow-delay=".5s">
                            <h3>Kampus II UINSU</h3>
                            <p>Berlokasikan di Jl. William Iskandar Ps. V, Kabupaten Deli Serdang, Sumatera Utara</p>
                            <a href="https://pancing.uinsu.ac.id/" class="button-sm radius-30 mt-2">Kunjungi <i
                                    class="lni lni-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="single-service">
                        <div class="icon color-3">
                            <i class="lni lni-map-marker"></i>
                        </div>
                        <div class="content wow fadeInUp" data-wow-delay=".5s">
                            <h3>Kampus IV UINSU</h3>
                            <p>Berlokasikan di Jl. Lap. Golf No.120, Kabupaten Deli Serdang, Sumatera Utara </p>
                            <a href="https://tuntungan.uinsu.ac.id/" class="button-sm radius-30 mt-2">Kunjungi <i
                                    class="lni lni-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>

    <section id="career" class="about-section pt-100 pb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6">
                    <div class="about-content">
                        <div class="section-title mb-30">
                            <h1 class="mb-25 wow fadeInUp" data-wow-delay=".2s">Karir</h1>
                            <p class="wow fadeInUp" data-wow-delay=".3s">Kampus UINSU Menyediakan Sarana Bagi Alumni Untuk
                                Berbagi Berita Lowongan Pekerjaan yang Selalu di Update Setiap Saat</p>
                        </div>
                        <ul>
                            <li class="wow fadeInUp" data-wow-delay=".35s">
                                <i class="lni lni-checkmark-circle"></i>
                                Instansi Pemerintahan
                            </li>
                            <li class="wow fadeInUp" data-wow-delay=".4s">
                                <i class="lni lni-checkmark-circle"></i>
                                Lembaga Swadaya Masyarakat
                            </li>
                            <li class="wow fadeInUp" data-wow-delay=".45s">
                                <i class="lni lni-checkmark-circle"></i>
                                Perusahaan Swasta
                            </li>
                            <li class="wow fadeInUp" data-wow-delay=".45s">
                                <i class="lni lni-checkmark-circle"></i>
                                Freelancer
                            </li>
                        </ul>
                        <a href="/career" onclick="window.location.href='/career'"
                            class="button  mt-20 radius-10 wow fadeInUp" data-wow-delay=".5s">Kunjungi Karir <i
                                class="lni lni-angle-double-right"></i></a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="about-img text-lg-right wow fadeInUp" data-wow-delay=".5s">
                        <img src="/img/hero-2.webp" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="laporan" class="cta-section img-bg pt-110 pb-60">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-7 col-lg-7">
                    <div class="section-title mb-50">
                        <h1 class="mb-20 wow fadeInUp" data-wow-delay=".2s">Buku Tracer Study UIN Sumatera Utara</h1>
                        <p class="wow fadeInUp" data-wow-delay=".4s">Buku "Tracer Study UIN Sumatera Utara" adalah sebuah
                            laporan yang mengungkapkan hasil penelitian dan analisis mendalam terhadap jejak karir alumni
                            dari UIN Sumatera Utara. Dalam buku ini, Anda akan menemukan berbagai data dan informasi yang
                            relevan, termasuk pandangan dari para alumni, tren karir, serta dampak pendidikan dari
                            universitas setiap tahunnya.</p>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5">
                    <div class="accordion pb-15 wow fadeInUp" data-wow-delay=".2s" id="accordionExample">
                        <div class="single-faq">
                            <button class="w-100 text-start" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <h3>Download Tracer Study</h3>
                            </button>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">

                                @foreach ($laporans as $laporan)
                                    <div class="faq-content">
                                        {{ $laporan->title }}<br>
                                        <a href="storage/{{ $laporan->laporan }}" class="button-sm radius-30 mt-2"
                                            download>Download <i class="lni lni-download"></i></a>
                                    </div>
                                @endforeach

                            </div>


                        </div>

                    </div>

                </div>
            </div>
    </section>

    <section id="pricing" class="pricing-section pricing-style-4 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-5 col-lg-6">
                    <div class="section-title mb-60">
                        <h3 class="mb-15 wow fadeInUp" data-wow-delay=".2s">Aplikasi Layanan</h3>
                        <p class="wow fadeInUp" data-wow-delay=".4s">UIN Sumatera Utara Memiliki Banyak Layanan Aplikasi
                            Dalam Mengelola dan Memanajemen Sistem Yang Ada Dikampus</p>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6">
                    <div class="pricing-active-wrapper wow fadeInUp" data-wow-delay=".4s">
                        <div class="pricing-active">
                            <div class="single-pricing-wrapper">
                                <div class="single-pricing">
                                    <h4>Portal SIA</h4>
                                    <h3><i class="bi bi-gear"></i></h3>
                                    <p>Menangani Sistem Informasi Akademik Dosen dan Mahasiswa UINSU</p>
                                    <a href="https://portalsia.uinsu.ac.id " target="_blank"
                                        class="button radius-30 mt-2">Kunjungi <i class="lni lni-angle-double-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="single-pricing-wrapper">
                                <div class="single-pricing">
                                    <h4>SI-PMB</h4>
                                    <h3><i class="bi bi-person-bounding-box"></i></h3>
                                    <p>Menangani Sistem Informasi Penerimaan Mahasiswa Baru UIN Sumatera Utara</p>
                                    <a href="https://sipmb.uinsu.ac.id " target="_blank"
                                        class="button radius-30 mt-2">Kunjungi <i
                                            class="lni lni-angle-double-right"></i></a>
                                </div>
                            </div>
                            <div class="single-pricing-wrapper">
                                <div class="single-pricing">
                                    <h4>SI-MABA</h4>
                                    <h3><i class="bi bi-person-standing"></i></h3>
                                    <p>Menangani Sistem Informasi Daftar Ulang Mahasiswa Baru UIN Sumatera Utara</p>
                                    <a href="https://maba.uinsu.ac.id " target="_blank"
                                        class="button radius-30 mt-2">Kunjungi <i
                                            class="lni lni-angle-double-right"></i></a>
                                </div>
                            </div>
                            <div class="single-pricing-wrapper">
                                <div class="single-pricing">
                                    <h4>SI-SELMA</h4>
                                    <h3><i class="bi bi-person-circle"></i></h3>
                                    <p>Menangani Sistem Informasi Surat Elektronik Mahasiswa UIN Sumatera Utara</p>
                                    <a href="https:// .uinsu.ac.id " target="_blank"
                                        class="button radius-30 mt-2">Kunjungi <i
                                            class="lni lni-angle-double-right"></i></a>
                                </div>
                            </div>
                            <div class="single-pricing-wrapper">
                                <div class="single-pricing">
                                    <h4>SI-LIANA</h4>
                                    <h3><i class="bi bi-check2-all"></i></h3>
                                    <p>Menangani Sistem Informasi Kuliah Kerja Nyata UIN Sumatera Utara</p>
                                    <a href="https://siselma.uinsu.ac.id " target="_blank"
                                        class="button radius-30 mt-2">Kunjungi <i
                                            class="lni lni-angle-double-right"></i></a>
                                </div>
                            </div>
                            <div class="single-pricing-wrapper">
                                <div class="single-pricing">
                                    <h4>E-LEARNING</h4>
                                    <h3><i class="bi bi-mortarboard-fill"></i></h3>
                                    <p>Menangani Sistem Informasi Pembelajaran Online UIN Sumatera Utara</p>
                                    <a href="https://elearning.uinsu.ac.id " target="_blank"
                                        class="button radius-30 mt-2">Kunjungi <i
                                            class="lni lni-angle-double-right"></i></a>
                                </div>
                            </div>
                            <div class="single-pricing-wrapper">
                                <div class="single-pricing">
                                    <h4>SI-JURNAL</h4>
                                    <h3><i class="bi bi-journals"></i></h3>
                                    <p>Menangani Tentang Sistem Informasi Jurnal UIN Sumatera Utara</p>
                                    <a href="https://sijurnal.uinsu.ac.id " target="_blank"
                                        class="button radius-30 mt-2">Kunjungi <i
                                            class="lni lni-angle-double-right"></i></a>
                                </div>
                            </div>
                            <div class="single-pricing-wrapper">
                                <div class="single-pricing">
                                    <h4>SI-LIBRARY</h4>
                                    <h3><i class="bi bi-book-half"></i></h3>
                                    <p>Menangani Website Perpustakaan UIN Sumatera Utara</p>
                                    <a href="https://silibrary.uinsu.ac.id " target="_blank"
                                        class="button radius-30 mt-2">Kunjungi <i
                                            class="lni lni-angle-double-right"></i></a>
                                </div>
                            </div>
                            <div class="single-pricing-wrapper">
                                <div class="single-pricing">
                                    <h4>REPOSITORY</h4>
                                    <h3><i class="bi bi-bookmarks-fill"></i></h3>
                                    <p>Menangani Sistem Informasi Repositori UIN Sumatera Utara</p>
                                    <a href="https://repository.uinsu.ac.id " target="_blank"
                                        class="button radius-30 mt-2">Kunjungi <i
                                            class="lni lni-angle-double-right"></i></a>
                                </div>
                            </div>
                            <div class="single-pricing-wrapper">
                                <div class="single-pricing">
                                    <h4>SI-PUSAKA</h4>
                                    <h3><i class="bi bi-chat-square-dots-fill"></i></h3>
                                    <p>Menangani Sistem Informasi Pengajuan Surat Bebas Pustaka UIN Sumatera Utara</p>
                                    <a href="https://sipusaka.uinsu.ac.id " target="_blank"
                                        class="button radius-30 mt-2">Kunjungi <i
                                            class="lni lni-angle-double-right"></i></a>
                                </div>
                            </div>
                            <div class="single-pricing-wrapper">
                                <div class="single-pricing">
                                    <h4>SI-RASIDA</h4>
                                    <h3><i class="bi bi-mortarboard"></i></h3>
                                    <p>Menangani Sistem Informasi Pendaftaran Sidang dan Wisuda UINSU</p>
                                    <a href="https://sirasida.uinsu.ac.id " target="_blank"
                                        class="button radius-30 mt-2">Kunjungi <i
                                            class="lni lni-angle-double-right"></i></a>
                                </div>
                            </div>
                            <div class="single-pricing-wrapper">
                                <div class="single-pricing">
                                    <h4>SI-KIP</h4>
                                    <h3><i class="bi bi-person-vcard-fill"></i></h3>
                                    <p>Menangani Sistem Informasi Penjaringan Beasiswa KIP UIN Sumatera Utara</p>
                                    <a href="https://kip.uinsu.ac.id " target="_blank"
                                        class="button radius-30 mt-2">Kunjungi <i
                                            class="lni lni-angle-double-right"></i></a>
                                </div>
                            </div>
                            <div class="single-pricing-wrapper">
                                <div class="single-pricing">
                                    <h4>UMM</h4>
                                    <h3><i class="bi bi-pencil-square"></i></h3>
                                    <p>Menangani Sistem Informasi Ujian Masuk Mandiri Online UIN Sumatera Utara</p>
                                    <a href="https://umm.uinsu.ac.id " target="_blank"
                                        class="button radius-30 mt-2">Kunjungi <i
                                            class="lni lni-angle-double-right"></i></a>
                                </div>
                            </div>
                            <div class="single-pricing-wrapper">
                                <div class="single-pricing">
                                    <h4>SI-DAHLIA</h4>
                                    <h3><i class="bi bi-info-circle-fill"></i></h3>
                                    <p>Menangani Sistem Informasi Daftar Hadir Kuliah UIN Sumatera Utara</p>
                                    <a href="https://.uinsu.ac.id " target="_blank"
                                        class="button radius-30 mt-2">Kunjungi <i
                                            class="lni lni-angle-double-right"></i></a>
                                </div>
                            </div>
                            <div class="single-pricing-wrapper">
                                <div class="single-pricing">
                                    <h4>SI-BEDJO</h4>
                                    <h3<i class="bi bi-person-video3"></i></h3>
                                        <p>Menangani Sistem Informasi Beban Kinerja Dosen UIN Sumatera Utara</p>
                                        <a href="https://sibedjo.uinsu.ac.id " target="_blank"
                                            class="button radius-30 mt-2">Kunjungi <i
                                                class="lni lni-angle-double-right"></i></a>
                                </div>
                            </div>
                            <div class="single-pricing-wrapper">
                                <div class="single-pricing">
                                    <h4>SI-RALINE</h4>
                                    <h3><i class="bi bi-person-check"></i></h3>
                                    <p>Menangani Sistem Informasi Presensi Online UIN Sumatera Utara</p>
                                    <a href="https://siraline.uinsu.ac.id " target="_blank"
                                        class="button radius-30 mt-2">Kunjungi <i
                                            class="lni lni-angle-double-right"></i></a>
                                </div>
                            </div>
                            <div class="single-pricing-wrapper">
                                <div class="single-pricing">
                                    <h4>LKP</h4>
                                    <h3><i class="bi bi-person-fill-gear"></i></h3>
                                    <p>Menangani Sistem Informasi Laporan Kinerja UIN Sumatera Utara</p>
                                    <a href="https://lkp.uinsu.ac.id " target="_blank"
                                        class="button radius-30 mt-2">Kunjungi <i
                                            class="lni lni-angle-double-right"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $.ajax({
            url: '/api/visualisasi/perbandingan',
            method: 'GET',
            success: function(response) {
                var statusData = response.Status;
                var jenisKelaminData = response["Jenis kelamin"];

                var filteredStatusData = {
                    Pendidikan: statusData.Pendidikan,
                    Pekerja: statusData.Pekerja,
                    Wirausaha: statusData.Wirausaha
                };

                var statusLabels = Object.keys(filteredStatusData);
                var statusValues = Object.values(filteredStatusData);

                var ctxStatus = document.getElementById("status").getContext("2d");
                var myPolarChart = new Chart(ctxStatus, {
                    type: "polarArea",
                    data: {
                        labels: statusLabels,
                        datasets: [{
                            backgroundColor: [
                                "rgb(10, 83, 10)",
                                "rgba(14, 153, 7, 0.919)",
                                "green"
                            ],
                            data: statusValues
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                display: true
                            }
                        }
                    }
                });

                var jkLabels = Object.keys(jenisKelaminData);
                var jkValues = Object.values(jenisKelaminData);

                var ctxJenisKelamin = document.getElementById("jenis-kelamin").getContext("2d");
                var myDoughnutChart = new Chart(ctxJenisKelamin, {
                    type: "doughnut",
                    data: {
                        labels: jkLabels,
                        datasets: [{
                            backgroundColor: [
                                "rgb(10, 83, 10)",
                                "rgba(14, 153, 7, 0.919)",
                                "green"
                            ],
                            data: jkValues
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                display: true
                            }
                        }
                    }
                });

                var pengisiData = {
                    "Pengisi": 23,
                    "Belum Mengisi": 49
                };

                var pengisiLabels = Object.keys(pengisiData);
                var pengisiValues = Object.values(pengisiData);

                var ctxPengisi = document.getElementById("pengisi").getContext("2d");
                var myDoughnutPengisiChart = new Chart(ctxPengisi, {
                    type: "doughnut",
                    data: {
                        labels: pengisiLabels,
                        datasets: [{
                            backgroundColor: [
                                "rgb(10, 83, 10)",
                                "rgba(14, 153, 7, 0.919)",
                                "green"
                            ],
                            data: pengisiValues
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                display: true
                            }
                        }
                    }
                });

                $("#jenis-kelamin").hide();
                $("#pengisi").hide();
                $("#status").show();

                $(".show-chart").click(function() {
                    var chartToShow = $(this).data("chart");
                    $("#status, #jenis-kelamin, #pengisi")
                .hide(); 
                    $("#" + chartToShow).show(); 
                });
            },
            error: function(error) {
                console.error("Terjadi kesalahan saat mengambil data:", error);
            }
        });
    });
</script>

<script>
// const avgMhsIpk = ; // Ambil data rata-rata dari backend
//     const maxIpk = 4; // Nilai maksimal IPK
    
//     const ctx = document.getElementById('myChart').getContext('2d');
//     const myChart = new Chart(ctx, {
//         type: 'doughnut', // Menggunakan grafik donat
//         data: {
//             labels: ['Rata-rata IPK Alumni'], // Label untuk data yang diisi dan sisa
//             datasets: [{
//                 data: [avgMhsIpk, maxIpk - avgMhsIpk], // Nilai rata-rata dan sisa dari max
//                 backgroundColor: [
//                     'rgba(43, 205, 129, 0.74)', // Warna bagian yang terisi (nilai rata-rata)
//                     'rgba(211, 211, 211, 0.3)', // Warna bagian sisa (belum terisi)
//                 ],
//                 borderWidth: 2
//             }]
//         },
//         options: {
//             responsive: true,
//             plugins: {
//                 legend: {
//                     position: 'bottom', // Posisi legend di bawah grafik
//                 },
//                 datalabels: {  // Plugin untuk menampilkan nilai data
//                     color: '#000', // Warna teks
//                     font: {
//                         size: 16, // Ukuran font untuk data
//                         weight: 'bold' // Tebal font
//                     },
//                     formatter: function(value, context) {
//                         if (context.dataIndex === 0) {
//                             return value.toFixed(2); // Tampilkan hanya nilai rata-rata IPK
//                         }
//                         return ''; // Jangan tampilkan apa pun untuk bagian "Sisa"
//                     },
//                     anchor: 'center',
//                     align: 'center'
//                 }
//             },
//         },
//         plugins: [ChartDataLabels] // Mengaktifkan plugin Data Labels
//     });
</script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    fetch('/api/visualisasi/perbandingan')
    .then(response => response.json())
    .then(data => {
        const alumni = document.getElementById('satisfactionCount');
        const mengisi = document.getElementById('projectsCount');

        // Helper function to round down based on magnitude
        function roundDownToPowerOfTen(num) {
            if (num === 0) return 0; // Handle edge case for 0
            if (num < 10) return 1; // Single-digit numbers round to 1
            const magnitude = Math.pow(10, Math.floor(Math.log10(num)));
            const rounded = Math.floor(num / magnitude) * magnitude;
            return rounded;
        }

        let alumniCountUp = roundDownToPowerOfTen(data.Total.Alumni);
        let mengisiCountUp = roundDownToPowerOfTen(data.Total.Pengguna);

        alumni.textContent = alumniCountUp;
        mengisi.textContent = mengisiCountUp;

        // Helper function for adaptive counter animation
        function animateCounter(start, end, element) {
            const range = end - start;
            const totalDuration = 2000; // Total duration in ms
            const steps = Math.min(100, range); // Max steps for smooth animation
            const step = Math.max(1, Math.ceil(range / steps)); // Dynamic step size
            const interval = Math.max(10, Math.floor(totalDuration / steps)); // Dynamic interval

            const animation = setInterval(() => {
                start += step;
                if (start >= end) {
                    start = end; // Snap to the final value
                    clearInterval(animation);
                }
                element.textContent = start;
            }, interval);
        }

        // Animate both counters
        animateCounter(alumniCountUp, data.Total.Alumni, alumni);
        animateCounter(mengisiCountUp, data.Total.Pengguna, mengisi);
    })
    .catch(error => {
        console.error('Terjadi kesalahan saat mengambil data:', error);
    });
});
</script>
@endpush