@extends('dashboard.layouts.main')

@section('content')
  <table class="table table-hover table-striped m-3">
    <thead class="table-dark">
      <tr>
        <th>#</th>
        <th>NIM</th>
        <th>Name</th>
        <th>Email</th>
        <th>Fakultas</th>
        <th>Prodi</th>
        <th>Created at</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
        <tr>
          <th>{{ $users->firstItem() + $loop->index }}</th>
          <td>{{ $user->nim }}</td>
          <td>{{ $user->nama }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->fakultas }}</td>
          <td>{{ $user->program_studi }}</td>
          <td>{{ $user->created_at }}</td>
          <td>
            <a class="btn btn-sm px-1 py-0 btn-success" href="/dashboard/admin/{{ $user->id }}"><i class="bi bi-eye"></i></a>
            <a class="btn btn-sm px-1 py-0 btn-warning" href="/dashboard/admin/{{ $user->id }}/edit"><i class="bi bi-pencil-square"></i></a>
            @if (Auth::user()->role == 'superadmin')
              <form class="d-inline" action="/dashboard/admin/{{ $user->id }}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm px-1 py-0 btn-danger" onclick="return confirm('Are you sure?')"><i class="bi bi-trash3"></i></button>
              </form>
            @endif
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  {{ $users->links() }}

@endSection