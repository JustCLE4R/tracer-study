@extends('dashboard.layouts.main')

@section('content')
<div class="container">
  <div class="main-body">
    <div class="row gutters-sm">
      <form class="row" action="/dashboard/admin/fakultas/user-admin/{{ $user->id }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="col-md-4 mb-3">
          <div class="card">
        <div class="card-body">
          <div class="d-flex flex-column align-items-center text-center">
            <img src="{{ $user->foto ? url('https://pmb.uinsu.ac.id/file/photo/' . $user->foto) : 'https://bootdey.com/img/Content/avatar/avatar7.png' }}" alt="Admin" class="rounded-circle" style="object-fit: cover; width: 150px; height: 150px;">
            <div class="mt-3">
          <h4>{{ $user->nama }}</h4>
            </div>
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
          <input type="text" name="nim" class="form-control" value="{{ $user->nim }}">
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
          <h6 class="mb-0">Nama</h6>
            </div>
            <div class="col-sm-9 text-secondary">
          <input type="text" name="nama" class="form-control" value="{{ $user->nama }}">
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
          <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
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
@endsection

@push('scripts')
<script>
  $('#password, #password_confirmation').on('keyup', function () {
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