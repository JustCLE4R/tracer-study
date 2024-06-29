@extends('dashboard.layouts.main')
@section('content')

<div class="container-fluid pt-4 px-4">
  <div class="row g-4">
    <div class="col-sm-12 col-xl-12">
      <div class="bg-light rounded p-4 border-top border-success border-5">
        <div class="row">
          <div class="col-12">
            <span class="h4">Edit Pendidikan</span>
            <hr>
          </div>

          <form class="d-flex" action="/dashboard/pendidikan/{{ $pendidikan->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row justify-content-between">
                <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                  <label class="form-label text-secondary">Tingkat Pendidikan *</label>
                  <select class="form-select @error('tingkat_pendidikan') is-invalid @enderror" name="tingkat_pendidikan">
                    <option hidden="">Pilih Tingkat Pendidikan</option>
                    <option value="a" {{ old('tingkat_pendidikan', $pendidikan->getRawOriginal('tingkat_pendidikan')) == 'a' ? 'selected' : '' }}>S1</option>
                    <option value="b" {{ old('tingkat_pendidikan', $pendidikan->getRawOriginal('tingkat_pendidikan')) == 'b' ? 'selected' : '' }}>S2</option>
                    <option value="c" {{ old('tingkat_pendidikan', $pendidikan->getRawOriginal('tingkat_pendidikan')) == 'c' ? 'selected' : '' }}>S3</option>
                  </select>
                  @error('tingkat_pendidikan')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                  <label class="form-label text-secondary">Program Studi *</label>
                  <input class="form-control @error('program_studi') is-invalid @enderror" type="text" name="program_studi" value="{{ old('program_studi', $pendidikan->program_studi) }}">
                  @error('program_studi')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                  <label class="form-label text-secondary">Perguruan Tinggi *</label>
                  <input class="form-control @error('perguruan_tinggi') is-invalid @enderror" type="text" name="perguruan_tinggi" value="{{ old('perguruan_tinggi', $pendidikan->perguruan_tinggi) }}">
                  @error('perguruan_tinggi')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                  <label class="form-label text-secondary">Tanggal Surat Penerimaan Kuliah *</label>
                  <input class="form-control @error('tgl_surat_penerimaan_pendidikan') is-invalid @enderror" type="date" name="tgl_surat_penerimaan_pendidikan" value="{{ old('tgl_surat_penerimaan_pendidikan', $pendidikan->tgl_surat_penerimaan_pendidikan) }}">
                  @error('tgl_surat_penerimaan_pendidikan')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                  </div>
                <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                  <label class="form-label text-secondary">Tanggal Mulai Kuliah *</label>
                  <input class="form-control @error('tgl_mulai_pendidikan') is-invalid @enderror" type="date" name="tgl_mulai_pendidikan" value="{{ old('tgl_mulai_pendidikan', $pendidikan->tgl_mulai_pendidikan) }}">
                  @error('tgl_mulai_pendidikan')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                  <label class="form-label text-secondary">Status Saat Ini *</label>
                  <select class="form-select @error('is_studying') is-invalid @enderror" name="is_studying">
                    <option hidden="">Pilih Status Saat Ini</option>
                    <option value="0" {{ old('is_studying', $pendidikan->getRawOriginal('is_studying')) == '0' ? 'selected' : '' }}>Sudah Selesai</option>
                    <option value="1" {{ old('is_studying', $pendidikan->getRawOriginal('is_studying')) == '1' ? 'selected' : '' }}>Masih Kuliah</option>
                  </select>
                  @error('is_studying')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                  <label class="form-label text-secondary">Program Studi Satu Linier *</label>
                  <select class="form-select @error('is_linear') is-invalid @enderror" name="is_linear">
                    <option hidden="">Pilih Program Studi Satu Linier</option>
                    <option value="0" {{ old('is_linear', $pendidikan->getRawOriginal('is_linear')) == '0' ? 'selected' : '' }}>Tidak</option>
                    <option value="1" {{ old('is_linear', $pendidikan->getRawOriginal('is_linear')) == '1' ? 'selected' : '' }}>Ya</option>
                  </select>
                  @error('is_linear')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                  <label class="form-label text-secondary">Wilayah Pendidikan *</label>
                  <select class="form-select @error('wilayah_pendidikan') is-invalid @enderror" id="wilayahPendidikan" name="wilayah_pendidikan">
                    <option hidden="">Pilih Wilayah Pendidikan Anda</option>
                    <option value="0" {{ old('wilayah_pendidikan', $pendidikan->wilayah_pendidikan) == '0' ? 'selected' : '' }}>Didalam Negeri</option>
                    <option value="1" {{ old('wilayah_pendidikan', $pendidikan->wilayah_pendidikan) == '1' ? 'selected' : '' }}>Diluar Negeri</option>
                  </select>
                  @error('wilayah_pendidikan')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                
                <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                  <label class="form-label text-secondary">Negara *</label>
                  <input class="form-control @error('negara_pendidikan') is-invalid @enderror" id="negara" type="text" name="negara_pendidikan" value="{{ old('negara_pendidikan', $pendidikan->negara_pendidikan) }}">
                  @error('negara_pendidikan')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                
                <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                  <label class="form-label text-secondary">Provinsi *</label>
                  <select class="form-select" id="provinsi" name="provinsi_pendidikan">
                    <option hidden="">Pilih Provinsi</option>
                    <!-- Options will be populated by JavaScript -->
                  </select>
                </div>
                
                <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                  <label class="form-label text-secondary">Kabupaten/Kota *</label>
                  <select class="form-select" id="kota" name="kabupaten_pendidikan">
                    <option hidden="">Pilih Kabupaten/Kota</option>
                    <!-- Options will be populated by JavaScript -->
                  </select>
                </div>
                
                <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                  <label class="form-label text-secondary">Alamat Lengkap *</label>
                  <input class="form-control @error('alamat_pendidikan') is-invalid @enderror" type="text" name="alamat_pendidikan" value="{{ old('alamat_pendidikan', $pendidikan->alamat_pendidikan) }}">
                  @error('alamat_pendidikan')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                
                
                <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                  <label for="bukti_pendidikan" class="form-label">Bukti Pendidikan (KTM/Surat Aktif Kuliah)</label>
                  <input type="hidden" name="oldImage" value="{{ $pendidikan->bukti_pendidikan }}">
                  @if ($pendidikan->bukti_pendidikan)
                    <img src="{{ asset('storage/'.$pendidikan->bukti_pendidikan) }}" class="img-fluid mb-3 col-sm-5 d-block" id="img-preview">
                  @else
                    <img class="img-fluid mb-3 col-sm-5" id="img-preview">
                  @endif

                  <input class="form-control @error('bukti_pendidikan') is-invalid @enderror" type="file" id="bukti_pendidikan" name="bukti_pendidikan" onchange="previewImage()">
                  @error('bukti_pendidikan')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 my-2 d-flex align-items-end justify-content-center">
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                      <a href="/dashboard/perjalanan-karir" class="form-control btn btn-secondary">Kembali</a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                      <button class="form-control btn btn-success">Simpan!</button>
                    </div>
                  </div>
                </div>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const apiURL = '/json/data.json';

  const wilayahPendidikanSelect = document.getElementById('wilayahPendidikan');
  const negaraInput = document.getElementById('negara');
  const provinsiSelect = document.getElementById('provinsi');
  const kotaSelect = document.getElementById('kota');

  const initWilayahPendidikan = '{{ old("is_linear", $pendidikan->is_linear) }}';
  const initNegara = '{{ old("negara_pendidikan", $pendidikan->negara_pendidikan) }}';
  const initProvinsi = '{{ old("provinsi_pendidikan", $pendidikan->provinsi_pendidikan) }}';
  const initKabupaten = '{{ old("kabupaten_pendidikan", $pendidikan->kabupaten_pendidikan) }}';

  function updateFormFields() {
    if (initWilayahPendidikan === '0') {
      negaraInput.value = 'Indonesia';
      negaraInput.disabled = true;
      provinsiSelect.disabled = false;
      kotaSelect.disabled = false;
    } else if (initWilayahPendidikan === '1') {
      negaraInput.value = initNegara || '';
      negaraInput.disabled = false;
      provinsiSelect.disabled = true;
      kotaSelect.disabled = true;
    }
  }

  wilayahPendidikanSelect.addEventListener('change', function() {
    const selectedValue = this.value;
    if (selectedValue === '0') {
      negaraInput.value = 'Indonesia';
      negaraInput.disabled = true;
      provinsiSelect.disabled = false;
      kotaSelect.disabled = false;
    } else if (selectedValue === '1') {
      negaraInput.value = '';
      negaraInput.disabled = false;
      provinsiSelect.disabled = true;
      kotaSelect.disabled = true;
    }
  });

  fetch(apiURL)
    .then(response => response.json())
    .then(data => {
      data.forEach(prov => {
        const option = document.createElement('option');
        option.value = prov.provinsi;
        option.textContent = prov.provinsi;
        if (prov.provinsi === initProvinsi) {
          option.selected = true;
        }
        provinsiSelect.appendChild(option);
      });

      provinsiSelect.addEventListener('change', function() {
        kotaSelect.innerHTML = '<option hidden="">Pilih Kabupaten/Kota</option>';
        
        const selectedProvinsi = this.value;
        
        const selectedData = data.find(prov => prov.provinsi === selectedProvinsi);
        
        if (selectedData && selectedData.kota) {
          selectedData.kota.forEach(kabupaten => {
            const option = document.createElement('option');
            option.value = kabupaten;
            option.textContent = kabupaten;
            if (kabupaten === initKabupaten) {
              option.selected = true;
            }
            kotaSelect.appendChild(option);
          });
        }
      });

      if (initProvinsi) {
        provinsiSelect.dispatchEvent(new Event('change'));
      }
    })
    .catch(error => console.error('Error fetching data:', error));

  updateFormFields();
});

</script>
@endsection