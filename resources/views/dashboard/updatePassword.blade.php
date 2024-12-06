@extends('dashboard.layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-6">
            <form action="" method="POST">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="old_password" class="form-label">Password Lama</label>
                    <input type="password" class="form-control @error('old_password') is-invalid @enderror"
                        id="old_password" name="old_password">
                    @error('old_password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password Baru</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                        name="password">
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Konfirmasi Password Baru</label>
                    <input id="password_confirmation" type="password" class="form-control @error('confirm_password') is-invalid @enderror"
                        id="confirm_password" name="confirm_password">
                    @error('confirm_password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
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