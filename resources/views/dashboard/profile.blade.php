@extends('dashboard.layouts.main')
@section('content')
<div class="container">
  <div class="main-body">
    <div class="row gutters-sm">
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
                <span class="text-secondary my-1">{{ Auth::user()->telepon }}</span>
                <hr>
              </div>
            </div>
            <div class="row ">
              <div class="col">
                <h6 class="my-1 "> <i class="bi bi-envelope-at-fill"></i> Email</h6>
                <span class="text-secondary my-1">{{ Auth::user()->email }}</span>
                <hr>
              </div>
            </div>
            <div class="row ">
              <div class="col">
                <h6 class="my-1"><i class="bi bi-linkedin"></i> Linkedin</h6>
                <span class="text-secondary my-1">{{ Auth::user()->linkedin ? Auth::user()->linkedin : 'Belum diisi' }}</span>
                <hr>
              </div>
            </div>
            <div class="row ">
              <div class="col">
                <h6 class="my-1"><i class="bi bi-facebook"></i> Facebook</h6>
                <span class="text-secondary my-1">{{ Auth::user()->facebook ? Auth::user()->facebook : 'Belum diisi' }}</span>
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
                {{ Auth::user()->fakultas ? Auth::user()->fakultas : 'Belum diisi' }}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Tingkat Pendidikan</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                {{ Auth::user()->strata ? Auth::user()->strata : 'Belum diisi' }}
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
                {{ Auth::user()->tgl_lulus ? Auth::user()->tgl_lulus : 'Belum diisi' }}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Tanggal Yudisium</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                {{ Auth::user()->tgl_yudisium ? Auth::user()->tgl_yudisium : 'Belum diisi' }}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Tanggal Wisuda</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                {{ Auth::user()->tgl_wisuda ? Auth::user()->tgl_wisuda : 'Belum diisi' }}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">IPK</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                {{ Auth::user()->ipk ? Auth::user()->ipk : 'Belum diisi' }}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">SKS Kumulatif</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                {{ Auth::user()->sks_kumulatif ? Auth::user()->sks_kumulatif : 'Belum diisi' }}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Predikat Kelulusan</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                {{ Auth::user()->predikat_kelulusan ? Auth::user()->predikat_kelulusan : 'Belum diisi' }}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Judul Tugas Akhir</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                {{ Auth::user()->judul_tugas_akhir ? Auth::user()->judul_tugas_akhir : 'Belum diisi' }}
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
                {{ Auth::user()->nomor_ktp ? Auth::user()->nomor_ktp : 'Belum diisi' }}
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
                {{ Auth::user()->tgl_lahir }}
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
                Lajang
              </div>
            </div>
            <hr> --}}
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Kewarganegaraan</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                {{ Auth::user()->kewarganegaraan ? Auth::user()->kewarganegaraan : 'Belum diisi' }}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Tempat Tinggal</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <ul>
                  <li class="mb-1">Provinsi : {{ Auth::user()->provinsi ? Auth::user()->provinsi : 'Belum diisi' }}</li>
                  <li class="my-1">Kabupaten/Kota : {{ Auth::user()->kabupaten ? Auth::user()->kabupaten : 'Belum diisi' }}</li>
                  {{-- <li class="my-1">Kecamatan : {{ Auth::user()->kecamatan }}</li> --}}
                </ul>
              </div>
            </div>

            <div class="row mt-2">
              <div class="col-12 text-end">
                <button class="btn btn-success"><i class="bi bi-pencil-square"></i> Perbaharui Data Diri</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection