@extends('dashboard.layouts.main')
@section('content')
<div class="container">
  <div class="main-body">
    <div class="row gutters-sm">
      <div class="col-md-4 mb-3">
        <div class="card">
          <div class="card-body">
            <div class="d-flex flex-column align-items-center text-center">
              <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle"
                width="150">
              <div class="mt-3">
                <h4>Paris Alvito</h4>
              </div>
            </div>
            <div class="row mt-2 mb-1">
              <span class="h5 text-center">Informasi Kontak</span>
            </div>
            <div class="row">
              <div class="col">
                <h6 class="my-1"> <i class="bi bi-telephone-outbound-fill"></i> Telepon</h6>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <hr>
              </div>
            </div>
            <div class="row ">
              <div class="col">
                <h6 class="my-1 "> <i class="bi bi-envelope-at-fill"></i> Email</h6>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <hr>
              </div>
            </div>
            <div class="row ">
              <div class="col">
                <h6 class="my-1"><i class="bi bi-linkedin"></i> Linkin</h6>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <hr>
              </div>
            </div>
            <div class="row ">
              <div class="col">
                <h6 class="my-1"><i class="bi bi-facebook"></i> Facebook</h6>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Nama</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Program Studi</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Fakultas</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Tingkat Pendidikan</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Tahun Angkatan</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Tanggal Lulus</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Tanggal Yudisium</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Tanggal Wisuda</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">IPK</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">SKS Kumulatif</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Predikat Kelulusan</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Judul Tugas Akhir</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Tempat Lahir</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Tanggal Lahir</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Jenis Kelamin</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Status Pernikahan</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Kewarganegaraan</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Tempat Tinggal</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <ul>
                  <li class="mb-1"><span>Provinsi</span><input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"></li>
                  <li class="my-1"><span>Kabupaten/Kota</span><input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"></li>
                  <li class="my-1"><span>Kecamatan</span><input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"></li>
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