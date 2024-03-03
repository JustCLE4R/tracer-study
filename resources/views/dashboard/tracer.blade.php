@extends('dashboard.layouts.main')

@section('content')
<div class="container-fluid pt-4 px-4">
  <div class="row g-4">
    <div class="col-sm-12 col-xl-12">
      <div class="bg-light rounded p-4">
        <div class="row">
          <div class="col-12">
            <span class="h6">Isilah Instrumen Pusat Pengembangan Karir Mahasiswa Berikut Dibawah Ini Dengan Benar!</span>
          </div>
        </div>
        <form action="" class="mt-4">
          <div class="mb-3 col-lg-4 col-md-5 col-sm-12">
            <label for="filterTracer" class="form-label">Pilihlah status anda saat ini?</label>
            <select class="form-select " id="filterTracer" onchange="populateTracer(this.value)">
              <option hidden selected>Pilih Status</option>
              <option value="bekerja">Bekerja (full time/part time)</option>
              <option value="wiraswasta">Wiraswasta</option>
              <option value="studi">Melanjutkan Pendidikan</option>
              <option value="Belum memungkinkan bekerja">Belum memungkinkan bekerja</option>
            </select>
          </div>

          <div id="dynamicForm"></div>

          <div class="row mt-4 justify-content-between">
            <div id="liveAlertPlaceholder"></div>
            <div class="col-3">
              <nav aria-label="Page navigation example">
                <ul class="pagination" style="display: none;"></ul>
              </nav>
            </div>
            <div class="col-lg-1 col-md-3 col-sm-4">
              <button id="liveAlertBtn" class="btn btn-success" style="display: none;">Kirim</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>





@endsection