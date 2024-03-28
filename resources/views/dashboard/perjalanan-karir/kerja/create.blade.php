@extends('dashboard.layouts.main')
@section('content')

<div class="container-fluid pt-4 px-4">
  <div class="row g-4">
    <div class="col-sm-12 col-xl-12">
      <div class="bg-light rounded p-5 border-top border-success border-5">
        <div class="row">
          <div class="col-12">
            <span class="h4">Tambah Pekerjaan</span>
            <hr>
          </div>
        </div>

        <form action="/dashboard/pekerja" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3 col-lg-4 col-md-5 col-sm-12">
              <label for="filterTracer" class="form-label text-secondary">Pilihlah status pekerjaan anda saat ini *</label>
              <select class="form-select" onchange="handlePekerjaan(this.value)" name="pekerjaan">
                  <option hidden selected>Pilih Status</option>
                  <option value="pekerja">Bekerja</option>
                  <option value="wirausaha">Wirausaha</option>
                  <option value="belum-kerja">Belum memungkinkan bekerja</option>
              </select>
              
              <select class="form-select my-2 d-none" id="handleStatus" onchange="handleStatusChange(this.value)" name="status-perkerjaan">
                  <option hidden selected>Pilih Status Bekerja</option>
                  <option value="fulltime">Fulltime</option>
                  <option value="parttime">Partime</option>
              </select>
          </div>
          
          <div class="row justify-content-between" id="dynamicForm">
            
          </div>
          <hr>
          <div class="row justify-content-between" id="informasiPerusahaan">

          </div>

          <div class="row justify-content-end my-1 d-none" id="buttonGroup">
            <div class="col-lg-5 col-md-8 col-sm-12 text-end">
              <a class="btn btn-secondary mx-1" href="/dashboard/perjalanan">
                <i class="bi bi-arrow-left-circle"></i> Kembali
              </a>
              <button class="btn btn-success mx-1">
                <i class="bi bi-file-earmark-check"></i> Simpan
              </button>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
@endsection