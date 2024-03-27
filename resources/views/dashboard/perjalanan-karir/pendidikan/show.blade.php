@extends('dashboard.layouts.main')
@section('content')

<div class="container-fluid pt-4 px-4">
  <div class="row g-4">
    <div class="col-sm-12 col-xl-12">
      <div class="bg-light rounded p-4 border-top border-success border-5">
        <div class="row">
          <div class="col-12">
            <span class="h4">Lihat Pendidikan</span>
            <hr>
          </div>

          <form class="d-flex" action="/dashboard/pendidikan/{{ $pendidikan->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                    <label class="form-label text-secondary">Tingkat Pendidikan *</label>
                    <select class="form-select" name="tingkat_pendidikan" disabled>
                        <option hidden="">Pilih Tingkat Pendidikan</option>
                        <option value="a" {{ old('tingkat_pendidikan', $pendidikan->tingkat_pendidikan) == 'a' ? 'selected' : '' }}>S1</option>
                        <option value="b" {{ old('tingkat_pendidikan', $pendidikan->tingkat_pendidikan) == 'b' ? 'selected' : '' }}>S2</option>
                        <option value="c" {{ old('tingkat_pendidikan', $pendidikan->tingkat_pendidikan) == 'c' ? 'selected' : '' }}>S3</option>
                    </select>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                    <label class="form-label text-secondary">Program Studi *</label>
                    <input class="form-control" type="text" name="program_studi" value="{{ old('program_studi', $pendidikan->program_studi) }}" disabled>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                    <label class="form-label text-secondary">Perguruan Tinggi *</label>
                    <input class="form-control" type="text" name="perguruan_tinggi" value="{{ old('perguruan_tinggi', $pendidikan->perguruan_tinggi) }}" disabled>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                    <label class="form-label text-secondary">Tanggal Surat Penerimaan Kuliah *</label>
                    <input class="form-control" type="date" name="tgl_surat_penerimaan_pendidikan" value="{{ old('tgl_surat_penerimaan_pendidikan', $pendidikan->tgl_surat_penerimaan_pendidikan) }}" disabled>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                    <label class="form-label text-secondary">Tanggal Mulai Kuliah *</label>
                    <input class="form-control" type="date" name="tgl_mulai_pendidikan" value="{{ old('tgl_mulai_pendidikan', $pendidikan->tgl_mulai_pendidikan) }}" disabled>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                    <label class="form-label text-secondary">Status Saat Ini *</label>
                    <select class="form-select" name="is_studying" disabled>
                        <option hidden="">Pilih Status Saat Ini</option>
                        <option value="0" {{ old('is_studying', $pendidikan->is_studying) == '0' ? 'selected' : '' }}>Sudah Selesai</option>
                        <option value="1" {{ old('is_studying', $pendidikan->is_studying) == '1' ? 'selected' : '' }}>Masih Kuliah</option>
                    </select>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                    <label class="form-label text-secondary">Program Studi Satu Linier *</label>
                    <select class="form-select" name="is_linear" disabled>
                        <option hidden="">Pilih Program Studi Satu Linier</option>
                        <option value="0" {{ old('is_linear', $pendidikan->is_linear) == '0' ? 'selected' : '' }}>Tidak</option>
                        <option value="1" {{ old('is_linear', $pendidikan->is_linear) == '1' ? 'selected' : '' }}>Ya</option>
                    </select>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                    <label class="form-label text-secondary">Negara *</label>
                    <input class="form-control" type="text" name="negara_pendidikan" value="{{ old('negara_pendidikan', $pendidikan->negara_pendidikan) }}" disabled>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                    <label class="form-label text-secondary">Provinsi *</label>
                    <input class="form-control" type="text" name="provinsi_pendidikan" value="{{ old('provinsi_pendidikan', $pendidikan->provinsi_pendidikan) }}" disabled>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                    <label class="form-label text-secondary">Kabupaten *</label>
                    <input class="form-control" type="text" name="kabupaten_pendidikan" value="{{ old('kabupaten_pendidikan', $pendidikan->kabupaten_pendidikan) }}" disabled>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                    <label for="bukti_pendidikan" class="form-label">Bukti Pendidikan</label>
                    <input type="hidden" name="oldImage" value="{{ $pendidikan->bukti_pendidikan }}">
                    <img src="{{ asset('storage/'.$pendidikan->bukti_pendidikan) }}" class="img-fluid mb-3 col-sm-5 d-block" id="img-preview">
                </div>
                
            </div>
           </form>
        

        </div>
      </div>
    </div>
  </div>
</div>
@endsection