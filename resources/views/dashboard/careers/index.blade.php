@extends('dashboard.layouts.main')

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 ms-3">Career</h1>
  </div>

  @if (session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show col-lg-10" role="alert">
    <strong>Success!</strong> {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  <div class="table-responsive m-3 col-lg-10">
    <a href="/dashboard/career/create" class="btn btn-primary btn-sm mb-3"><i class="bi bi-plus-circle"></i> Create new Career</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th class="col">#</th>
          <th class="col">Company</th>
          <th class="col">Position</th>
          <th class="col text-center">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($careers as $career)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $career->company_name }}</td>
          <td>{{ $career->position }}</td>
          <td class="text-center">
            <a href="/dashboard/career/{{ $career->slug }}" class="btn btn-info btn-sm px-1 py-0 text-white"><i class="bi bi-eye"></i></a>
            <a href="/dashboard/career/{{ $career->slug }}/edit" class="btn btn-warning btn-sm px-1 py-0 text-white"><i class="bi bi-pencil-square"></i></a>
            <form class="d-inline" action="/dashboard/career/{{ $career->slug }}" method="post">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger btn-sm px-1 py-0 text-white" onclick="return confirm('Are you sure?')"><i class="bi bi-trash3"></i></button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection