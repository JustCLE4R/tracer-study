@extends('dashboard.layouts.main')

@section('title', 'Career List')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded p-5 border-top border-success border-5">
                <div class="row">
                    <div class="col-12">
                        <span class="h4">Daftar Karir</span> ({{ ucfirst($from) }})
                        <hr>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                        <thead>
                            <tr class="text-dark">
                                <th style="background-color: transparent !important;" class="col">No</th>
                                <th style="background-color: transparent !important;" class="col">Perusahaan</th>
                                <th style="background-color: transparent !important;" class="col">Posisi</th>
                                <th style="background-color: transparent !important;" class="col">Kategori</th>
                                <th style="background-color: transparent !important;" class="col">Posted at</th>
                                <th style="background-color: transparent !important;" class="col text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody style="background-color: transparent !important;">
                            @foreach ($careers as $career)
                            <tr>
                                <td style="background-color: transparent !important;">
                                    {{ $careers->firstItem() + $loop->index }}
                                </td>
                                <td style="background-color: transparent !important;">
                                    {{ $career->company_name }}
                                </td>
                                <td style="background-color: transparent !important;">
                                    {{ $career->position }}
                                </td>
                                <td style="background-color: transparent !important;">
                                    {{ $career->category }}
                                </td>
                                <td style="background-color: transparent !important;">
                                    {{ $career->created_at->format('d M Y H:i') }}
                                </td>

                                <td style="background-color: transparent !important;" class="text-center">
                                    <a href="/dashboard/admin/prodi/career/{{ $career->slug }}/judge?from={{ $from }}"
                                        class="btn btn-success btn-sm px-1 py-0 text-white"><i
                                            class="bi bi-arrow-right"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="col-lg-12 mt-3">
                    {{ $careers->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection