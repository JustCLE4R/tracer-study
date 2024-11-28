@extends('dashboard.layouts.main')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded p-5 border-top border-success border-5" style="min-height: 80vh;">
                <div class="row">
                    <div class="col-12">
                        <span class="h4">Laporan</span>
                        <hr>
                    </div>
                </div>
                @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show col-lg-10 mb-0" role="alert">
                    <strong>Success!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <div class="row g-0">
                    <div class="col-lg-3 col-md-4 col-sm-10">
                        <a href="/dashboard/admin/super/laporan/create" class="btn btn-success btn-sm mb-3"><i
                                class="bi bi-plus"></i> Tambah Laporan</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                        <thead>
                            <tr class="text-dark">
                                <th style="background-color: transparent !important;" class="col">No</th>
                                <th style="background-color: transparent !important;" class="col">Nama Laporan</th>
                                <th style="background-color: transparent !important;" class="col">File</th>
                                <th style="background-color: transparent !important;" class="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody style="background-color: transparent !important;">
                            @foreach ($laporans as $laporan)
                            <tr>
                                <td style="background-color: transparent !important;">
                                    {{ 1 + $loop->index }}
                                </td>
                                <td style="background-color: transparent !important;">
                                    {{ $laporan->title }}
                                </td>
                                <td style="background-color: transparent !important;">
                                    <a href="{{ asset('storage/' . $laporan->laporan) }}" target="_blank">{{
                                        basename($laporan->laporan) }}</a>
                                </td>

                                <td style="background-color: transparent !important;">
                                    <a href="/dashboard/admin/super/laporan/{{ $laporan->slug }}/edit"
                                        class="btn btn-success btn-sm px-1 m-1 py-0 text-white"><i
                                            class="bi bi-pencil-square"></i></a>
                                    <form class="d-inline" action="/dashboard/admin/super/laporan/{{ $laporan->slug }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-success m-1 btn-sm px-1 py-0 text-white"
                                            onclick="return confirm('Are you sure?')"><i
                                                class="bi bi-trash3"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection