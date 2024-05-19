@extends('dashboard.layouts.main')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded p-5 border-top border-success border-5" style="min-height: 70vh ;">
                    <div class="row">
                        <div class="col-12">
                            <span class="h4">Career</span>
                            <hr>
                        </div>
                    </div>
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show col-lg-10" role="alert">
                            <strong>Success!</strong> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="row g-0">
                        <div class="col-lg-3 col-md-4 col-sm-10">
                            <a href="/dashboard/career/create" class="btn btn-success btn-sm mb-3"><i
                                    class="bi bi-plus"></i> Tambah Career</a>
                        </div>

                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th style="background-color: transparent !important;" class="col">No</th>
                                    <th style="background-color: transparent !important;" class="col">Perusahaan</th>
                                    <th style="background-color: transparent !important;" class="col">Posisi</th>
                                    @if (auth()->user()->role == 'admin' or auth()->user()->role == 'superadmin')
                                        <th style="background-color: transparent !important;" class="col">Fakultas</th>
                                    @endif
                                    <th style="background-color: transparent !important;" class="col text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody style="background-color: transparent !important;">
                                @foreach ($careers as $career)
                                    <tr>
                                        <td style="background-color: transparent !important;">
                                            {{ $careers->firstItem() + $loop->index }}</td>
                                        <td style="background-color: transparent !important;">{{ $career->company_name }}
                                        </td>
                                        <td style="background-color: transparent !important;">{{ $career->position }}</td>
                                        @if (auth()->user()->role == 'admin' or auth()->user()->role == 'superadmin')
                                            <td style="background-color: transparent !important;">
                                                {{ $career->user->fakultas }}</td>
                                        @endif
                                        <td style="background-color: transparent !important;" class="text-center">
                                            <a href="/dashboard/career/{{ $career->slug }}"
                                                class="btn btn-success btn-sm px-1 m-1 py-0 text-white"><i
                                                    class="bi bi-eye"></i></a>
                                            <a href="/dashboard/career/{{ $career->slug }}/edit"
                                                class="btn btn-success btn-sm px-1 m-1 py-0 text-white"><i
                                                    class="bi bi-pencil-square"></i></a>
                                            <form class="d-inline" action="/dashboard/career/{{ $career->slug }}"
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
                    
                    <div class="col-lg-12 mt-3">
                        {{ $careers->onEachside(1)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
