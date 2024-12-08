@extends('dashboard.layouts.main')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            @if (session()->has('success'))
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: '{{ session('success') }}',
                            confirmButtonText: 'OK',
                            timer: 3000,
                            timerProgressBar: true,
                        });
                    });
                </script>
            @endif
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded p-5 border-top border-success border-5" style="min-height:550px;">
                    <a class="btn btn-success btn-sm mb-3" href="/dashboard/admin/super/user/create">Touch</a>
                    <div class="row">
                        <div class="col-12">
                            <span class="h4">Daftar Akun</span>
                            <hr>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th style="background-color: transparent !important;" class="col">No</th>
                                    <th style="background-color: transparent !important;" class="col">NIM</th>
                                    <th style="background-color: transparent !important;" class="col">Nama</th>
                                    {{-- <th style="background-color: transparent !important;" class="col">Email</th> --}}
                                    <th style="background-color: transparent !important;" class="col">Fakultas</th>
                                    <th style="background-color: transparent !important;" class="col">Prodi</th>
                                    {{-- <th style="background-color: transparent !important;" class="col">Created at</th> --}}
                                    <th style="background-color: transparent !important;" class="col text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody style="background-color: transparent !important;">
                                @foreach ($users as $user)
                                    <tr>
                                        <td style="background-color: transparent !important;">
                                            {{ $users->firstItem() + $loop->index }}
                                        </td>
                                        <td style="background-color: transparent !important;">
                                            {{ $user->nim }}
                                        </td>
                                        <td style="background-color: transparent !important;">
                                            {{ $user->nama }}
                                        </td>
                                        {{-- <td style="background-color: transparent !important;">
                                    {{ $user->email }}
                                </td> --}}
                                        <td style="background-color: transparent !important;">
                                            {{ $user->fakultas }}
                                        </td>
                                        <td style="background-color: transparent !important;">
                                            {{ $user->program_studi }}
                                        </td>
                                        {{-- <td style="background-color: transparent !important;">
                                    {{ $user->created_at }}
                                </td> --}}

                                        <td style="background-color: transparent !important;" class="text-center">
                                            <a href="/dashboard/admin/super/user/{{ $user->id }}"
                                                class="btn btn-success btn-sm px-1 m-1 py-0 text-white"><i
                                                    class="bi bi-eye"></i></a>
                                            {{-- <a href="/dashboard/admin/super/user/{{ $user->id }}/edit"
                                        class="btn btn-success btn-sm px-1 m-1 py-0 text-white"><i
                                            class="bi bi-pencil-square"></i></a> --}}
                                            <form class="d-inline" action="/dashboard/admin/super/user/{{ $user->id }}"
                                                method="post" id="deleteForm-{{ $user->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button"
                                                    class="btn btn-success m-1 btn-sm px-1 py-0 text-white"
                                                    onclick="confirmDelete({{ $user->id }})">
                                                    <i class="bi bi-trash3"></i>
                                                </button>
                                            </form>

                                            <script>
                                                function confirmDelete(userId) {
                                                    Swal.fire({
                                                        title: 'Apakah Anda yakin?',
                                                        text: 'Data yang dihapus tidak dapat dikembalikan!',
                                                        icon: 'warning',
                                                        showCancelButton: true,
                                                        confirmButtonColor: '#3085d6',
                                                        cancelButtonColor: '#d33',
                                                        confirmButtonText: 'Ya, hapus!',
                                                        cancelButtonText: 'Batal',
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            document.getElementById('deleteForm-' + userId).submit();
                                                        }
                                                    });
                                                }
                                            </script>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="col-lg-12 mt-3">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let previousLink = document.querySelector('a.page-link[rel="prev"]');
            if (previousLink) {
                previousLink.textContent = 'Sebelumnya';
            }

            let previousSpan = document.querySelector('li.page-item.disabled span.page-link');
            if (previousSpan) {
                previousSpan.textContent = 'Sebelumnya';
            }

            let nextLink = document.querySelector('a.page-link[rel="next"]');
            if (nextLink) {
                nextLink.textContent = 'Selanjutnya';
            }

            let nextSpan = document.querySelector('li.page-item.disabled span.page-link');
            if (nextSpan) {
                nextSpan.textContent = 'Selanjutnya';
            }
        });
    </script>
@endSection
