@extends('dashboard.layouts.main')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded p-5 border-top border-success border-5" style="min-height: 80vh;">
                    <div class="row">
                        <div class="col-12">
                            <span class="h4">{{ $user->nama }}</span>
                            <hr>
                        </div>
                    </div>
                    <form class="row" action="/dashboard/admin/super/user/{{ $user->id }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <img src="{{ $user->foto ? url('https://pmb.uinsu.ac.id/file/photo/' . $user->foto) : 'https://bootdey.com/img/Content/avatar/avatar7.png' }}"
                                            alt="Admin" class="rounded-circle"
                                            style="object-fit: cover; width: 150px; height: 150px;">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row my-1">
                                        <div class="col text-center">
                                            <span class="h4">Informasi Akademik</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Username/NIM (Untuk Login)</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="nim" class="form-control"
                                                value="{{ $user->nim }}">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Nama</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="nama" class="form-control"
                                                value="{{ $user->nama }}">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Roles</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <select name="role" id="role" class="form-control">
                                                @foreach ($roles as $index => $role)
                                                    @if ($index != 0)
                                                        <option value="{{ $role }}"
                                                            {{ $user->role == $role ? 'selected' : '' }}>{{ $role }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Fakultas</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <select type="text"
                                                class="form-control {{ $errors->has('fakultas') ? 'is-invalid' : '' }}"
                                                id="fakultas" name="fakultas" onchange="getProgramStudi(this.value)"
                                                required>
                                                <option value="" selected hidden>Pilih Fakultas</option>
                                                <option value="Dakwah dan Komunikasi">Dakwah dan Komunikasi</option>
                                                <option value="Kesehatan Masyarakat">Kesehatan Masyarakat</option>
                                                <option value="Ilmu Sosial">Ilmu Sosial</option>
                                                <option value="Ilmu Tarbiyah dan Keguruan">Ilmu Tarbiyah dan Keguruan
                                                </option>
                                                <option value="Syariah dan Hukum">Syariah dan Hukum</option>
                                                <option value="Sains dan Teknologi">Sains dan Teknologi</option>
                                                <option value="Ushuluddin dan Studi Islam">Ushuluddin dan Studi Islam
                                                </option>
                                                <option value="Pascasarjana">Pascasarjana</option>
                                            </select>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Program Studi</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <select type="text" class="form-control" id="program_studi"
                                                name="program_studi" required disabled>
                                                <option value="" selected hidden>Pilih Program Studi</option>
                                                {{-- populate by ajax --}}
                                            </select>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Password</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="password" id="password" name="password" class="form-control">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Konfirmasi Password</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="password" id="password_confirmation" name="password_confirmation"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-12 text-end">
                                            <button class="btn btn-success"><i class="bi bi-floppy"></i> Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function getProgramStudi(fakultas, selectedProgramStudi = null) {
            var prodi = $('#program_studi');
            prodi.prop('disabled', false);
            $.ajax({
                type: 'GET',
                url: '/json/fakultas.json',
                data: {
                    fakultas: fakultas
                },
                success: function(data) {
                    prodi.empty();
                    prodi.append('<option value="" selected hidden>Pilih Program Studi</option>');
                    data[fakultas].forEach(function(item) {
                        prodi.append('<option value="' + item + '"' +
                            (item == selectedProgramStudi ? ' selected' : '') +
                            '>' + item + '</option>');
                    });
                    if ($('#role').val() == 'adminfakultas') {
                        prodi.prop('disabled', true);
                    }
                }
            });
        }

        $(document).ready(function() {
            var selectedFakultas = "{{ old('fakultas', $user->fakultas) }}";
            var selectedProgramStudi = "{{ old('program_studi', $user->program_studi) }}";

            if (selectedFakultas) {
                $('#fakultas').val(selectedFakultas);
                getProgramStudi(selectedFakultas, selectedProgramStudi);
            }
        });

        $('#fakultas').on('change', function() {
            var fakultas = $(this).val();
            getProgramStudi(fakultas);
        });

        $('#role').on('change', function() {
            var role = $(this).val();
            if (role == 'superadmin' || role == 'superadmin2' || role == 'surveyor') {
                $('#fakultas').prop('disabled', true).val('');
                $('#program_studi').prop('disabled', true).val('');
            } else {
                $('#fakultas').prop('disabled', false);
                if (role == 'adminfakultas') {
                    $('#program_studi').prop('disabled', true).val('');
                } else {
                    $('#program_studi').prop('disabled', false);
                }
            }
        });

        $('#password, #password_confirmation').on('keyup', function() {
            if ($('#password').val() == $('#password_confirmation').val()) {
                $('#password_confirmation').removeClass('is-invalid');
                $('#password_confirmation').next('.invalid-feedback').remove();
            } else {
                if (!$('#password_confirmation').hasClass('is-invalid')) {
                    $('#password_confirmation').addClass('is-invalid');
                    $('#password_confirmation').after('<div class="invalid-feedback">Password harus sama</div>');
                }
            }
        });
    </script>
@endpush
