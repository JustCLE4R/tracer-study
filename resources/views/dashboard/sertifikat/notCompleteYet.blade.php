@extends('dashboard.layouts.main')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded  border-top border-success border-5" style="min-height: 70vh;">
                    <div class="row m-5 mb-0">
                        <div class="col-12">
                            <span class="h4">Sertifikat</span>
                            <hr>
                        </div>
                    </div>

                    <div class="container ">
                        <div class="row justify-content-center">
                            <div class="col-md-8 text-center">
                                <div class="row">
                                    <div class="col">
                                        <h1 class="m-4 h4">Status Pengisian Data</h1>
                                    </div>
                                </div>
                                <div class="row my-1">
                                    <div class="col-md-6 my-1">
                                        <h5 class="mb-0">Nama</h5>
                                        <p class="text-secondary">{{ $sertifikat->user->nama }}</p>
                                    </div>
                                    <div class="col-md-6 my-1">
                                        <h5 class="mb-0">NIM</h5>
                                        <p class="text-secondary">{{ $sertifikat->user->nim }}</p>
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="col-md-6 my-1">
                                        <h5 class="mb-0">Fakultas</h5>
                                        <p class="text-secondary">{{ $sertifikat->user->fakultas }}</p>
                                    </div>
                                    <div class="col-md-6 my-1">
                                        <h5 class="mb-0">Program Studi</h5>
                                        <p class="text-secondary">{{ $sertifikat->user->program_studi }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">Profile</h5>
                                            <p class="card-text">{!! $sertifikat->profile_check
                                                ? '<i class="bi bi-check-circle-fill text-success"></i> Sudah Diisi'
                                                : '<i class="bi bi-x-circle-fill text-danger"></i> Belum Diisi' !!}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">Pendidikan</h5>
                                            <p class="card-text">{!! $sertifikat->pendidikan_check
                                                ? '<i class="bi bi-check-circle-fill text-success"></i> Sudah Diisi'
                                                : '<i class="bi bi-x-circle-fill text-danger"></i> Belum Diisi' !!}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">Pekerjaan</h5>
                                            <p class="card-text">{!! $sertifikat->pekerjaan_check
                                                ? '<i class="bi bi-check-circle-fill text-success"></i> Sudah Diisi'
                                                : '<i class="bi bi-x-circle-fill text-danger"></i> Belum Diisi' !!}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">Questioner</h5>
                                            <p class="card-text">{!! $sertifikat->questioner_check
                                                ? '<i class="bi bi-check-circle-fill text-success"></i> Sudah Diisi'
                                                : '<i class="bi bi-x-circle-fill text-danger"></i> Belum Diisi' !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-4">
                                <div class="col-12">
                                    <div class="alert alert-light text-center" role="alert">
                                        <p>
                                            Halo, alumni keren! Kita punya kesempatan emas nih buat kamu. Yuk, isi data kamu
                                            sekarang buat ikut berkontribusi dalam penelitian tracer study kita! Gak cuma
                                            itu, kamu juga bakal dapetin sertifikat keren sebagai bukti partisipasimu.
                                        </p>

                                        <p>
                                            Data kamu penting banget buat kita bangun masa depan pendidikan yang lebih baik.
                                            Jadi, jangan sampai kelewatan ya! Lengkapi data kamu dan tunjukkan jejak
                                            perjalananmu dengan bangga.
                                        </p>

                                        <p>
                                            Bersiap-siap jadi bagian dari perubahan positif, ya! Ayo, segera isi data kamu
                                            dan tunjukkan kontribusimu. Terima kasih atas support dan partisipasinya, guys!"
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
