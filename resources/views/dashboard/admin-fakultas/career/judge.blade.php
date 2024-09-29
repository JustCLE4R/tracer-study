@extends('dashboard.layouts.main')

@section('content')
<div class="container">
    <div class="card mt-4">
        <div class="card-header">
            <h3>Career Information</h3>
        </div>
        <div class="card-body">
            <div class="float-end">
                <a href="/dashboard/admin/fakultas/career/{{ $career->slug }}/edit"
                    class="btn btn-warning btn-sm px-1 py-0 text-white"><i
                        class="bi bi-pencil"></i></a>
                <form action="/dashboard/admin/fakultas/career/{{ $career->slug }}"
                    method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="from" value="{{ request('from') }}">
                    <button type="submit" class="btn btn-danger btn-sm px-1 py-0"
                        onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i></button>
                </form>
            </div>
            <img src="/storage/{{ $career->image }}" alt="">
            <p><b>Perusahaan:</b> {{ $career->company_name }}</p>
            <p><b>Posisi:</b> {{ $career->position }}</p>
            <p><b>Kategori:</b> {{ $career->category }}</p>
            <p><b>Deskripsi: </b>{!! $career->description !!}</p>
            <p><b>Posted at:</b> {{ $career->created_at->format('d M Y H:i') }}</p>
            <!-- Add more details as needed -->
        </div>
    </div>

    <form action="{{ url('dashboard/admin/fakultas/career/' . $career->slug . '/judge') }}" method="POST" class="mt-4">
        @csrf
        @method('PATCH')
        <input type="hidden" name="from" value="{{ request('from') }}">
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                <option value="approved">Approve</option>
                <option value="rejected">Reject</option>
            </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mt-3">
            <label for="comments">Comments</label>
            <textarea name="comments" id="comments" class="form-control @error('comments') is-invalid @enderror" rows="3"></textarea>
            @error('comments')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <a href="javascript:history.back()" class="btn btn-secondary mt-3">Back</a>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
</div>
@endsection
