@extends('dashboard.layouts.main')

@section('content')
<div class="container">
    <div class="card mt-4">
        <div class="card-header">
            <h3>Career Information</h3>
        </div>
        <div class="card-body">
            <img src="{{ $career->image }}" alt="">
            <p><b>Perusahaan:</b> {{ $career->company_name }}</p>
            <p><b>Posisi:</b> {{ $career->position }}</p>
            <p><b>Kategori:</b> {{ $career->category }}</p>
            <p><b>Deskripsi: </b>{!! $career->description !!}</p>
            <p><b>Posted at:</b> {{ $career->created_at->format('d M Y H:i') }}</p>
            <!-- Add more details as needed -->
        </div>
    </div>

    <form action="{{ url('dashboard/admin/fakultas/career/' . $career->id . '/judge') }}" method="POST" class="mt-4">
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
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
</div>
@endsection
