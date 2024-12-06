@extends('dashboard.layouts.main')

@section('content')
{{-- profile --}}
<div class="container">
  <div class="main-body">
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="row gutters-sm p-3 mt-1">
      <div class="col-md-4 mb-3">
        <div class="card ">
          <div class="card-body bg-light rounded p-5 border-top border-success border-5">
            <div class="d-flex flex-column align-items-center text-center">
              <div class="rounded-circle overflow-hidden" style="width: 150px; height: 150px;">
                <img src="{{ $user->foto ? url('https://pmb.uinsu.ac.id/file/photo/' . $user->foto) : url('/img/account.png') }}" alt="Admin" class="img-fluid" style="object-fit: cover; width: 100%; height: 100%;">
              </div>
              
              <div class="mt-3">
            <h4>{{ $user->nama }}</h4>
              </div>
            </div>
            <div class="row mt-2 mb-1">
              <span class="h5 text-center">Informasi Kontak</span>
            </div>
            <div class="row">
              <div class="col">
                <h6 class="my-1"> <i class="bi bi-telephone-outbound-fill"></i> Telepon</h6>
                <span class="text-secondary my-1">{{ $user->telepon }}</span>
                <hr>
              </div>
            </div>
            <div class="row ">
              <div class="col">
                <h6 class="my-1 "> <i class="bi bi-envelope-at-fill"></i> Email</h6>
                <span class="text-secondary my-1">{{ $user->email }}</span>
                <hr>
              </div>
            </div>
            <div class="row ">
              <div class="col">
                <h6 class="my-1"><i class="bi bi-linkedin"></i> Linkedin</h6>
                <span class="text-secondary my-1"><a style="text-decoration: none" class="text-success" href="{{ $user->linkedin ? $user->linkedin : 'Belum diisi' }}">Kunjungi</a></span>
                <hr>
              </div>
            </div>
            <div class="row ">
              <div class="col">
                <h6 class="my-1"><i class="bi bi-facebook"></i> Facebook</h6>
                <span class="text-secondary my-1"><a style="text-decoration: none" class="text-success" href="{{ $user->facebook ? $user->facebook : 'Belum diisi' }}">Kunjungi</a></span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card mb-3  ">
          <div class="card-body bg-light rounded p-5 border-top border-success border-5">
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
                {{ $user->nim }}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Nama</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                {{ $user->nama }}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Program Studi</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                {{ $user->program_studi }}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Fakultas</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                {{ $user->fakultas ? $user->fakultas : 'Belum diisi' }}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Tingkat Pendidikan</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                {{ $user->strata ? $user->strata : 'Belum diisi' }}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Tahun Angkatan</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                {{ $user->tahun_masuk }}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Tanggal Lulus</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                {{ $user->tgl_lulus ? \Carbon\Carbon::parse($user->tgl_lulus)->format('d-m-Y') : 'Belum diisi' }}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Tanggal Yudisium</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                {{ $user->tgl_yudisium ? \Carbon\Carbon::parse($user->tgl_yudisium)->format('d-m-Y') : 'Belum diisi' }}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Tanggal Wisuda</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                {{ $user->tgl_wisuda ? \Carbon\Carbon::parse($user->tgl_wisuda)->format('d-m-Y') : 'Belum diisi' }}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">IPK</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                {{ $user->ipk ? $user->ipk : 'Belum diisi' }}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">SKS Kumulatif</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                {{ $user->sks_kumulatif ? $user->sks_kumulatif : 'Belum diisi' }}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Predikat Kelulusan</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                {{ $user->predikat_kelulusan ? $user->predikat_kelulusan : 'Belum diisi' }}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Judul Tugas Akhir</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                {{ $user->judul_tugas_akhir ? $user->judul_tugas_akhir : 'Belum diisi' }}
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
                {{ $user->nomor_ktp ? $user->nomor_ktp : 'Belum diisi' }}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Tempat Lahir</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                {{ $user->tempat_lahir }}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Tanggal Lahir</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                {{ \Carbon\Carbon::parse($user->tgl_lahir)->format('d-m-Y') }}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Jenis Kelamin</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                @if ($user->jenis_kelamin == 'L')
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
                {{ $user->kewarganegaraan ? $user->kewarganegaraan : 'Belum diisi' }}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Tempat Tinggal</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <ul>
                  <li class="mb-1">Provinsi : {{ $user->provinsi ? $user->provinsi : 'Belum diisi' }}</li>
                  <li class="my-1">Kabupaten/Kota : {{ $user->kabupaten ? $user->kabupaten : 'Belum diisi' }}</li>
                  <li class="my-1">Kecamatan : {{ $user->kecamatan ? $user->kecamatan : 'Belum diisi' }}</li>
                  <li class="my-1">Alamat : {{ $user->alamat ? $user->alamat : 'Belum diisi' }}</li>
                </ul>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-12 text-end">
                <a href="/dashboard/admin/super-2/user/{{ $user->id }}/edit" class="btn btn-warning text-white"><i class="bi bi-pencil-square"></i> Perbaharui Data Diri</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- perjalanan-karir --}}
    <div class="row gutters-sm mt-5 justify-content-center p-3">
      <div class="col-lg-6 col-md-6 col-sm-12  my-2  position-relative">
        <div class="accordion " id="accordionExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
              <button class="accordion-button border-top border-success border-5 bg-light shadow rounded" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="background-color: #fff;">
                <span class="h5 text-success p-2" style="font-weight: bold">Riwayat Pekerjaan </span>
              </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <div class="timeline mx-3 pb-5">
                  <div class="row justify-content-between">
                    {{-- <div class="col-7 ">
                      <a href="/dashboard/perjalanan-karir/create" class="btn btn-success btn-sm @if ($user->is_bekerja == 0) disabled @endif"><i class="bi bi-plus-lg"></i> Tambah Riwayat</a>
                    </div> --}}
                    <div class="col-5 text-end">
                      <span class=" mt-1 text-success ">Setelah Lulus</span>
                    </div>
                  </div>

                  @if($user->is_bekerja == 0)
                    <div class="timeline__event animated fadeInUp delay-1s timeline__event--type1">
                      <div class="timeline__event__icon">
                        <i class="bi bi-person-workspace"></i>
                      </div>
                      <div class="timeline__event__date">
                        Belum Bekerja
                      </div>
                      <div class="timeline__event__content">
                        {{-- <div class="timeline__event__title">
                          Bekerja
                        </div> --}}
                        <div class="timeline__event__description">
                          <small class="text-muted">Hapus untuk menambah riwayat lainnya</small>
                        </div>
                        <div class="col mt-2 float-end">
                          <form class="d-inline" action="/dashboard/hapusBelumKerja" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-link btn-sm text-success m-0 p-0"><i class="bi bi-trash3"></i></button>
                          </form>
                        </div>
                      </div>
                    </div>
                  @endif

                  <!--first-->
                  @foreach ($pekerjaans as $pekerjaan)
                    <div class="timeline__event animated fadeInUp delay-1s timeline__event--type1">
                      <div class="timeline__event__icon">
                        <i class="bi bi-person-workspace"></i>
                      </div>
                      <div class="timeline__event__date">
                        {{ $pekerjaan->detail_pekerjaan." | ".$pekerjaan->jabatan_pekerjaan}}

                      </div>
                      <div class="timeline__event__content">
                        <div class="timeline__event__title">
                          @if ($pekerjaan->tipe_kerja == 'pekerja')
                            Bekerja
                          @elseif($pekerjaan->tipe_kerja == 'wirausaha')
                            Berwirausaha
                          @endif
                        </div>
                        {{-- @dd($pekerjaan) --}}
                        <div class="timeline__event__description">
                          <p>{{ \Carbon\Carbon::parse($pekerjaan->tanggal_mulai)->translatedFormat('d F Y') .' - '. ($pekerjaan->is_active ? 'Sekarang' : \Carbon\Carbon::parse($pekerjaan->tanggal_akhir)->translatedFormat('d F Y')) }}</p>
                        </div>
                        <div class="col mt-2 float-end">
                          <a href="/dashboard/{{ $pekerjaan->tipe_kerja }}/{{ $pekerjaan->id }}/edit" class="btn btn-link btn-sm text-success m-0 p-0"><i class="bi bi-pencil-square"></i></a>
                          <form class="d-inline" action="/dashboard/{{ $pekerjaan->tipe_kerja }}/{{ $pekerjaan->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-link btn-sm text-success m-0 p-0"><i class="bi bi-trash3"></i></button>
                          </form>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="col-lg-6 col-md-6 col-sm-12  my-2  position-relative">
        <div class="accordion" id="accordionEducation">
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingEducation">
              <button class="accordion-button border-top border-success border-5 bg-light shadow rounded" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEducation" aria-expanded="true" aria-controls="collapseEducation" style="background-color: #fff;">
                <span class="h5 text-success p-2" style="font-weight: bold">Riwayat Pendidikan </span>
              </button>
            </h2>
            <div id="collapseEducation" class="accordion-collapse collapse show" aria-labelledby="headingEducation" data-bs-parent="#accordionEducation">
              <div class="accordion-body">
                <div class="timeline pb-5">
                  <div class="row justify-content-between">
                    
                    {{-- <div class="col-7 ">
                      <a href="/dashboard/pendidikan/create" class="btn btn-success btn-sm"><i class="bi bi-plus-lg"></i> Tambah Riwayat</a>
                    </div> --}}
                    <div class="col-5 text-end">
                      <span class=" mt-1 text-success ">Setelah Lulus </span>
                    </div>
                  </div>
                  
                  @foreach ($user->pendidikan as $pendidikan)
                    <div class="timeline__event animated fadeInUp delay-1s timeline__event--type1">
                      <div class="timeline__event__icon">
                        <i class="bi bi-mortarboard-fill"></i>
                      </div>
                      <div class="timeline__event__date">
                        {{ $pendidikan->program_studi }} ({{ $pendidikan->perguruan_tinggi }})
                      </div>
                      <div class="timeline__event__content">
                        <div class="timeline__event__title">
                          @if ($pendidikan->tingkat_pendidikan == 'a')
                            Strata 1 (S1)
                          @elseif ($pendidikan->tingkat_pendidikan == 'b')
                            Strata 2 (S2)
                          @else
                            Strata 3 (S3)
                          @endif
                        </div>
                        <div class="timeline__event__description">
                          <p>{{ \Carbon\Carbon::parse($pendidikan->tgl_mulai_pendidikan)->translatedFormat('d F Y', 'id_ID') }}</p>
                        </div>
        
                        <div class="col mt-2 float-end">
                          <a href="/dashboard/pendidikan/{{ $pendidikan->id }}" class="btn btn-link btn-sm text-success m-0 p-0"><i class="bi bi-eye"></i></a>
                          <a href="/dashboard/pendidikan/{{ $pendidikan->id }}/edit" class="btn btn-link btn-sm text-success m-0 p-0"><i class="bi bi-pencil-square"></i></a>
                          <form action="/dashboard/pendidikan/{{ $pendidikan->id }}" method="post" class="d-inline m-0 p-0">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-link btn-sm text-success m-0 p-0" onclick="return confirm('Are you sure?')"><i class="bi bi-trash3"></i></button>
                          </form>
                        </div>
                      </div>
                    </div>
                  @endforeach

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- Career Posting --}}
    <div class="row gutters-sm p-3 mt-2">
      <div class="col-sm-12 col-xl-12">
        <div class="bg-light rounded p-5 border-top border-success border-5">
            <div class="row">
                <div class="col-12">
                    <span class="h4">Career</span>
                    <hr>
                </div>
            </div>
                  <div class="table-responsive">
                    <table  class="table text-start align-middle table-bordered table-hover mb-0">
                      <thead>
                        <tr  class="text-dark">
                          <th style="background-color: transparent !important;" class="col">No</th>
                          <th style="background-color: transparent !important;" class="col">Perusahaan</th>
                          <th style="background-color: transparent !important;" class="col">Posisi</th>
                          <th style="background-color: transparent !important;" class="col text-center">Aksi</th>
                        </tr>
                      </thead>
                      <tbody style="background-color: transparent !important;" >
                        @foreach ($user->career as $career)
                        <tr>
                          <td style="background-color: transparent !important;">{{ $loop->index + 1 }}</td>
                          <td style="background-color: transparent !important;">{{ $career->company_name }}</td>
                          <td style="background-color: transparent !important;">{{ $career->position }}</td>
                          <td style="background-color: transparent !important;" class="text-center">
                            <a  href="/dashboard/admin/super-2/career/{{ $career->slug }}/judge" class="btn btn-success btn-sm px-1 m-1 py-0 text-white"><i class="bi bi-eye"></i></a>
                            <a href="/dashboard/admin/super-2/career/{{ $career->slug }}/edit" class="btn btn-success btn-sm px-1 m-1 py-0 text-white"><i class="bi bi-pencil-square"></i></a>
                            <form class="d-inline" action="/dashboard/admin/super-2/career/{{ $career->slug }}" method="post">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-success m-1 btn-sm px-1 py-0 text-white" onclick="return confirm('Are you sure?')"><i class="bi bi-trash3"></i></button>
                            </form>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>

            {{-- table end --}}
        </div>
    </div>
    </div>
  </div>
</div>
@endsection