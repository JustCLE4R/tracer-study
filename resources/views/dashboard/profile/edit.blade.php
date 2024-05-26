@extends('dashboard.layouts.main')
@section('content')
<div class="container">
  <div class="main-body">
    <div class="row gutters-sm">
      <form class="row" action="" method="POST">
        @csrf
        @method('PATCH')
        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">
                <img src="{{ Auth::user()->foto ? url('https://pmb.uinsu.ac.id/file/photo/' . Auth::user()->foto) : 'https://bootdey.com/img/Content/avatar/avatar7.png' }}" alt="Admin" class="rounded-circle"
                  width="150">
                <div class="mt-3">
                  <h4>{{ Auth::user()->nama }}</h4>
                </div>
              </div>
              <div class="row mt-2 mb-1">
                <span class="h5 text-center">Informasi Kontak</span>
              </div>
              <div class="row">
                <div class="col">
                  <h6 class="my-1"> <i class="bi bi-telephone-outbound-fill"></i> Telepon</h6>
                  <input type="text" class="form-control @error('telepon') is-invalid @enderror" name="telepon" value="{{ old('telepon', Auth::user()->telepon) }}">
                  @error('telepon')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                  <hr>
                </div>
              </div>
              <div class="row ">
                <div class="col">
                  <h6 class="my-1 "> <i class="bi bi-envelope-at-fill"></i> Email</h6>
                  <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', Auth::user()->email) }}">
                  @error('email')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                  <hr>
                </div>
              </div>
              <div class="row ">
                <div class="col">
                  <h6 class="my-1"><i class="bi bi-linkedin"></i> Linkedin</h6>
                  <input type="text" class="form-control @error('linkedin') is-invalid @enderror" name="linkedin" value="{{ old('linkedin', Auth::user()->linkedin) }}">
                  @error('linkedin')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                  <hr>
                </div>
              </div>
              <div class="row ">
                <div class="col">
                  <h6 class="my-1"><i class="bi bi-facebook"></i> Facebook</h6>
                  <input type="text" class="form-control @error('facebook') is-invalid @enderror" name="facebook" value="{{ old('facebook', Auth::user()->facebook) }}">
                  @error('facebook')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card mb-3  ">
            <div class="card-body">
              <div class="row my-1">
                <div class="col text-center">
                  <span class="h4 "> Informasi Akademik</span>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">NIM</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ Auth::user()->nim }}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Nama</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ Auth::user()->nama }}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Program Studi</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ Auth::user()->program_studi }}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Fakultas</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ Auth::user()->fakultas }}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Tingkat Pendidikan</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ Auth::user()->strata }}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Tahun Angkatan</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ Auth::user()->tahun_masuk }}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Tanggal Lulus</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <input type="date" class="form-control @error('tgl_lulus') is-invalid @enderror" name="tgl_lulus" value="{{ old('tgl_lulus', Auth::user()->tgl_lulus) }}">
                  @error('tgl_lulus')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Tanggal Yudisium</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <input type="date" class="form-control @error('tgl_yudisium') is-invalid @enderror" name="tgl_yudisium" value="{{ old('tgl_yudisium', Auth::user()->tgl_yudisium) }}">
                  @error('tgl_yudisium')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Tanggal Wisuda</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <input type="date" class="form-control @error('tgl_wisuda') is-invalid @enderror" name="tgl_wisuda" value="{{ old('tgl_wisuda', Auth::user()->tgl_wisuda) }}">
                  @error('tgl_wisuda')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">IPK</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ Auth::user()->ipk }}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">SKS Kumulatif</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ Auth::user()->sks_kumulatif }}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Predikat Kelulusan</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ Auth::user()->predikat_kelulusan ? Auth::user()->predikat_kelulusan : 'Isi IPK untuk menampilkan predikat' }}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Judul Tugas Akhir</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <input type="text" class="form-control @error('judul_tugas_akhir') is-invalid @enderror" name="judul_tugas_akhir" value="{{ old('judul_tugas_akhir', Auth::user()->judul_tugas_akhir) }}">
                  @error('judul_tugas_akhir')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
              <hr>

              <div class="row my-2">
                <div class="col text-center">
                  <span class="h4 "> Informasi Pribadi</span>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Nomor KTP</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ Auth::user()->nomor_ktp }}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Tempat Lahir</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ Auth::user()->tempat_lahir }}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Tanggal Lahir</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ \Carbon\Carbon::parse(Auth::user()->tgl_lahir)->format('d-m-Y') }}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Jenis Kelamin</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  @if (Auth::user()->jenis_kelamin == 'L')
                    Laki - Laki
                  @else
                    Perempuan
                  @endif
                </div>
              </div>
              <hr>
              {{-- <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Status Pernikahan</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <input type="text" class="form-control" name="">
                </div>
              </div>
              <hr> --}}
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Kewarganegaraan</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ Auth::user()->kewarganegaraan }}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Tempat Tinggal</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <ul>
                    <li class="mb-1"><span>Provinsi</span><input type="text" class="form-control @error('provinsi') is-invalid @enderror" name="provinsi" value="{{ old('provinsi', Auth::user()->provinsi) }}">
                      @error('provinsi')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </li>


                    <li class="my-1"><span>Kabupaten/Kota</span><input type="text" class="form-control @error('kabupaten') is-invalid @enderror" name="kabupaten" value="{{ old('kabupaten', Auth::user()->kabupaten) }}">
                      @error('kabupaten')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </li>

                    <li class="my-1"><span>Kecamatan</span><input type="text" class="form-control @error('kecamatan') is-invalid @enderror" name="kecamatan" value="{{ old('kecamatan', Auth::user()->kecamatan) }}">
                      @error('kecamatan')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </li>

                    <li class="my-1"><span>Alamat</span><input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat', Auth::user()->alamat) }}">
                      @error('alamat')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </li>
                  </ul>
                </div>
              </div>

                <div class="row justify-content-end my-3">
                  <div class="col-lg-4 col-md-4 col-sm-6">
                    <a href="/dashboard/profile" class="form-control btn btn-secondary">Kembali</a>
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-6">
                    <button class="form-control btn btn-success">Simpan!</button>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection