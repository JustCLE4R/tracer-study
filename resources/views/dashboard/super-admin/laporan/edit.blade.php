@extends('dashboard.layouts.main')

@section('content')
<div class="container-fluid pt-4 px-4">
    {{-- print all error --}}
    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Whoops!</strong> There were some problems with your input.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{-- print all error content --}}
        <ul>
            @foreach ($errors->all() as $error)
            <li>
                {{ $error }}
            </li>
            @endforeach
    </div>
    @endif

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
                        <form class="mb-5" action="/dashboard/admin/super/laporan/{{ $laporan->slug }}" method="post"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Judul Laporan</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                    name="title" value="{{ old('title', $laporan->title) }}" required autofocus>
                                @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            {{-- make slug --}}
                            <input type="hidden" name="slug" id="slug" value="{{ old('slug', $laporan->slug) }}">

                            @push('scripts')
                            <script>
                                const title = $('#title');
                                const slug = $('#slug');
            
                                $('form').on('submit', (e) => {
                                    e.preventDefault();
                                    $.ajax({
                                        url: '/dashboard/admin/super/laporan/checkSlug',
                                        data: {
                                            title: title.val()
                                        }
                                    }).done((data) => {
                                        slug.val(data.slug);
                                        e.currentTarget.submit();
                                    });
                                });
                            </script>
                            @endpush
                            {{-- make the logic of slug --}}

                            <div class="mb-3">
                                <label for="laporan" class="form-label">Upload Laporan</label>
                                <a href="{{ asset('storage/' . $laporan->laporan) }}" target="_blank">{{
                                    basename($laporan->laporan) }}</a>
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
                                    <a href="/dashboard/admin/laporan" class="btn btn-secondary mx-1"><i
                                            class="bi bi-arrow-left-circle"></i>
                                        Kembali</a>
                                    <button type="submit" class="btn btn-success mx-1"><i
                                            class="bi bi-file-earmark-check"></i>
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