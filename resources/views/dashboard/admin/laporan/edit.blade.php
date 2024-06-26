@extends('dashboard.layouts.main')

@section('content')
<div class="container-fluid pt-4 px-4">
  <div class="row g-4">
    <div class="col-sm-12 col-xl-12">
      <div class="bg-light rounded p-5 border-top border-success border-5">
        <div class="row">
          <div class="col-12">
            <span class="h4">Tambah Laporan</span>
            <hr>
          </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-19 col-md-10 col-sm-12">
              <form class="mb-5" action="/dashboard/admin/laporan/{{ $laporan->id }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="title" class="form-label">Judul Laporan</label>
                  <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                    name="title"  value="{{ old('title', $laporan->title) }}" required autofocus>
                  @error('title')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="laporan" class="form-label">Upload Laporan</label>
                  <a href="{{ asset('storage/' . $laporan->laporan) }}" target="_blank">{{ basename($laporan->laporan) }}</a>
                  <input class="form-control @error('laporan') is-invalid @enderror" type="file"
                    id="laporan" name="laporan" value="{{ old('laporan') }}">
                  @error('laporan')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="row justify-content-end">
                  <div class="col-lg-5 col-md-8 col-sm-12 text-end">
                    <a href="/dashboard/admin/laporan" class="btn btn-secondary mx-1"><i class="bi bi-arrow-left-circle"></i>
                      Kembali</a>
                    <button type="submit" class="btn btn-success mx-1"><i class="bi bi-file-earmark-check"></i>
                      Simpan</button>
                  </div>
                </div>
              </form>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>



@endsection