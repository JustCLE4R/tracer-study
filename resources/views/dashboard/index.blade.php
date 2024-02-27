@extends('dashboard.layouts.main')

@section('content')
<!-- Header Start -->
<div class="container-fluid pt-4 px-4">
  <div class="row g-4">
    <div class="col-sm-6 col-xl-3">
      <div class="bg-light  rounded d-flex align-items-center justify-content-between p-4" data-aos="fade-right"
        data-aos-duration="1000">
        <i class="fa fa-chart-line fa-3x text-primary"></i>
        <div class="ms-3">
          <p data-aos="fade-left" data-aos-duration="1200" class="mb-2 ">Total Mahasiswa Lulus</p>
          <h6 data-aos="fade-left" data-aos-duration="1400" class="mb-0 ">18.456</h6>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xl-3">
      <div class="bg-light rounded d-flex align-items-center justify-content-between p-4" data-aos="fade-right"
        data-aos-duration="1000">
        <i class="fa fa-chart-bar fa-3x text-primary"></i>
        <div class="ms-3">
          <p data-aos="fade-left" data-aos-duration="1200" class="mb-2">Total Mahasiswa Bekerja</p>
          <h6 data-aos="fade-left" data-aos-duration="1400" class="mb-0">12.921</h6>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xl-3">
      <div class="bg-light rounded d-flex align-items-center justify-content-between p-4" data-aos="fade-right"
        data-aos-duration="1000">
        <i class="fa fa-chart-area fa-3x text-primary"></i>
        <div class="ms-3">
          <p data-aos="fade-left" data-aos-duration="1200" class="mb-2">Jumlah Fakultas UINSU</p>
          <h6 data-aos="fade-left" data-aos-duration="1400" class="mb-0">18</h6>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xl-3">
      <div class="bg-light rounded d-flex align-items-center justify-content-between p-4" data-aos="fade-right"
        data-aos-duration="1000">
        <i class="fa fa-chart-pie fa-3x text-primary"></i>
        <div class="ms-3">
          <p data-aos="fade-left" data-aos-duration="1200" class="mb-2">Jumlah Prodi UINSU</p>
          <h6 data-aos="fade-left" data-aos-duration="1400" class="mb-0">94</h6>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="container-fluid pt-4 px-4">
  <div class="row g-4">

    <div class="col-sm-12 col-xl-6">
      <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4 text-primary " data-aos="fade-left" data-aos-duration="1400">Mahasiswa Yang Sukses</h6>
        <div class="owl-carousel testimonial-carousel">
          <div class="testimonial-item text-center">
            <img data-aos="fade-right" data-aos-duration="1200" class="img-fluid rounded-circle mx-auto mb-4"
              src="img/user.jpg" style="width: 100px; height: 100px;">
            <h5 data-aos="fade-left" data-aos-duration="1400" class="mb-1">Paris Alvito</h5>
            <p data-aos="fade-right" data-aos-duration="1400">Web Developer</p>
            <p data-aos="fade-up" data-aos-duration="1600" class="mb-0">Lorem ipsum dolor sit amet consectetur
              adipisicing elit. Dolor, voluptate?</p>
          </div>
          <div class="testimonial-item text-center" data-aos="fade-up" data-aos-duration="1400">
            <img class="img-fluid rounded-circle mx-auto mb-4" src="img/testimonial-2.jpg"
              style="width: 100px; height: 100px;">
            <h5 class="mb-1">Alex Yudistira</h5>
            <p>Backend Developer</p>
            <p class="mb-0">Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore
              diam</p>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-12 col-xl-6">
      <div class="bg-light rounded h-100 p-4">
        <iframe data-aos="fade-up" data-aos-duration="1400" class="position-relative rounded w-100 h-100"
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3982.4031529224258!2d98.58519047403404!3d3.493725950939795!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x303125197f331eeb%3A0x1c418b38fc4ea5e!2sUINSU%20Medan%20Tuntungan%20Kampus%20IV!5e0!3m2!1sid!2sid!4v1708260701586!5m2!1sid!2sid"
          frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
      </div>
    </div>


  </div>
</div>
<!-- header End -->

