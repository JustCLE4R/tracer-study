@extends('dashboard.layouts.main')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded p-5 border-top border-success border-5" style="min-height: 70vh;">
                    <div class="row">
                        <div class="col-12">
                            <span class="h4">Tambah Pekerjaan</span>
                            <hr>
                        </div>
                    </div>
                    @if ($errors->any())
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                Swal.fire({
                                    title: 'Errors Found!',
                                    html: `
                                            <ul style="text-align: left; list-style: none; padding: 0;">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        `,
                                    icon: 'error',
                                    confirmButtonColor: '#d33',
                                    confirmButtonText: 'OK',
                                    timer: 3000,
                                    timerProgressBar: true,
                                });
                            });
                        </script>
                    @endif

                    <form action="/dashboard/perjalanan-karir" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 col-lg-4 col-md-5 col-sm-12">
                            <label for="filterTracer" class="form-label text-secondary">Pilihlah status pekerjaan anda saat
                                ini *</label>
                            <select class="form-select" onchange="handlePekerjaan(this.value)" name="pekerjaan">
                                <option hidden selected>Pilih Status</option>
                                <option value="pekerja">Bekerja</option>
                                <option value="wirausaha">Wirausaha</option>
                                <option value="belum-kerja">Belum memungkinkan bekerja</option>
                            </select>

                            <select class="form-select my-2 d-none" id="handleStatus"
                                onchange="handleStatusChange(this.value)" name="status-pekerjaan">
                                <option hidden selected>Pilih Status Bekerja</option>
                                <option value="a">Full-time</option>
                                <option value="b">Part-time</option>
                            </select>
                        </div>

                        <div class="row justify-content-between" id="dynamicForm">

                        </div>
                        <hr>
                        <div class="row justify-content-between" id="informasiPerusahaan">

                        </div>

                        <div class="row justify-content-end my-1 d-none" id="buttonGroup">
                            <div class="col-lg-5 col-md-8 col-sm-12 text-end">
                                <a class="btn btn-secondary mx-1" href="/dashboard/perjalanan-karir">
                                    <i class="bi bi-arrow-left-circle"></i> Kembali
                                </a>
                                <button class="btn btn-success mx-1">
                                    <i class="bi bi-file-earmark-check"></i> Simpan & Lanjutkan
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
