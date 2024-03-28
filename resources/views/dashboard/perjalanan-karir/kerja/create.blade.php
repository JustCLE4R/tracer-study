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
              <select class="form-select" id="filterTracer" onchange="handleStatusChange()" name="pekerjaan">
                  <option hidden selected>Pilih Status</option>
                  <option value="pekerja">Bekerja</option>
                  <option value="wirausaha">Wirausaha</option>
                  <option value="Belum memungkinkan bekerja">Belum memungkinkan bekerja</option>
              </select>
              
              <select class="form-select my-2" id="bekerjaSelect" style="display: none;" onchange="handleBekerjaChange()" name="status-perkerjaan">
                  <option hidden selected>Pilih Status Bekerja</option>
                  <option value="fulltime">Fulltime</option>
                  <option value="parttime">Partime</option>
              </select>
          </div>
      
          <div class="row justify-content-between" id="dynamicForm">
      
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
@endsection