<div class="row ps-2 pb-5 justify-content-center " id="hidden">
  <div class="col-12 text-center p-3 m-3" id="urutan1">
    <div data-aos="fade-up" data-aos-duration="2000" class="title"><span>Data Statistik Tracer Study Yang Akan Di
        Tampilkan</span></div>
  </div>

  <!-- Chart 1 -->
  <div data-aos="fade-right" data-aos-duration="800" class="col-lg-5 col-sm-12 shadow bg-light rounded m-3 px-3 py-3"
    id="urutan2">
    <div class="d-flex align-items-center justify-content-between mb-4">
      <span data-aos="fade-up" data-aos-duration="1000" class="mb-0 h4">Jenis Kelamin Mahasiswa </span>
      <a data-aos="fade-up" data-aos-duration="1200" href="" class="text-success">Show All</a>
    </div>

    <div class="input-group mb-2" data-aos="fade-up" data-aos-duration="1000">
      <select class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon">
        <option selected>Choose...</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
      </select>
      <button class="btn btn-success" type="button">Pilih Kategori</button>
    </div>

    <canvas data-aos="fade-up" data-aos-duration="1000" id="bar"></canvas>
  </div>
  <div data-aos="fade-left" data-aos-duration="800" class="col-lg-5 col-sm-12 shadow bg-light rounded m-3 px-3 py-3"
    id="urutan3">
    <div class="d-flex align-items-center justify-content-between mb-4">
      <span data-aos="fade-up" data-aos-duration="1000" class="mb-0 h4">Keterangan </span>
      <a data-aos="fade-up" data-aos-duration="1200" href="" class="text-success">Show All</a>
    </div>
    <div id="legend-container"></div>
  </div>
  <!-- End Chart 1 -->

  <!-- Chart 2 -->
  <div data-aos="fade-right" data-aos-duration="800"
    class="col-lg-5 col-sm-12 shadow bg-light rounded m-3 px-3 pt-3 py-3" id="urutan5">
    <div class="d-flex align-items-center justify-content-between mb-4">
      <span data-aos="fade-up" data-aos-duration="1000" class="mb-0 h4">Keterangan </span>
      <a data-aos="fade-up" data-aos-duration="1200" href="" class="text-success">Show All</a>
    </div>
    <div id="legend-container2"></div>
  </div>
  <div data-aos="fade-left" data-aos-duration="800"
    class="col-lg-5 col-sm-12 shadow bg-light rounded m-3 px-3 pb-5 pt-3" id="urutan4">
    <div class="d-flex align-items-center justify-content-between mb-4">
      <span data-aos="fade-up" data-aos-duration="1000" class="mb-0 h4">Total Mahasiswa Di Fakultas</span>
      <a data-aos="fade-up" data-aos-duration="1200" href="" class="text-success">Show All</a>
    </div>

    <div class="input-group mb-2" data-aos="fade-up" data-aos-duration="1000">
      <select class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon">
        <option selected>Choose...</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
      </select>
      <button class="btn btn-success" type="button">Pilih Kategori</button>
    </div>

    <canvas data-aos="fade-up" data-aos-duration="1200" id="pie-chart"></canvas>
  </div>
  <!-- End Chart 2 -->

</div>


{{-- table start --}}
<div class="container-fluid pt-4 px-4 ms-0">
  <div class="bg-light text-center rounded p-4">
    <div class="d-flex align-items-center justify-content-between mb-4">
      <span data-aos="fade-up" data-aos-duration="1000" class="mb-0 h4">Data Mahasiswa</span>
      <a data-aos="fade-up" data-aos-duration="1200" href="" class="text-success">Show All</a>
    </div>
    <div class="table-responsive">
      <table class="table text-start align-middle table-bordered table-hover mb-0">
        <thead data-aos="fade-up" data-aos-duration="1200">
          <tr class="text-dark">
            <th scope="col">No</th>
            <th scope="col">Tahun</th>
            <th scope="col">Total Mahasiswa</th>
            <th scope="col">Total Mahasiswa Lulus</th>
            <th scope="col">Total Fakultas</th>
            <th scope="col">Total Prodi</th>
            <th scope="col">Grafik</th>
          </tr>
        </thead>
        <tbody data-aos="fade-up" data-aos-duration="1400">
          <tr>
            <td>1</td>
            <td>2020</td>
            <td>18.231</td>
            <td>393</td>
            <td>16</td>
            <td>87</td>
            <td><a class="btn btn-sm btn-success" href="">Lihat</a></td>
          </tr>
          <tr>
            <td>2</td>
            <td>2021</td>
            <td>20.281</td>
            <td>830</td>
            <td>17</td>
            <td>89</td>
            <td><a class="btn btn-sm btn-success" href="">Lihat</a></td>
          </tr>
          <tr>
            <td>3</td>
            <td>2022</td>
            <td>19.821</td>
            <td>324</td>
            <td>17</td>
            <td>93</td>
            <td><a class="btn btn-sm btn-success" href="">Lihat</a></td>
          </tr>
          <tr>
            <td>4</td>
            <td>2023</td>
            <td>24.280</td>
            <td>322</td>
            <td>18</td>
            <td>93</td>
            <td><a class="btn btn-sm btn-success" href="">Lihat</a></td>
          </tr>
          <tr>
            <td>5</td>
            <td>2024</td>
            <td>28.092</td>
            <td>456/td>
            <td>18</td>
            <td>94</td>
            <td><a class="btn btn-sm btn-success" href="">Lihat</a></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
{{-- table end --}}

  


@endsection