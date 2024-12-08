@extends('dashboard.layouts.main')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded p-5 border-top border-success border-5" style="min-height: 80vh;">
                    <div class="row">
                        <div class="col-12">
                            <span class="h4">Informasi Karir</span>
                            <hr>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="float-end">
                            <a href="/dashboard/admin/super/user/{{ $career->user->id }}"
                                class="btn btn-success btn-sm px-1 py-0 text-white"><i class="bi bi-person"></i> Porfil</a>
                            <a href="/dashboard/admin/super/career/{{ $career->slug }}/edit"
                                class="btn btn-primary btn-sm px-1 py-0 text-white"><i class="bi bi-pencil"></i> Edit</a>
                            <form action="/dashboard/admin/super/career/{{ $career->slug }}" method="POST" class="d-inline"
                                id="deleteForm-{{ $career->slug }}">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="from" value="{{ request('from') }}">
                                <button type="button" class="btn btn-danger btn-sm px-1 py-0"
                                    onclick="confirmDelete('{{ $career->slug }}')">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>

                            <script>
                                function confirmDelete(careerSlug) {
                                    Swal.fire({
                                        title: 'Apakah Anda yakin?',
                                        text: 'Data yang dihapus tidak dapat dikembalikan!',
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#d33',
                                        cancelButtonColor: '#3085d6',
                                        confirmButtonText: 'Ya, hapus!',
                                        cancelButtonText: 'Batal',
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            document.getElementById('deleteForm-' + careerSlug).submit();
                                        }
                                    });
                                }
                            </script>

                        </div>
                        <img src="/storage/{{ $career->image }}" alt="">
                        <p><b>Perusahaan:</b> {{ $career->company_name }}</p>
                        <p><b>Posisi:</b> {{ $career->position }}</p>
                        <p><b>Kategori:</b> {{ $career->category }}</p>
                        <p><b>Deskripsi: </b>{!! $career->description !!}</p>
                        <p><b>Posted at:</b> {{ $career->created_at->format('d M Y H:i') }}</p>
                        <!-- Add more details as needed -->
                    </div>


                    <form action="{{ url('dashboard/admin/super/career/' . $career->slug . '/judge') }}" method="POST"
                        class="mt-4">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="from" value="{{ request('from') }}">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status"
                                class="form-control @error('status') is-invalid @enderror">
                                <option value="approved">Setujui</option>
                                <option value="rejected">Tolak</option>
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
                        <a href="javascript:history.back()" class="btn btn-secondary mt-3">Kembali</a>
                        <button type="submit" class="btn btn-success mt-3">Kirim</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
