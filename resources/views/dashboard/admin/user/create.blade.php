@extends('dashboard.layouts.main')

@section('content')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
@endpush

<div class="col-sm-12 col-xl-12">
    <div class="bg-light rounded p-5 border-top border-success border-5">
        <div class="row">
            <div class="col-12">
                <form action="/dashboard/admin/prodi/user/search" method="POST" class="d-flex">
                    @csrf
                    <input type="text" class="form-control me-2" name="search" placeholder="Search ..."
                        value="{{ request()->input('search') ?: old('search') }}" required autofocus>
                    <button class="btn btn-outline-success" type="submit"><i class="bi bi-search"></i></button>
                </form>
            </div>
        </div>
@dd($searchData)
        @if ($searchData)
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th style="background-color: transparent !important;" class="col">NIM</th>
                        <th style="background-color: transparent !important;" class="col">Nama</th>
                        <th style="background-color: transparent !important;" class="col">Fakultas</th>
                        <th style="background-color: transparent !important;" class="col">Program Studi</th>
                        <th style="background-color: transparent !important;" class="col text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody style="background-color: transparent !important;">
                    <tr>
                        <td style="background-color: transparent !important;">
                            {{ $searchData['nim'] }}
                        </td>
                        <td style="background-color: transparent !important;">
                            {{ $searchData['nama_mahasiswa'] }}
                        </td>
                        <td style="background-color: transparent !important;">
                            {{ $searchData['FAKULTAS'] }}
                        </td>
                        <td style="background-color: transparent !important;">
                            {{ $searchData['PRODI'] }}
                        </td>
                        <td style="background-color: transparent !important;" class="text-center">
                            <a href="/dashboard/admin/prodi/career/{{ $career->slug }}/judge?from={{ $from }}"
                                class="btn btn-success btn-sm px-1 py-0 text-white"><i
                                    class="bi bi-arrow-right"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif

@push('scripts')
<script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
<script>

</script>
@endpush

@endsection