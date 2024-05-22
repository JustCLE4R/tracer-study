@extends('dashboard.layouts.main')

@section('content')
    <div class="container-fluid pt-4 px-4 ms-0 my-4">
        <div class="row  justify-content-center border-top border-success border-5 rounded p-4 mx-1 bg-light ">
            <div class="col-lg-12 col-sm-12 d-flex align-items-center justify-content-between mb-4">
                <span class="mb-0 h4 ">Visualisasi Data Tracer Study & Questioner</span>
                <a href="/dashboard" class="btn btn-success">Kembali</a>
            </div>

            {{-- <div class="row my-2">
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-12 wow fadeInUp" id="urutan1">
                    <hr>
                    <span class="mb-2 h5 ">Kriteria Pekerjaan</span>
                </div>
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-lg-6 col-md-6 col-sm-12 p-2  wow fadeInUp ">
                    <canvas id="kriteriaPekerjaanChart" width="400" height="400"></canvas>
                </div>
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-lg-6 col-md-6 col-sm-12  wow fadeInUp"
                    id="urutan3">
                    <div class="table-responsive">
                        <table id="kriteriaPekerjaanTable"
                            class="table text-start align-middle border table-striped table-hover mb-0">
                            <thead data-wow-duration="1s" data-wow-delay="0.9s" class="wow fadeInUp">
                                <tr class="text-dark" style="font-weight:700;">
                                </tr>
                            </thead>
                            <tbody data-wow-duration="1s" data-wow-delay="0.9s" class="wow fadeInUp">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> --}}

        </div>
    </div>

    <div class="container-fluid pt-4 px-4 ms-0 my-4">
        <div class="row  justify-content-center border-top border-success border-5 rounded p-4 mx-1 bg-light ">
            <div class="col-lg-12 col-sm-12 d-flex align-items-center justify-content-between mb-4">
                <span class="mb-0 h4 ">Visualisasi Data Tracer Study Pekerjaan</span>
            </div>
            <div class="row my-2">
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-12 wow fadeInUp" id="urutan1">
                    <hr>
                    <span class="mb-2 h5 ">Kriteria Pekerjaan</span>
                </div>
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-lg-6 col-md-6 col-sm-12 p-2  wow fadeInUp ">
                    <canvas id="kriteriaPekerjaanChart" width="400" height="400"></canvas>
                </div>
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-lg-6 col-md-6 col-sm-12  wow fadeInUp"
                    id="urutan3">
                    <div class="table-responsive">
                        <table id="kriteriaPekerjaanTable"
                            class="table text-start align-middle border table-striped table-hover mb-0">
                            <thead data-wow-duration="1s" data-wow-delay="0.9s" class="wow fadeInUp">
                                <tr class="text-dark" style="font-weight:700;">
                                </tr>
                            </thead>
                            <tbody data-wow-duration="1s" data-wow-delay="0.9s" class="wow fadeInUp">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row my-2">
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-12 wow fadeInUp" id="urutan1">
                    <hr>
                    <span class="mb-2 h5 ">Bidang Pekerjaan</span>
                </div>
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-lg-6 col-md-6 col-sm-12 p-2 wow fadeInUp ">
                    <canvas id="bidangPekerjaanChart" width="400" height="400"></canvas>
                </div>
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-lg-6 col-md-6 col-sm-12  wow fadeInUp"
                    id="urutan3">
                    <div class="table-responsive">
                        <table id="bidangPekerjaanTable"
                            class="table text-start align-middle border table-striped table-hover mb-0">
                            <thead data-wow-duration="1s" data-wow-delay="0.9s" class="wow fadeInUp">
                                <tr class="text-dark" style="font-weight:700;">
                                </tr>
                            </thead>
                            <tbody data-wow-duration="1s" data-wow-delay="0.9s" class="wow fadeInUp">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row my-2">
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-12 wow fadeInUp" id="urutan1">
                    <hr>
                    <span class="mb-2 h5 ">Tingkat / Ukuran Tempat Bekerja</span>
                </div>
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-lg-6 col-md-6 col-sm-12 p-2 wow fadeInUp ">
                    <canvas id="tingkatPekerjaanChart" width="400" height="400"></canvas>
                </div>
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-lg-6 col-md-6 col-sm-12  wow fadeInUp"
                    id="urutan3">
                    <div class="table-responsive">
                        <table id="tingkatPekerjaanTable"
                            class="table text-start align-middle border table-striped table-hover mb-0">
                            <thead data-wow-duration="1s" data-wow-delay="0.9s" class="wow fadeInUp">
                                <tr class="text-dark" style="font-weight:700;">
                                </tr>
                            </thead>
                            <tbody data-wow-duration="1s" data-wow-delay="0.9s" class="wow fadeInUp">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row my-2">
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-12 wow fadeInUp" id="urutan1">
                    <hr>
                    <span class="mb-2 h5 ">Jabatan Pekerjaan</span>
                </div>
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-lg-6 col-md-6 col-sm-12 p-2 wow fadeInUp ">
                    <canvas id="jabatanPekerjaanChart" width="400" height="400"></canvas>
                </div>
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-lg-6 col-md-6 col-sm-12  wow fadeInUp"
                    id="urutan3">
                    <div class="table-responsive">
                        <table id="jabatanPekerjaanTable"
                            class="table text-start align-middle border table-striped table-hover mb-0">
                            <thead data-wow-duration="1s" data-wow-delay="0.9s" class="wow fadeInUp">
                                <tr class="text-dark" style="font-weight:700;">
                                </tr>
                            </thead>
                            <tbody data-wow-duration="1s" data-wow-delay="0.9s" class="wow fadeInUp">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row my-2">
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-12 wow fadeInUp" id="urutan1">
                    <hr>
                    <span class="mb-2 h5 ">Pendapatan</span>
                </div>
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-lg-6 col-md-6 col-sm-12 p-2 wow fadeInUp ">
                    <canvas id="pendapatanPekerjaanChart" width="400" height="400"></canvas>
                </div>
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-lg-6 col-md-6 col-sm-12  wow fadeInUp"
                    id="urutan3">
                    <div class="table-responsive">
                        <table id="pendapatanPekerjaanTable"
                            class="table text-start align-middle border table-striped table-hover mb-0">
                            <thead data-wow-duration="1s" data-wow-delay="0.9s" class="wow fadeInUp">
                                <tr class="text-dark" style="font-weight:700;">
                                </tr>
                            </thead>
                            <tbody data-wow-duration="1s" data-wow-delay="0.9s" class="wow fadeInUp">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row my-2">
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-12 wow fadeInUp" id="urutan1">
                    <hr>
                    <span class="mb-2 h5 ">Kesesuaian Pekerjaan dengan Prodi</span>
                </div>
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-lg-6 col-md-6 col-sm-12 p-2 wow fadeInUp ">
                    <canvas id="kesesuaianPekerjaanChart" width="400" height="400"></canvas>
                </div>
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-lg-6 col-md-6 col-sm-12  wow fadeInUp"
                    id="urutan3">
                    <div class="table-responsive">
                        <table id="kesesuaianPekerjaanTable"
                            class="table text-start align-middle border table-striped table-hover mb-0">
                            <thead data-wow-duration="1s" data-wow-delay="0.9s" class="wow fadeInUp">
                                <tr class="text-dark" style="font-weight:700;">
                                </tr>
                            </thead>
                            <tbody data-wow-duration="1s" data-wow-delay="0.9s" class="wow fadeInUp">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <div class="container-fluid pt-4 px-4 ms-0 my-4">
        <div class="row  justify-content-center border-top border-success border-5 rounded p-4 mx-1 bg-light ">
            <div class="col-lg-12 col-sm-12 d-flex align-items-center justify-content-between mb-4">
                <span class="mb-0 h4 ">Visualisasi Data Tracer Study Wirausaha</span>
            </div>

            <div class="row my-2">
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-12 wow fadeInUp" id="urutan1">
                    <hr>
                    <span class="mb-2 h5 ">Tingkat / Ukuran Tempat Usaha</span>
                </div>
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-lg-6 col-md-6 col-sm-12 p-2  wow fadeInUp ">
                    <canvas id="tingkatWirausahaChart" width="400" height="400"></canvas>
                </div>
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-lg-6 col-md-6 col-sm-12  wow fadeInUp"
                    id="urutan3">
                    <div class="table-responsive">
                        <table id="tingkatWirausahaTable"
                            class="table text-start align-middle border table-striped table-hover mb-0">
                            <thead data-wow-duration="1s" data-wow-delay="0.9s" class="wow fadeInUp">
                                <tr class="text-dark" style="font-weight:700;">
                                </tr>
                            </thead>
                            <tbody data-wow-duration="1s" data-wow-delay="0.9s" class="wow fadeInUp">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row my-2">
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-12 wow fadeInUp" id="urutan1">
                    <hr>
                    <span class="mb-2 h5 ">Pemodal Usaha</span>
                </div>
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-lg-6 col-md-6 col-sm-12 p-2  wow fadeInUp ">
                    <canvas id="pemodalWirausahaChart" width="400" height="400"></canvas>
                </div>
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-lg-6 col-md-6 col-sm-12  wow fadeInUp"
                    id="urutan3">
                    <div class="table-responsive">
                        <table id="pemodalWirausahaTable"
                            class="table text-start align-middle border table-striped table-hover mb-0">
                            <thead data-wow-duration="1s" data-wow-delay="0.9s" class="wow fadeInUp">
                                <tr class="text-dark" style="font-weight:700;">
                                </tr>
                            </thead>
                            <tbody data-wow-duration="1s" data-wow-delay="0.9s" class="wow fadeInUp">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row my-2">
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-12 wow fadeInUp" id="urutan1">
                    <hr>
                    <span class="mb-2 h5 ">Bidang Usaha</span>
                </div>
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-lg-6 col-md-6 col-sm-12 p-2  wow fadeInUp ">
                    <canvas id="bidangWirausahaChart" width="400" height="400"></canvas>
                </div>
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-lg-6 col-md-6 col-sm-12  wow fadeInUp"
                    id="urutan3">
                    <div class="table-responsive">
                        <table id="bidangWirausahaTable"
                            class="table text-start align-middle border table-striped table-hover mb-0">
                            <thead data-wow-duration="1s" data-wow-delay="0.9s" class="wow fadeInUp">
                                <tr class="text-dark" style="font-weight:700;">
                                </tr>
                            </thead>
                            <tbody data-wow-duration="1s" data-wow-delay="0.9s" class="wow fadeInUp">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row my-2">
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-12 wow fadeInUp" id="urutan1">
                    <hr>
                    <span class="mb-2 h5 ">Pendapatan Perbulan (Omset Penjualan)</span>
                </div>
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-lg-6 col-md-6 col-sm-12 p-2  wow fadeInUp ">
                    <canvas id="omsetWirausahaChart" width="400" height="400"></canvas>
                </div>
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-lg-6 col-md-6 col-sm-12  wow fadeInUp"
                    id="urutan3">
                    <div class="table-responsive">
                        <table id="omsetWirausahaTable"
                            class="table text-start align-middle border table-striped table-hover mb-0">
                            <thead data-wow-duration="1s" data-wow-delay="0.9s" class="wow fadeInUp">
                                <tr class="text-dark" style="font-weight:700;">
                                </tr>
                            </thead>
                            <tbody data-wow-duration="1s" data-wow-delay="0.9s" class="wow fadeInUp">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row my-2">
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-12 wow fadeInUp" id="urutan1">
                    <hr>
                    <span class="mb-2 h5 ">Jumlah Pendapatan Bersih Perbulan</span>
                </div>
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-lg-6 col-md-6 col-sm-12 p-2  wow fadeInUp ">
                    <canvas id="jumlahWirausahaChart" width="400" height="400"></canvas>
                </div>
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-lg-6 col-md-6 col-sm-12  wow fadeInUp"
                    id="urutan3">
                    <div class="table-responsive">
                        <table id="jumlahWirausahaTable"
                            class="table text-start align-middle border table-striped table-hover mb-0">
                            <thead data-wow-duration="1s" data-wow-delay="0.9s" class="wow fadeInUp">
                                <tr class="text-dark" style="font-weight:700;">
                                </tr>
                            </thead>
                            <tbody data-wow-duration="1s" data-wow-delay="0.9s" class="wow fadeInUp">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row my-2">
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-12 wow fadeInUp" id="urutan1">
                    <hr>
                    <span class="mb-2 h5 ">Kesesuaian Usaha dengan Prodi</span>
                </div>
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-lg-6 col-md-6 col-sm-12 p-2  wow fadeInUp ">
                    <canvas id="kesesuaianWirausahaChart" width="400" height="400"></canvas>
                </div>
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-lg-6 col-md-6 col-sm-12  wow fadeInUp"
                    id="urutan3">
                    <div class="table-responsive">
                        <table id="kesesuaianWirausahaTable"
                            class="table text-start align-middle border table-striped table-hover mb-0">
                            <thead data-wow-duration="1s" data-wow-delay="0.9s" class="wow fadeInUp">
                                <tr class="text-dark" style="font-weight:700;">
                                </tr>
                            </thead>
                            <tbody data-wow-duration="1s" data-wow-delay="0.9s" class="wow fadeInUp">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container-fluid pt-4 px-4 ms-0 my-4">
        <div class="row  justify-content-center border-top border-success border-5 rounded p-4 mx-1 bg-light ">
            <div class="col-lg-12 col-sm-12 d-flex align-items-center justify-content-between mb-4">
                <span class="mb-0 h4 ">Visualisasi Data Tracer Study Pendidikan</span>
            </div>

            <div class="row my-2">
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-12 wow fadeInUp" id="urutan1">
                    <hr>
                    <span class="mb-2 h5 ">Alumni Yang Melanjutkan Pendidikan</span>
                </div>
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-lg-6 col-md-6 col-sm-12 p-2  wow fadeInUp ">
                    <canvas id="aktifPendidikanChart" width="400" height="400"></canvas>
                </div>
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-lg-6 col-md-6 col-sm-12  wow fadeInUp"
                    id="urutan3">
                    <div class="table-responsive">
                        <table id="aktifPendidikanTable"
                            class="table text-start align-middle border table-striped table-hover mb-0">
                            <thead data-wow-duration="1s" data-wow-delay="0.9s" class="wow fadeInUp">
                                <tr class="text-dark" style="font-weight:700;">
                                </tr>
                            </thead>
                            <tbody data-wow-duration="1s" data-wow-delay="0.9s" class="wow fadeInUp">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row my-2">
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-12 wow fadeInUp" id="urutan1">
                    <hr>
                    <span class="mb-2 h5 ">Tingkat Pendidikan</span>
                </div>
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-lg-6 col-md-6 col-sm-12 p-2  wow fadeInUp ">
                    <canvas id="tingkatPendidikanChart" width="400" height="400"></canvas>
                </div>
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-lg-6 col-md-6 col-sm-12  wow fadeInUp"
                    id="urutan3">
                    <div class="table-responsive">
                        <table id="tingkatPendidikanTable"
                            class="table text-start align-middle border table-striped table-hover mb-0">
                            <thead data-wow-duration="1s" data-wow-delay="0.9s" class="wow fadeInUp">
                                <tr class="text-dark" style="font-weight:700;">
                                </tr>
                            </thead>
                            <tbody data-wow-duration="1s" data-wow-delay="0.9s" class="wow fadeInUp">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row my-2">
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-12 wow fadeInUp" id="urutan1">
                    <hr>
                    <span class="mb-2 h5 ">Tahun Penerimaan Pendidikan</span>
                </div>
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-lg-6 col-md-6 col-sm-12 p-2  wow fadeInUp ">
                    <canvas id="penerimaanPendidikanChart" width="400" height="400"></canvas>
                </div>
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-lg-6 col-md-6 col-sm-12  wow fadeInUp"
                    id="urutan3">
                    <div class="table-responsive">
                        <table id="penerimaanPendidikanTable"
                            class="table text-start align-middle border table-striped table-hover mb-0">
                            <thead data-wow-duration="1s" data-wow-delay="0.9s" class="wow fadeInUp">
                                <tr class="text-dark" style="font-weight:700;">
                                </tr>
                            </thead>
                            <tbody data-wow-duration="1s" data-wow-delay="0.9s" class="wow fadeInUp">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row my-2">
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-12 wow fadeInUp" id="urutan1">
                    <hr>
                    <span class="mb-2 h5 ">Tahun Mulai Pendidikan</span>
                </div>
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-lg-6 col-md-6 col-sm-12 p-2  wow fadeInUp ">
                    <canvas id="mulaiPendidikanChart" width="400" height="400"></canvas>
                </div>
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-lg-6 col-md-6 col-sm-12  wow fadeInUp"
                    id="urutan3">
                    <div class="table-responsive">
                        <table id="mulaiPendidikanTable"
                            class="table text-start align-middle border table-striped table-hover mb-0">
                            <thead data-wow-duration="1s" data-wow-delay="0.9s" class="wow fadeInUp">
                                <tr class="text-dark" style="font-weight:700;">
                                </tr>
                            </thead>
                            <tbody data-wow-duration="1s" data-wow-delay="0.9s" class="wow fadeInUp">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row my-2">
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-12 wow fadeInUp" id="urutan1">
                    <hr>
                    <span class="mb-2 h5 ">Program Studi Satu Linear</span>
                </div>
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-lg-6 col-md-6 col-sm-12 p-2  wow fadeInUp ">
                    <canvas id="linearPendidikanChart" width="400" height="400"></canvas>
                </div>
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-lg-6 col-md-6 col-sm-12  wow fadeInUp"
                    id="urutan3">
                    <div class="table-responsive">
                        <table id="linearPendidikanTable"
                            class="table text-start align-middle border table-striped table-hover mb-0">
                            <thead data-wow-duration="1s" data-wow-delay="0.9s" class="wow fadeInUp">
                                <tr class="text-dark" style="font-weight:700;">
                                </tr>
                            </thead>
                            <tbody data-wow-duration="1s" data-wow-delay="0.9s" class="wow fadeInUp">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container-fluid pt-4 px-4 ms-0 my-4">
        <div class="row  justify-content-center border-top border-success border-5 rounded p-4 mx-1 bg-light ">
            <div class="col-lg-12 col-sm-12 d-flex align-items-center justify-content-between mb-4">
                <span class="mb-0 h4 ">Visualisasi Data Questioner</span>
                <a href="/dashboard" class="btn btn-success">Kembali</a>
            </div>

            <div class="row my-2">
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-12 wow fadeInUp" id="urutan1">
                    <hr>
                    <span class="mb-2 h5 ">Kriteria Pekerjaan</span>
                </div>
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-lg-6 col-md-6 col-sm-12 p-2  wow fadeInUp ">
                    <canvas id="kriteriaPekerjaanChart" width="400" height="400"></canvas>
                </div>
                <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-lg-6 col-md-6 col-sm-12  wow fadeInUp"
                    id="urutan3">
                    <div class="table-responsive">
                        <table id="kriteriaPekerjaanTable"
                            class="table text-start align-middle border table-striped table-hover mb-0">
                            <thead data-wow-duration="1s" data-wow-delay="0.9s" class="wow fadeInUp">
                                <tr class="text-dark" style="font-weight:700;">
                                </tr>
                            </thead>
                            <tbody data-wow-duration="1s" data-wow-delay="0.9s" class="wow fadeInUp">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $.ajax({
                url: 'http://127.0.0.1:8000/api/visualisasi/pekerja',
                method: 'GET',
                success: function(response) {
                    function createChartAndTable(chartId, tableId, data, label) {
                        const labels = Object.keys(data);
                        const values = Object.values(data);
                        const total = values.reduce((acc, val) => acc + val, 0);
                        const percentages = values.map(value => ((value / total) * 100).toFixed(2) +
                            '%');

                        const ctx = document.getElementById(chartId).getContext('2d');
                        new Chart(ctx, {
                            type: 'pie',
                            data: {
                                labels: labels.map((label, index) => label + ' (' + percentages[
                                    index] + ')'),
                                datasets: [{
                                    label: label,
                                    data: values,
                                    backgroundColor: [
                                        'rgb(0 157 84 / 74%)',
                                        'rgb(2 117 64 / 74%)',
                                        'rgb(2 81 44 / 74%)',
                                        'rgb(43 205 129 / 74%)',
                                        'rgb(0 177 4 / 74%)',
                                        'rgb(2 117 5 / 74%))',
                                        'rgb(0 157 14 / 74%)',
                                        'rgb(2 117 24 / 74%)',
                                        'rgb(2 81 34 / 74%)',
                                        'rgb(43 205 49 / 74%)',
                                        'rgb(0 177 45 / 74%)',
                                        'rgb(2 117 56 / 74%))'
                                        'rgb(0 157 64 / 74%)',
                                        'rgb(2 117 74 / 74%)',
                                        'rgb(2 81 84 / 74%)',
                                        'rgb(43 205 99 / 74%)',
                                        'rgb(0 177 25 / 74%)',
                                        'rgb(2 117 46 / 74%))'
                                    ],
                                    borderColor: [
                                        'rgb(0 113 39)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                responsive: true,
                                plugins: {
                                    legend: {
                                        position: 'top',
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

                        $('#' + tableId + ' thead tr').append(
                            '<th scope="col">No</th><th scope="col">Kriteria</th><th scope="col">Jumlah</th>'
                        );

                        labels.forEach((label, index) => {
                            $('#' + tableId + ' tbody').append(
                                '<tr>' +
                                '<td>' + (index + 1) + '</td>' +
                                '<td>' + label + '</td>' +
                                '<td>' + values[index] + '</td>' +
                                '</tr>'
                            );
                        });
                    }
                    createChartAndTable('kriteriaPekerjaanChart', 'kriteriaPekerjaanTable', response[
                        'Kriteria Pekerjaan'], 'Kriteria Pekerjaan');
                    createChartAndTable('bidangPekerjaanChart', 'bidangPekerjaanTable', response[
                        'Bidang Pekerjaan'], 'Bidang Pekerjaan');
                    createChartAndTable('tingkatPekerjaanChart', 'tingkatPekerjaanTable', response[
                        'Tingkat / Ukuran Tempat Bekerja'], 'Tingkat / Ukuran Tempat Bekerja');
                    createChartAndTable('jabatanPekerjaanChart', 'jabatanPekerjaanTable', response[
                        'Jabatan Pekerjaan'], 'Jabatan Pekerjaan');
                    createChartAndTable('pendapatanPekerjaanChart', 'pendapatanPekerjaanTable',
                        response[
                            'Pendapatan'], 'Pendapatan');
                    createChartAndTable('kesesuaianPekerjaanChart', 'kesesuaianPekerjaanTable',
                        response[
                            'Kesesuaian Pekerjaan dengan Prodi'],
                        'Kesesuaian Pekerjaan dengan Prodi');
                },
                error: function(error) {
                    console.error('Error fetching data:', error);
                }
            });
        });



        $(document).ready(function() {
            $.ajax({
                url: 'http://127.0.0.1:8000/api/visualisasi/wirausaha',
                method: 'GET',
                success: function(response) {
                    function createChartAndTable(chartId, tableId, data, label) {
                        const labels = Object.keys(data);
                        const values = Object.values(data);
                        const total = values.reduce((acc, val) => acc + val, 0);
                        const percentages = values.map(value => ((value / total) * 100).toFixed(2) +
                            '%');

                        const ctx = document.getElementById(chartId).getContext('2d');
                        new Chart(ctx, {
                            type: 'pie',
                            data: {
                                labels: labels.map((label, index) => label + ' (' + percentages[
                                    index] + ')'),
                                datasets: [{
                                    label: label,
                                    data: values,
                                    backgroundColor: [
                                        'rgb(0 157 84 / 74%)',
                                        'rgb(2 117 64 / 74%)',
                                        'rgb(2 81 44 / 74%)',
                                        'rgb(43 205 129 / 74%)',
                                        'rgb(0 177 4 / 74%)',
                                        'rgb(2 117 5 / 74%))'
                                    ],
                                    borderColor: [
                                        'rgb(0 113 39)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                responsive: true,
                                plugins: {
                                    legend: {
                                        position: 'top',
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

                        $('#' + tableId + ' thead tr').append(
                            '<th scope="col">No</th><th scope="col">Kriteria</th><th scope="col">Jumlah</th>'
                        );

                        labels.forEach((label, index) => {
                            $('#' + tableId + ' tbody').append(
                                '<tr>' +
                                '<td>' + (index + 1) + '</td>' +
                                '<td>' + label + '</td>' +
                                '<td>' + values[index] + '</td>' +
                                '</tr>'
                            );
                        });
                    }
                    createChartAndTable('tingkatWirausahaChart', 'tingkatWirausahaTable', response[
                        'Tingkat / Ukuran Tempat Usaha'], 'Tingkat / Ukuran Tempat Usaha');
                    createChartAndTable('pemodalWirausahaChart', 'pemodalWirausahaTable', response[
                        'Pemodal Usaha'], 'Pemodal Usaha');
                    createChartAndTable('bidangWirausahaChart', 'bidangWirausahaTable', response[
                        'Bidang Usaha'], 'Bidang Usaha');
                    createChartAndTable('omsetWirausahaChart', 'omsetWirausahaTable', response[
                        'Omset'], 'Omset');
                    createChartAndTable('jumlahWirausahaChart', 'jumlahWirausahaTable', response[
                        'Pendapatan'], 'Pendapatan');
                    createChartAndTable('kesesuaianWirausahaChart', 'kesesuaianWirausahaTable', response[
                        'Kesesuaian Usaha dengan Prodi'], 'Kesesuaian Usaha dengan Prodi');
                },
                error: function(error) {
                    console.error('Error fetching data:', error);
                }
            });
        });



        $(document).ready(function() {
            $.ajax({
                url: 'http://127.0.0.1:8000/api/visualisasi/pendidikan',
                method: 'GET',
                success: function(response) {
                    function createChartAndTable(chartId, tableId, data, label) {
                        const labels = Object.keys(data);
                        const values = Object.values(data);
                        const total = values.reduce((acc, val) => acc + val, 0);
                        const percentages = values.map(value => ((value / total) * 100).toFixed(2) +
                            '%');

                        const ctx = document.getElementById(chartId).getContext('2d');
                        new Chart(ctx, {
                            type: 'pie',
                            data: {
                                labels: labels.map((label, index) => label + ' (' + percentages[
                                    index] + ')'),
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
                                    borderColor: [
                                        'rgb(0 113 39)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                responsive: true,
                                plugins: {
                                    legend: {
                                        position: 'top',
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

                        $('#' + tableId + ' thead tr').append(
                            '<th scope="col">No</th><th scope="col">Kriteria</th><th scope="col">Jumlah</th>'
                        );

                        labels.forEach((label, index) => {
                            $('#' + tableId + ' tbody').append(
                                '<tr>' +
                                '<td>' + (index + 1) + '</td>' +
                                '<td>' + label + '</td>' +
                                '<td>' + values[index] + '</td>' +
                                '</tr>'
                            );
                        });
                    }
                    createChartAndTable('aktifPendidikanChart', 'aktifPendidikanTable', response[
                        'is_studying'], 'is_studying');
                    createChartAndTable('tingkatPendidikanChart', 'tingkatPendidikanTable', response[
                        'Tingkat Pendidikan'], 'Tingkat Pendidikan');
                    createChartAndTable('penerimaanPendidikanChart', 'penerimaanPendidikanTable', response[
                        'Tgl Surat Penerimaan Pendidikan'], 'Tgl Surat Penerimaan Pendidikan');
                    createChartAndTable('mulaiPendidikanChart', 'mulaiPendidikanTable', response[
                        'Tgl Mulai Pendidikan'], 'Tgl Mulai Pendidikan');
                    createChartAndTable('linearPendidikanChart', 'linearPendidikanTable', response[
                        'Satu Linear'], 'Satu Linear');
                },
                error: function(error) {
                    console.error('Error fetching data:', error);
                }
            });
        });
    </script>
@endsection
