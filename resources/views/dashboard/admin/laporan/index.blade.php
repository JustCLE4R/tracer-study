@extends('dashboard.layouts.main')

@section('content')
@if (session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show col-lg-10 mb-0" role="alert">
    <strong>Success!</strong> {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
<a href="laporan/create" class="btn btn-primary mb-3"><i class="bi bi-plus m-0 p-0"></i> Buat Laporan</a>
<table class="table table-striped m-3">
  <thead class="table-dark">
    <tr>
      <th>#</th>
      <th>Nama Laporan</th>
      <th>File</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody class="">
      @foreach ($laporans as $laporan)
        <tr>
          <th>{{ 1 + $loop->index }}</th>
          <td>{{ $laporan->title }}</td>
          <td><a href="{{ asset('storage/' . $laporan->laporan) }}" target="_blank">{{ basename($laporan->laporan) }}</a></td>
          <td>
            <a class="btn btn-sm px-1 py-0 btn-warning" href="/dashboard/admin/laporan/{{ $laporan->id }}/edit"><i class="bi bi-pencil-square"></i></a>
            <form class="d-inline" action="/dashboard/admin/laporan/{{ $laporan->id }}" method="post">
              @method('delete')
              @csrf
              <button class="btn btn-sm px-1 py-0 btn-danger" onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i></button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection