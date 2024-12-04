@extends('dashboard.layouts.main')

@section('content')
    <div class="container-fluid pt-4 px-4 ms-0 my-4">
        <div class="row  justify-content-center border-top border-success border-5 rounded p-4 mx-1 bg-light ">
            <div class="col-lg-12 col-sm-12  mb-4">
                <div class="row justify-content-between my-1">
                    <div class="col-lg-10 col-sm-12">
                        <span class="mb-0 h4 ">Visualisasi Data Tracer Study & Questioner</span>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-lg-12">
                        <form action="/api/visualisasi/export" method="GET" id="exportForm" target="_blank">
                            <div class="input-group">
                                <select id="exportTahunLulusSelect" name="tahun" class="form-select me-2">
                                    <option value="" selected hidden disabled>Pilih Tahun</option>
                                    @foreach ($exportOptions['tahun'] as $tahun)
                                    <option value="{{ $tahun }}">{{ $tahun }}</option>
                                    @endforeach
                                </select>
                                <select id="exportFakultasSelect" name="fakultas" class="form-select me-2">
                                    <option value="" selected hidden disabled>Pilih Fakultas</option>
                                    @foreach ($exportOptions['fakultas'] as $fakultas)
                                    <option value="{{ $fakultas }}">{{ $fakultas }}</option>
                                    @endforeach
                                </select>
                                <select name="jenisVisualisasi" id="" class="form-select me-2">
                                    <option value="" selected hidden disabled>Pilih Jenis</option>
                                    <option value="pekerja">Full Time</option>
                                    <option value="wirausaha">Wirausaha</option>
                                    <option value="pendidikan">Pendidikan</option>
                                    <option value="questioner">Kuesioner Mahasiswa</option>
                                    <option value="pekerja.detailPerusahaan.questionerStakeHolder">Kuesioner Stakeholder</option>
                                </select>
                                <button type="submit" class="btn btn-success">Export Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid  ms-0" style="padding: 0 28px;">
        <div class="row justify-content-evenly">

            <div class="col-sm-6 col-lg-4">
                <div id="card-header" class="bg-light  border-top border-success border-5  rounded d-flex align-items-center justify-content-center p-4" onclick="scrollToElement('ipk')"
                    n="1000">
                    <i class="bi bi-person-fill-gear text-primary fs-1" ></i>
                    <div class="ms-3">
                        <p class="mb-2">Visualisasi IPK</p>
                        <h6 id="ipk" class="mb-0"></h6>
                    </div>

                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div id="card-header" class="bg-light  border-top border-success border-5  rounded d-flex align-items-center justify-content-center p-4" onclick="scrollToElement('career')"
                    n="1000">
                    <i class="bi bi-person-fill-gear text-primary fs-1" ></i>
                    <div class="ms-3">
                        <p class="mb-2">Visualisasi Career</p>
                        <h6 id="career" class="mb-0"></h6>
                    </div>

                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div id="card-header" class="bg-light  border-top border-success border-5  rounded d-flex align-items-center justify-content-center p-4" onclick="scrollToElement('lama-study')"
                    n="1000">
                    <i class="bi bi-person-fill-gear text-primary fs-1" ></i>
                    <div class="ms-3">
                        <p class="mb-2">Visualisasi Lama Study</p>
                        <h6 id="lama-study" class="mb-0"></h6>
                    </div>

                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div id="card-header" class="bg-light  border-top border-success border-5  rounded d-flex align-items-center justify-content-center p-4" onclick="scrollToElement('tracer-pekerja')"
                    n="1000">
                    <i class="bi bi-person-fill-gear text-primary fs-1" ></i>
                    <div class="ms-3">
                        <p class="mb-2">Tracer Study : Pekerjaan</p>
                        <h6 id="pekerjaan" class="mb-0"></h6>
                    </div>

                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div id="card-header" class="bg-light  border-top border-success border-5 rounded d-flex align-items-center justify-content-center p-4"  onclick="scrollToElement('tracer-wirausaha')"
                    n="1000">
                    <i class="bi bi-shop-window text-primary fs-1"></i>                    
                    <div class="ms-3">
                        <p class="mb-2">Tracer Study : Wirausaha</p>
                        <h6 id="wirausaha" class="mb-0"></h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div id="card-header" class="bg-light  border-top border-success border-5 rounded d-flex align-items-center justify-content-center p-4"  onclick="scrollToElement('tracer-pendidikan')"
                    n="1000">
                    <i class="bi bi-mortarboard-fill fs-1 text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Tracer Study : Pendidikan</p>
                        <h6 id="pendidikan" class="mb-0"></h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4 my-2">
                <div id="card-header" class="bg-light  border-top border-success border-5 rounded d-flex align-items-center justify-content-center p-4 pe-5"  onclick="scrollToElement('questioner-alumni')" 
                    n="1000">
                    <i class="bi bi-person-workspace fs-1 text-primary"></i>
                    <div class="ms-3 text-start"> 
                        <p class="mb-2">Questioner : Alumni</p>
                        <h6 id="alumni" class="mb-0">94 </h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4 my-2">
                <div id="card-header" class="bg-light  border-top border-success border-5 rounded d-flex align-items-center justify-content-center p-4"  onclick="scrollToElement('questioner-stakholder')"
                    n="1000">
                    <i class="bi bi-person-vcard text-primary fs-1"></i>
                    <div class="ms-3">
                        <p class="mb-2">Questioner : Stakeholder</p>
                        <h6 id="stakeholder" class="mb-0">94 </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid pt-4 px-4 ms-0 my-4">
        <div class="row  justify-content-center border-top border-success border-5 rounded p-4 mx-1 bg-light ">
            <div class="col-lg-12 col-sm-12 align-items-center justify-content-between mb-4">
                <div class="row justify-content-between">
                    <div class="col-lg-7">
                        <span class="mb-0 h4 " id="tracer-pekerja">Tracer Study : Pekerjaan</span>
                    </div>
                    <div class="col-lg-5 col-sm-12">
                        <div class="input-group mb-3">
                            <select id="tahunLulusSelect-pekerja" class="form-select">
                                <option value="">Pilih Tahun</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                            </select>
                            @if (Auth::user()->role == 'superadmin')
                                <select id="fakultasSelect-pekerja" class="form-select">
                                    <option value="">Pilih Fakultas</option>
                                    <option value="Ushuluddin%20dan%20Studi%20Islam">Ushuluddin dan Studi Islam</option>
                                    <option value="Ekonomi%20dan%20Bisnis%20Islam">Ekonomi dan Bisnis Islam</option>
                                    <option value="Dakwah%20dan%20Komunikasi">Dakwah dan Komunikasi</option>
                                    <option value="Syariah%20dan%20Hukum">Syariah dan Hukum</option>
                                    <option value="Ilmu%20Tarbiyah%20dan%20Keguruan">Ilmu Tarbiyah dan Keguruan</option>
                                    <option value="Ilmu%20Sosial">Ilmu Sosial</option>
                                    <option value="Sains%20dan%20Teknologi">Sains dan Teknologi</option>
                                    <option value="Kesehatan%20Masyarakat">Kesehatan Masyarakat</option>
                                    <option value="Pascasarjana">Pascasarjana</option>
                                </select>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
            <div id="charts-pekerja">
                <!-- Chart dan table akan di-generate di sini oleh JavaScript -->
            </div>

        </div>

    </div>

    <div class="container-fluid pt-4 px-4 ms-0 my-4">
        <div class="row  justify-content-center border-top border-success border-5 rounded p-4 mx-1 bg-light ">
            <div class="col-lg-12 col-sm-12  align-items-center justify-content-between mb-4">
                <div class="row justify-content-between">
                    <div class="col-lg-7">
                        <span class="mb-0 h4 " id="tracer-wirausaha">Tracer Study : Wirausaha</span>
                    </div>
                    <div class="col-lg-5 col-sm-12">
                        <div class="input-group mb-3">
                            <select id="tahunLulusSelect-wirausaha" class="form-select">
                                <option value="">Pilih Tahun</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                            </select>
                            @if (Auth::user()->role == 'superadmin')
                                <select id="fakultasSelect-wirausaha" class="form-select">
                                    <option value="">Pilih Fakultas</option>
                                    <option value="Ushuluddin%20dan%20Studi%20Islam">Ushuluddin dan Studi Islam</option>
                                    <option value="Ekonomi%20dan%20Bisnis%20Islam">Ekonomi dan Bisnis Islam</option>
                                    <option value="Dakwah%20dan%20Komunikasi">Dakwah dan Komunikasi</option>
                                    <option value="Syariah%20dan%20Hukum">Syariah dan Hukum</option>
                                    <option value="Ilmu%20Tarbiyah%20dan%20Keguruan">Ilmu Tarbiyah dan Keguruan</option>
                                    <option value="Ilmu%20Sosial">Ilmu Sosial</option>
                                    <option value="Sains%20dan%20Teknologi">Sains dan Teknologi</option>
                                    <option value="Kesehatan%20Masyarakat">Kesehatan Masyarakat</option>
                                    <option value="Pascasarjana">Pascasarjana</option>
                                </select>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
            <div id="charts-wirausaha">
                <!-- Chart dan table akan di-generate di sini oleh JavaScript -->
            </div>

        </div>
    </div>

    <div class="container-fluid pt-4 px-4 ms-0 my-4">
        <div class="row  justify-content-center border-top border-success border-5 rounded p-4 mx-1 bg-light ">
            <div class="col-lg-12 col-sm-12 align-items-center justify-content-between mb-4">
                <div class="row justify-content-between">
                    <div class="col-lg-7">
                        <span class="mb-0 h4 " id="tracer-pendidikan">Tracer Study : Pendidikan</span>
                    </div>
                    <div class="col-lg-5 col-sm-12">
                        <div class="input-group mb-3">
                            <select id="tahunLulusSelect-pendidikan" class="form-select">
                                <option value="">Pilih Tahun</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                            </select>
                            @if (Auth::user()->role == 'superadmin')
                                <select id="fakultasSelect-pendidikan" class="form-select">
                                    <option value="">Pilih Fakultas</option>
                                    <option value="Ushuluddin%20dan%20Studi%20Islam">Ushuluddin dan Studi Islam</option>
                                    <option value="Ekonomi%20dan%20Bisnis%20Islam">Ekonomi dan Bisnis Islam</option>
                                    <option value="Dakwah%20dan%20Komunikasi">Dakwah dan Komunikasi</option>
                                    <option value="Syariah%20dan%20Hukum">Syariah dan Hukum</option>
                                    <option value="Ilmu%20Tarbiyah%20dan%20Keguruan">Ilmu Tarbiyah dan Keguruan</option>
                                    <option value="Ilmu%20Sosial">Ilmu Sosial</option>
                                    <option value="Sains%20dan%20Teknologi">Sains dan Teknologi</option>
                                    <option value="Kesehatan%20Masyarakat">Kesehatan Masyarakat</option>
                                    <option value="Pascasarjana">Pascasarjana</option>
                                </select>
                            @endif
                        </div>

                    </div>
                </div>
            </div>

            <div id="charts-pendidikan">
                <!-- Chart dan table akan di-generate di sini oleh JavaScript -->
            </div>

        </div>
    </div>

    <div class="container-fluid pt-4 px-4 ms-0 my-4">
        <div class="row  justify-content-center border-top border-success border-5 rounded p-4 mx-1 bg-light ">
            <div class="col-lg-12 col-sm-12 align-items-center justify-content-between mb-4">
                <div class="row justify-content-between">
                    <div class="col-lg-7">
                        <span class="mb-0 h4 " id="questioner-alumni">Questioner - Alumni</span>
                    </div>
                    <div class="col-lg-5 col-sm-12">
                        <div class="input-group mb-3">
                            <select id="tahunLulusSelect-questioner" class="form-select">
                                <option value="">Pilih Tahun</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                            </select>
                            @if (Auth::user()->role == 'superadmin')
                                <select id="fakultasSelect-questioner" class="form-select">
                                    <option value="">Pilih Fakultas</option>
                                    <option value="Ushuluddin%20dan%20Studi%20Islam">Ushuluddin dan Studi Islam</option>
                                    <option value="Ekonomi%20dan%20Bisnis%20Islam">Ekonomi dan Bisnis Islam</option>
                                    <option value="Dakwah%20dan%20Komunikasi">Dakwah dan Komunikasi</option>
                                    <option value="Syariah%20dan%20Hukum">Syariah dan Hukum</option>
                                    <option value="Ilmu%20Tarbiyah%20dan%20Keguruan">Ilmu Tarbiyah dan Keguruan</option>
                                    <option value="Ilmu%20Sosial">Ilmu Sosial</option>
                                    <option value="Sains%20dan%20Teknologi">Sains dan Teknologi</option>
                                    <option value="Kesehatan%20Masyarakat">Kesehatan Masyarakat</option>
                                    <option value="Pascasarjana">Pascasarjana</option>
                                </select>
                            @endif
                        </div>

                    </div>
                </div>
            </div>

            <div class="row my-2">
                <div class="col-12" id="urutan1">
                    <hr>
                    <span class="mb-2 h5 ">(a) Seberapa besar kompetensi di bawah ini Anda kuasai?</span>
                </div>
                <div class="row" id="questioner-a"></div>
            </div>
            <div class="row my-2">
                <div class="col-12" id="urutan1">
                    <hr>
                    <span class="mb-2 h5 ">(b) Seberapa besar kontribusi perguruan tinggi terhadap kompetensi yang Anda
                        kuasai?</span>
                </div>
                <div class="row" id="questioner-b"></div>
            </div>
            <div class="row my-2">
                <div class="col-12" id="urutan1">
                    <hr>
                    <span class="mb-2 h5 ">(c) Peningkatan kompetensi yang anda peroleh didapat paling banyak dari:</span>
                </div>
                <div class="row" id="questioner-c"></div>
            </div>
            <div class="row my-2">
                <div class="col-12" id="urutan1">
                    <hr>
                    <span class="mb-2 h5 ">(d) Seberapa besar penekanan pada aspek-aspek pembelajaran di bawah ini
                        dilaksanakan di program studi Anda?</span>
                </div>
                <div class="row" id="questioner-d"></div>
            </div>
            <div class="row my-2">
                <div class="col-12" id="urutan1">
                    <hr>
                    <span class="mb-2 h5 ">(e) Bagaimana penilaian Anda terhadap aspek belajar mengajar di bawah
                        ini?</span>
                </div>
                <div class="row" id="questioner-e"></div>
            </div>
            <div class="row my-2">
                <div class="col-12" id="urutan1">
                    <hr>
                    <span class="mb-2 h5 ">(f) Bagaimana penilaian Anda terhadap fasilitas kampus di bawah ini?</span>
                </div>
                <div class="row" id="questioner-f"></div>
            </div>
            <div class="row my-2">
                <div class="col-12" id="urutan1">
                    <hr>
                    <span class="mb-2 h5 ">(g) Seberapa besar program studi Anda bermanfaat untuk hal-hal di bawah
                        ini?</span>
                </div>
                <div class="row" id="questioner-g"></div>
            </div>
        </div>
    </div>

    <div class="container-fluid pt-4 px-4 ms-0 my-4">
        <div class="row  justify-content-center border-top border-success border-5 rounded p-4 mx-1 bg-light ">
            <div class="col-lg-12 col-sm-12 align-items-center justify-content-between mb-4">
                <div class="row justify-content-between">
                    <div class="col-lg-7">
                        <span class="mb-0 h4 " id="questioner-stakholder">Questioner : Stakholder</span>
                    </div>
                    <div class="col-lg-5 col-sm-12">
                        <div class="input-group mb-3">
                            <select id="tahunLulusSelect-questioner-stakholder" class="form-select">
                                <option value="">Pilih Tahun</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                            </select>
                            @if (Auth::user()->role == 'superadmin')
                                <select id="fakultasSelect-questioner-stakeholder" class="form-select">
                                    <option value="">Pilih Fakultas</option>
                                    <option value="Ushuluddin%20dan%20Studi%20Islam">Ushuluddin dan Studi Islam</option>
                                    <option value="Ekonomi%20dan%20Bisnis%20Islam">Ekonomi dan Bisnis Islam</option>
                                    <option value="Dakwah%20dan%20Komunikasi">Dakwah dan Komunikasi</option>
                                    <option value="Syariah%20dan%20Hukum">Syariah dan Hukum</option>
                                    <option value="Ilmu%20Tarbiyah%20dan%20Keguruan">Ilmu Tarbiyah dan Keguruan</option>
                                    <option value="Ilmu%20Sosial">Ilmu Sosial</option>
                                    <option value="Sains%20dan%20Teknologi">Sains dan Teknologi</option>
                                    <option value="Kesehatan%20Masyarakat">Kesehatan Masyarakat</option>
                                    <option value="Pascasarjana">Pascasarjana</option>
                                </select>
                            @endif
                        </div>

                    </div>
                </div>
            </div>

            <div class="row my-2">
                <div class="col-12" id="urutan1">
                    <hr>
                    <span class="mb-2 h5 ">Menurut anda, seberapa PENTINGkah hal-hal yang tertulis di bawah ini, dimiliki
                        oleh lulusan perguruan tinggi saat mereka bekerja di kantor/perusahaan anda?</span>
                </div>
                <div class="row" id="questioner-stakeholder-a"></div>
            </div>
            <div class="row my-2">
                <div class="col-12" id="urutan1">
                    <hr>
                    <span class="mb-2 h5 ">Bagaimanakah tingkat KEPUASAN anda terhadap Alumni FEBI UIN SU Medan yang
                        bekerja di kantor/perusahaan anda, tentang hal-hal di bawah ini?</span>
                </div>
                <div class="row" id="questioner-stakeholder-b"></div>
            </div>

        </div>
    </div>

    <div class="container-fluid pt-4 px-4 ms-0 my-4">
        <div class="row  justify-content-center border-top border-success border-5 rounded p-4 mx-1 bg-light ">
            <div class="col-lg-12 col-sm-12 align-items-center justify-content-between mb-4">
                <div class="row justify-content-between">
                    <div class="col-lg-7">
                        <span class="mb-0 h4 " id="ipk">Visualisasi IPK</span>
                    </div>
                    <div class="col-lg-5 col-sm-12">
                        <div class="input-group mb-3">
                            <select id="tahunLulusSelect-ipk" class="form-select">
                                <option value="">Pilih Tahun Lulus</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                            </select>
                            @if (Auth::user()->role == 'superadmin')
                                <select id="fakultasSelect-ipk" class="form-select">
                                    <option value="">Pilih Fakultas</option>
                                    <option value="Ushuluddin%20dan%20Studi%20Islam">Ushuluddin dan Studi Islam</option>
                                    <option value="Ekonomi%20dan%20Bisnis%20Islam">Ekonomi dan Bisnis Islam</option>
                                    <option value="Dakwah%20dan%20Komunikasi">Dakwah dan Komunikasi</option>
                                    <option value="Syariah%20dan%20Hukum">Syariah dan Hukum</option>
                                    <option value="Ilmu%20Tarbiyah%20dan%20Keguruan">Ilmu Tarbiyah dan Keguruan</option>
                                    <option value="Ilmu%20Sosial">Ilmu Sosial</option>
                                    <option value="Sains%20dan%20Teknologi">Sains dan Teknologi</option>
                                    <option value="Kesehatan%20Masyarakat">Kesehatan Masyarakat</option>
                                    <option value="Pascasarjana">Pascasarjana</option>
                                </select>
                                <select id="prodiSelect-ipk" class="form-select">
                                    <option value="">Pilih Prodi</option>
                                    
                                </select>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
            <div id="charts-ipk">
                <!-- Chart dan table akan di-generate di sini oleh JavaScript -->
            </div>

        </div>

    </div>

    <div class="container-fluid pt-4 px-4 ms-0 my-4">
        <div class="row  justify-content-center border-top border-success border-5 rounded p-4 mx-1 bg-light ">
            <div class="col-lg-12 col-sm-12 align-items-center justify-content-between mb-4">
                <div class="row justify-content-between">
                    <div class="col-lg-7">
                        <span class="mb-0 h4 " id="lama-study">Visualisasi Lama Study</span>
                    </div>
                    <div class="col-lg-5 col-sm-12">
                        <div class="input-group mb-3">
                            <select id="tahunLulusSelect-lama-study" class="form-select">
                                <option value="">Pilih Tahun Lulus</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                            </select>
                            @if (Auth::user()->role == 'superadmin')
                                <select id="fakultasSelect-lama-study" class="form-select">
                                    <option value="">Pilih Fakultas</option>
                                    <option value="Ushuluddin%20dan%20Studi%20Islam">Ushuluddin dan Studi Islam</option>
                                    <option value="Ekonomi%20dan%20Bisnis%20Islam">Ekonomi dan Bisnis Islam</option>
                                    <option value="Dakwah%20dan%20Komunikasi">Dakwah dan Komunikasi</option>
                                    <option value="Syariah%20dan%20Hukum">Syariah dan Hukum</option>
                                    <option value="Ilmu%20Tarbiyah%20dan%20Keguruan">Ilmu Tarbiyah dan Keguruan</option>
                                    <option value="Ilmu%20Sosial">Ilmu Sosial</option>
                                    <option value="Sains%20dan%20Teknologi">Sains dan Teknologi</option>
                                    <option value="Kesehatan%20Masyarakat">Kesehatan Masyarakat</option>
                                    <option value="Pascasarjana">Pascasarjana</option>
                                </select>
                                <select id="prodiSelect-lama-study" class="form-select">
                                    <option value="">Pilih Prodi</option>
                                    
                                </select>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
            <div id="charts-lama-study">
                <!-- Chart dan table akan di-generate di sini oleh JavaScript -->
            </div>

        </div>

    </div>

    <div class="container-fluid pt-4 px-4 ms-0 my-4">
        <div class="row  justify-content-center border-top border-success border-5 rounded p-4 mx-1 bg-light ">
            <div class="col-lg-12 col-sm-12 align-items-center justify-content-between mb-4">
                <div class="row justify-content-between">
                    <div class="col-lg-7">
                        <span class="mb-0 h4 " id="career">Visualisasi Career</span>
                    </div>
                    <div class="col-lg-5 col-sm-12">
                        <div class="input-group mb-3">                           
                            @if (Auth::user()->role == 'superadmin')
                                <select id="fakultasSelect-career" class="form-select">
                                    <option value="">Pilih Fakultas</option>
                                    <option value="Ushuluddin%20dan%20Studi%20Islam">Ushuluddin dan Studi Islam</option>
                                    <option value="Ekonomi%20dan%20Bisnis%20Islam">Ekonomi dan Bisnis Islam</option>
                                    <option value="Dakwah%20dan%20Komunikasi">Dakwah dan Komunikasi</option>
                                    <option value="Syariah%20dan%20Hukum">Syariah dan Hukum</option>
                                    <option value="Ilmu%20Tarbiyah%20dan%20Keguruan">Ilmu Tarbiyah dan Keguruan</option>
                                    <option value="Ilmu%20Sosial">Ilmu Sosial</option>
                                    <option value="Sains%20dan%20Teknologi">Sains dan Teknologi</option>
                                    <option value="Kesehatan%20Masyarakat">Kesehatan Masyarakat</option>
                                    <option value="Pascasarjana">Pascasarjana</option>
                                </select>
                                <select id="prodiSelect-career" class="form-select">
                                    <option value="">Pilih Prodi</option>
                                    
                                </select>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
            <div id="charts-career">
                <!-- Chart dan table akan di-generate di sini oleh JavaScript -->
            </div>

        </div>

    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        function scrollToElement(elementId) {
            console.log("Scrolling to element with ID:", elementId);
            var element = document.getElementById(elementId);
            if (element) {
                element.scrollIntoView({ behavior: 'smooth' });
            }
        }



        // Header
        $(document).ready(function() {
            var userFakultas = "{{ Auth::user()->fakultas }}";
            var fakultasMap = {
                'Ushuluddin dan Studi Islam': 'Ushuluddin%20dan%20Studi%20Islam',
                'Ekonomi dan Bisnis Islam': 'Ekonomi%20dan%20Bisnis%20Islam',
                'Dakwah dan Komunikasi': 'Dakwah%20dan%20Komunikasi',
                'Syariah dan Hukum': 'Syariah%20dan%20Hukum',
                'Ilmu Tarbiyah dan Keguruan': 'Ilmu%20Tarbiyah%20dan%20Keguruan',
                'Ilmu Sosial': 'Ilmu%20Sosial',
                'Sains dan Teknologi': 'Sains%20dan%20Teknologi',
                'Kesehatan Masyarakat': 'Kesehatan%20Masyarakat',
                'Pascasarjana': 'Pascasarjana'
            };

            function updatePekerjaan() {
                var baseUrl = '/api/visualisasi/perbandingan';
                var params = [];

                if (userFakultas !== "" && fakultasMap.hasOwnProperty(userFakultas)) {
                    params.push(`fakultas=${fakultasMap[userFakultas]}`);
                }

                var url = baseUrl;
                if (params.length > 0) {
                    url += '?' + params.join('&');
                }

                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function(response) {
                        var pekerjaanCount = response.Status.Pekerja || 0;
                        var pendidikanCount = response.Status.Pendidikan || 0;
                        var wirausahaCount = response.Status.Wirausaha || 0;
                        var alumniCount = response.Status["Questioner Alumni"] || 0;
                        var stakeholderCount = response.Status["Questioner Stakeholder"] || 0;

                        $('#pekerjaan').text(pekerjaanCount);
                        $('#pendidikan').text(pendidikanCount);
                        $('#wirausaha').text(wirausahaCount);
                        $('#alumni').text(alumniCount);
                        $('#stakeholder').text(stakeholderCount);
                    },
                    error: function(error) {
                        console.error('Error fetching data:', error);
                    }
                });
            }

            updatePekerjaan();
        });

        // Chart Pekerja, Wirausaha & Pendidikan
        $(document).ready(function() {
            function fetchData(type) {
                var thnlulus = $(`#tahunLulusSelect-${type}`).val();
                var fakultas = $(`#fakultasSelect-${type}`).val();
                var baseUrl = `/api/visualisasi/${type}`;
                var userFakultas = "{{ Auth::user()->fakultas }}";
                var fakultasMap = {
                    'Ushuluddin dan Studi Islam': 'Ushuluddin%20dan%20Studi%20Islam',
                    'Ekonomi dan Bisnis Islam': 'Ekonomi%20dan%20Bisnis%20Islam',
                    'Dakwah dan Komunikasi': 'Dakwah%20dan%20Komunikasi',
                    'Syariah dan Hukum': 'Syariah%20dan%20Hukum',
                    'Ilmu Tarbiyah dan Keguruan': 'Ilmu%20Tarbiyah%20dan%20Keguruan',
                    'Ilmu Sosial': 'Ilmu%20Sosial',
                    'Sains dan Teknologi': 'Sains%20dan%20Teknologi',
                    'Kesehatan Masyarakat': 'Kesehatan%20Masyarakat',
                    'Pascasarjana': 'Pascasarjana'
                };
                var params = [];

                if (fakultas) {
                    params.push(`fakultas=${fakultas}`);
                } else if (fakultasMap[userFakultas]) {
                    params.push(`fakultas=${fakultasMap[userFakultas]}`);
                }

                if (thnlulus) {
                    params.push(`lulus=${thnlulus}`);
                }

                var url = params.length ? `${baseUrl}?${params.join('&')}` : baseUrl;

                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function(response) {
                        $(`#charts-${type}`).empty();

                        var chartsConfig = {
                            pekerja: [{
                                    id: 'kriteriaPekerjaan',
                                    title: 'Kriteria Pekerjaan',
                                    dataKey: 'Kriteria Pekerjaan'
                                },
                                {
                                    id: 'bidangPekerjaan',
                                    title: 'Bidang Pekerjaan',
                                    dataKey: 'Bidang Pekerjaan'
                                },
                                {
                                    id: 'tingkatPekerjaan',
                                    title: 'Tingkat / Ukuran Tempat Bekerja',
                                    dataKey: 'Tingkat / Ukuran Tempat Bekerja'
                                },
                                {
                                    id: 'jabatanPekerjaan',
                                    title: 'Jabatan Pekerjaan',
                                    dataKey: 'Jabatan Pekerjaan'
                                },
                                {
                                    id: 'pendapatanPekerjaan',
                                    title: 'Pendapatan',
                                    dataKey: 'Pendapatan'
                                },
                                {
                                    id: 'kesesuaianPekerjaan',
                                    title: 'Kesesuaian Pekerjaan dengan Prodi',
                                    dataKey: 'Kesesuaian Pekerjaan dengan Prodi'
                                }
                            ],
                            wirausaha: [{
                                    id: 'tingkatWirausaha',
                                    title: 'Tingkat / Ukuran Tempat Usaha',
                                    dataKey: 'Tingkat / Ukuran Tempat Usaha'
                                },
                                {
                                    id: 'pemodalWirausaha',
                                    title: 'Pemodal Usaha',
                                    dataKey: 'Pemodal Usaha'
                                },
                                {
                                    id: 'bidangWirausaha',
                                    title: 'Bidang Usaha',
                                    dataKey: 'Bidang Usaha'
                                },
                                {
                                    id: 'omsetWirausaha',
                                    title: 'Omset',
                                    dataKey: 'Omset'
                                },
                                {
                                    id: 'jumlahWirausaha',
                                    title: 'Pendapatan',
                                    dataKey: 'Pendapatan'
                                },
                                {
                                    id: 'kesesuaianWirausaha',
                                    title: 'Kesesuaian Usaha dengan Prodi',
                                    dataKey: 'Kesesuaian Usaha dengan Prodi'
                                }
                            ],
                            pendidikan: [{
                                    id: 'aktifPendidikan',
                                    title: 'Aktif Pendidikan',
                                    dataKey: 'is_studying'
                                },
                                {
                                    id: 'tingkatPendidikan',
                                    title: 'Tingkat Pendidikan',
                                    dataKey: 'Tingkat Pendidikan'
                                },
                                {
                                    id: 'penerimaanPendidikan',
                                    title: 'Tgl Surat Penerimaan Pendidikan',
                                    dataKey: 'Tgl Surat Penerimaan Pendidikan'
                                },
                                {
                                    id: 'mulaiPendidikan',
                                    title: 'Tgl Mulai Pendidikan',
                                    dataKey: 'Tgl Mulai Pendidikan'
                                },
                                {
                                    id: 'linearPendidikan',
                                    title: 'Satu Linear',
                                    dataKey: 'Satu Linear'
                                }
                            ]
                        };

                        chartsConfig[type].forEach(function(chart) {
                            $(`#charts-${type}`).append(
                                `<div class="row my-2">
                            <div class="col-12" >
                                <hr>
                                <span class="mb-2 h5">${chart.title}</span>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 p-2" >
                                <canvas id="${chart.id}Chart" width="400" height="400"></canvas>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12" >
                                <div class="table-responsive">
                                    <table id="${chart.id}Table" class="table text-start align-middle border table-striped table-hover mb-0">
                                        <thead class="wow fadeInUp" >
                                            <tr class="text-dark" style="font-weight:700;">
                                                <th scope="col">No</th>
                                                <th scope="col">Kriteria</th>
                                                <th scope="col">Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody class="wow fadeInUp" ></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>`
                            );
                            createChartAndTable(`${chart.id}Chart`, `${chart.id}Table`,
                                response[chart.dataKey], chart.title);
                        });
                    },
                    error: function(error) {
                        console.error('Error fetching data:', error);
                    }
                });
            }

            function createChartAndTable(chartId, tableId, data, label) {
                const labels = Object.keys(data);
                const values = Object.values(data);
                const total = values.reduce((acc, val) => acc + val, 0);
                const percentages = values.map(value => ((value / total) * 100).toFixed(2) + '%');
                const ctx = document.getElementById(chartId).getContext('2d');

                new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: labels.map((label, index) => label + ' (' + percentages[index] + ')'),
                        datasets: [{
                            label: label,
                            data: values,
                            backgroundColor: [
                                'rgb(0 157 84 / 74%)',
                                'rgb(2 117 64 / 74%)',
                                'rgb(2 81 44 / 74%)',
                                'rgb(43 205 129 / 74%)',
                                'rgb(0 177 4 / 74%)',
                                'rgb(0 127 4 / 74%)',
                                'rgb(2 117 5 / 74%))'
                            ],
                            borderColor: ['#fff'],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top'
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        let label = context.label || '';
                                        if (label) {
                                            label += ': ';
                                        }
                                        if (context.raw !== null) {
                                            label += context.raw;
                                        }
                                        return label;
                                    }
                                }
                            }
                        }
                    }
                });

                $(`#${tableId} tbody`).empty();
                labels.forEach((label, index) => {
                    $(`#${tableId} tbody`).append(
                        `<tr>
                    <td>${index + 1}</td>
                    <td>${label}</td>
                    <td>${values[index]}</td>
                </tr>`
                    );
                });
            }

            ['pekerja', 'wirausaha', 'pendidikan'].forEach(type => {
                $(`#tahunLulusSelect-${type}`).change(() => fetchData(type));
                $(`#fakultasSelect-${type}`).change(() => fetchData(type));
                fetchData(type);
            });
        });

        // Chart Questioner Alumni & Stakeholder
        var userFakultas = "{{ Auth::user()->fakultas }}";

        function fetchAndRenderCharts(category, containerId, startIndex, apiUrl, tahunSelectId, fakultasSelectId) {
            var thnlulus = $(tahunSelectId).val();
            var fakultas = $(fakultasSelectId).val();
            var fakultasMap = {
                'Ushuluddin dan Studi Islam': 'Ushuluddin%20dan%20Studi%20Islam',
                'Ekonomi dan Bisnis Islam': 'Ekonomi%20dan%20Bisnis%20Islam',
                'Dakwah dan Komunikasi': 'Dakwah%20dan%20Komunikasi',
                'Syariah dan Hukum': 'Syariah%20dan%20Hukum',
                'Ilmu Tarbiyah dan Keguruan': 'Ilmu%20Tarbiyah%20dan%20Keguruan',
                'Ilmu Sosial': 'Ilmu%20Sosial',
                'Sains dan Teknologi': 'Sains%20dan%20Teknologi',
                'Kesehatan Masyarakat': 'Kesehatan%20Masyarakat',
                'Pascasarjana': 'Pascasarjana'
            };

            var url = apiUrl;
            var params = [];

            if (userFakultas !== "" && fakultasMap.hasOwnProperty(userFakultas)) {
                params.push(`fakultas=${fakultasMap[userFakultas]}`);
            } else if (fakultas) {
                params.push(`fakultas=${fakultas}`);
            }

            if (thnlulus) {
                params.push(`lulus=${thnlulus}`);
            }

            if (params.length > 0) {
                url += '?' + params.join('&');
            }

            $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {
                    const competencies = response[category];
                    if (!competencies) {
                        console.error('No data found for the given filters.');
                        return;
                    }
                    Object.entries(competencies).forEach(([competency, data], index) => {
                        const chartId = `chart-${startIndex + index}`;
                        $(`#${containerId}`).append(`
                    <div class="col-lg-4 col-md-4 col-sm-12 p-2">
                        <span style="font-size:0.8rem;">${index + 1}. ${competency}</span>
                        <canvas id="${chartId}" width="400" height="400"></canvas>
                    </div>
                `);
                        createChart(chartId, data, competency);
                    });
                },
                error: function(error) {
                    console.error('Error fetching data:', error);
                }
            });
        }

        function createChart(chartId, data, label) {
            const ctx = document.getElementById(chartId).getContext('2d');
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: Object.keys(data),
                    datasets: [{
                        label: label,
                        data: Object.values(data),
                        backgroundColor: [
                            'rgba(0, 157, 84, 0.74)',
                            'rgba(2, 117, 64, 0.74)',
                            'rgba(2, 81, 44, 0.74)',
                            'rgba(43, 205, 129, 0.74)',
                            'rgba(0, 177, 4, 0.74)',
                            'rgba(0, 127, 4, 0.74)',
                            'rgba(2, 117, 5, 0.74)'
                        ],
                        borderColor: ['#fff'],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top'
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let label = context.label || '';
                                    if (label) label += ': ';
                                    if (context.raw !== null) label += context.raw;
                                    return label;
                                }
                            }
                        }
                    }
                }
            });
        }

        $(document).ready(function() {
            const questionerCategories = [{
                    category: "(a) Seberapa besar kompetensi di bawah ini Anda kuasai?",
                    containerId: "questioner-a",
                    startIndex: 1
                },
                {
                    category: "(b) Seberapa besar kontribusi perguruan tinggi terhadap kompetensi yang Anda kuasai?",
                    containerId: "questioner-b",
                    startIndex: 19
                },
                {
                    category: "(c) Peningkatan kompetensi yang anda peroleh didapat paling banyak dari:",
                    containerId: "questioner-c",
                    startIndex: 37
                },
                {
                    category: "(d) Seberapa besar penekanan pada aspek-aspek pembelajaran di bawah ini dilaksanakan di program studi Anda?",
                    containerId: "questioner-d",
                    startIndex: 38
                },
                {
                    category: "(e) Bagaimana penilaian Anda terhadap aspek belajar mengajar di bawah ini?",
                    containerId: "questioner-e",
                    startIndex: 43
                },
                {
                    category: "(f) Bagaimana penilaian Anda terhadap fasilitas kampus di bawah ini?",
                    containerId: "questioner-f",
                    startIndex: 48
                },
                {
                    category: "(g) Seberapa besar program studi Anda bermanfaat untuk hal-hal di bawah ini?",
                    containerId: "questioner-g",
                    startIndex: 58
                }
            ];

            const stakeholderCategories = [{
                    category: "(e)Menurut anda, seberapa PENTINGkah hal-hal yang tertulis di bawah ini, dimiliki oleh lulusan perguruan tinggi saat mereka bekerja di kantor/perusahaan anda?",
                    containerId: "questioner-stakeholder-a",
                    startIndex: 112
                },
                {
                    category: "(f) Bagaimanakah tingkat KEPUASAN anda terhadap Alumni FEBI UIN SU Medan yang bekerja di kantor/perusahaan anda, tentang hal-hal di bawah ini?",
                    containerId: "questioner-stakeholder-b",
                    startIndex: 192
                }
            ];

            function reloadCharts(categories, apiUrl, tahunSelectId, fakultasSelectId) {
                categories.forEach(({
                    category,
                    containerId,
                    startIndex
                }) => {
                    $(`#${containerId}`).empty();
                    fetchAndRenderCharts(category, containerId, startIndex, apiUrl, tahunSelectId,
                        fakultasSelectId);
                });
            }

            questionerCategories.forEach(({
                category,
                containerId,
                startIndex
            }) => {
                fetchAndRenderCharts(category, containerId, startIndex,
                    '/api/visualisasi/questioner', '#tahunLulusSelect-questioner',
                    '#fakultasSelect-questioner');
            });

            stakeholderCategories.forEach(({
                category,
                containerId,
                startIndex
            }) => {
                fetchAndRenderCharts(category, containerId, startIndex,
                    '/api/visualisasi/stakeholder',
                    '#tahunLulusSelect-questioner-stakeholder', '#fakultasSelect-questioner-stakeholder'
                );
            });

            $('#tahunLulusSelect-questioner, #fakultasSelect-questioner').on('change', function() {
                reloadCharts(questionerCategories, '/api/visualisasi/questioner',
                    '#tahunLulusSelect-questioner', '#fakultasSelect-questioner');
            });

            $('#tahunLulusSelect-questioner-stakeholder, #fakultasSelect-questioner-stakeholder').on('change',
                function() {
                    reloadCharts(stakeholderCategories, '/api/visualisasi/stakeholder',
                        '#tahunLulusSelect-questioner-stakeholder', '#fakultasSelect-questioner-stakeholder'
                    );
                });
        });
    </script>
@endsection