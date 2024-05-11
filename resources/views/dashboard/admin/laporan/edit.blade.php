@extends('dashboard.layouts.main')

@section('content')

<h1>Edit Laporan</h1>

<div class="container">
  <form action="/dashboard/admin/laporan/{{ $laporan->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="title" class="form-label">Judul Laporan</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $laporan->title) }}" required>
      @error('title')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="laporan" class="form-label">Upload Laporan</label>
      <a href="{{ asset('storage/' . $laporan->laporan) }}" target="_blank">{{ basename($laporan->laporan) }}</a>
      <input type="file" class="form-control @error('laporan') is-invalid @enderror" id="laporan" name="laporan" value="{{ old('laporan') }}">
      @error('laporan')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    <div class="mb-3">
      <button class="btn btn-warning">Edit</button>
    </div>
</div>

@endsection