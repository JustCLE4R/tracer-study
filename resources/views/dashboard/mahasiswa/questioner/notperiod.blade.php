@extends('dashboard.layouts.main')

@section('title', 'Bukan Periode Pengisian Kuesioner Tracer Study')

@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded p-5 border-top border-success border-5" style="min-height: 70vh;">
                <div class="row">
                    <div class="col-12">
                        <div class="card mt-5">
                            <div class="card-body text-center">
                                <h1 class="mt-3">Bukan Periode Pengisian Kuesioner Tracer Study</h1>
                                <p class="mt-3">Maaf, saat ini bukan periode pengisian kuesioner tracer study. Silakan cek kembali di lain waktu.</p>
                                <a href="/dashboard" class="btn btn-secondary mt-3">Kembali Ke Dashboard</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
