@extends('dashboard.layouts.main')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded p-5 border-top border-success border-5" style="min-height: 80vh;">
                <div class="row">
                    <div class="col-12">
                        <span class="h4">Import</span>
                        <hr>
                    </div>
                </div>
                @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show col-lg-10 mb-0" role="alert">
                    <strong>Success!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <div class="row justify-content-evenly">
                    {{-- begin card --}}
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="card text-center">
                            <div class="card-body ">
                                <i class="bi bi-people-fill text-success" style="font-size: 2rem;"></i>
                                <h5 class="card-title mt-3">Import Pekerja Full Time</h5>
                                <a href="/dashboard/admin/super/import/full-time" class="btn btn-success mt-2">Import Now!</a>
                            </div>
                        </div>
                    </div>
                    {{-- end card --}}

                    {{-- begin card --}}
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <i class="bi bi-briefcase-fill text-success" style="font-size: 2rem;"></i>
                                <h5 class="card-title mt-3">Import Wirausaha</h5>
                                <a href="/dashboard/admin/super/import/wirausaha" class="btn btn-success mt-2">Import Now!</a>
                            </div>
                        </div>
                    </div>
                    {{-- end card --}}

                    {{-- begin card --}}
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <i class="bi bi-book-fill text-success" style="font-size: 2rem;"></i>
                                <h5 class="card-title mt-3">Import Lanjut Studi</h5>
                                <a href="/dashboard/admin/super/import/lanjut-studi" class="btn btn-success mt-2">Import Now!</a>
                            </div>
                        </div>
                    </div>
                    {{-- end card --}}

                    {{-- begin card --}}
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <i class="bi bi-question-circle-fill text-success" style="font-size: 2rem;"></i>
                                <h5 class="card-title mt-3">Import Questioner Mahasiswa</h5>
                                <a href="/dashboard/admin/super/import/mhs-questioner" class="btn btn-success mt-2">Import Now!</a>
                            </div>
                        </div>
                    </div>
                    {{-- end card --}}

                    {{-- begin card --}}
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <i class="bi bi-clipboard-fill text-success" style="font-size: 2rem;"></i>
                                <h5 class="card-title mt-3">Import Questioner StakeHolder</h5>
                                <a href="/dashboard/admin/super/import/stk-questioner" class="btn btn-success mt-2">Import Now!</a>
                            </div>
                        </div>
                    </div>
                    {{-- end card --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection