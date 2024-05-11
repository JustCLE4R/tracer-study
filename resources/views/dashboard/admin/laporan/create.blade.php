@extends('dashboard.layouts.main')

@section('content')

<h1>Buat Laporan</h1>

<div class="container">
  <form action="/dashboard/admin/laporan" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Judul Laporan</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
      @error('title')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="laporan" class="form-label">Upload Laporan</label>
      <input type="file" class="form-control @error('laporan') is-invalid @enderror" id="laporan" name="laporan" value="{{ old('laporan') }}" required>
      @error('laporan')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    <div class="mb-3">
      <button class="btn btn-success">Submit</button>
    </div>
</div>

@endsection