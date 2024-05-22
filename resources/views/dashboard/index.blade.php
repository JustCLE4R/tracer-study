@extends('dashboard.layouts.main')

@section('content')
<!-- Header Start -->
<div class="container-fluid pt-4 px-4">
  <div class="row g-4">
    <div class="col-sm-6 col-xl-3">
      <div class="bg-light  border-top border-success border-5  rounded d-flex align-items-center justify-content-between p-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.9s"
n="1000">
        <i class="bi bi-mortarboard-fill fs-1 text-primary"></i>
        <div class="ms-3">
          <p data-wow-duration="1s" data-wow-delay="0.9s"  class="mb-2 wow fadeInUp">Total Mahasiswa Lulus</p>
          <h6 data-wow-duration="1s" data-wow-delay="0.9s"  class="mb-0 wow fadeInUp">18.456</h6>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xl-3">
      <div class="bg-light  border-top border-success border-5 rounded d-flex align-items-center justify-content-between p-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.9s"
n="1000">
        <i class="bi bi-person-workspace fs-1 text-primary"></i>
        <div class="ms-3">
          <p data-wow-duration="1s" data-wow-delay="0.9s"  class="mb-2 wow fadeInUp">Total Mahasiswa Bekerja</p>
          <h6 data-wow-duration="1s" data-wow-delay="0.9s"  class="mb-0 wow fadeInUp">12.921</h6>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xl-3">
      <div class="bg-light  border-top border-success border-5 rounded d-flex align-items-center justify-content-between p-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.9s"
n="1000">
        <i class="bi bi-grid-1x2 fs-1 text-primary"></i>
        <div class="ms-3">
          <p data-wow-duration="1s" data-wow-delay="0.9s"  class="mb-2 wow fadeInUp">Jumlah Fakultas UINSU</p>
          <h6 data-wow-duration="1s" data-wow-delay="0.9s"  class="mb-0 wow fadeInUp">18</h6>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xl-3">
      <div class="bg-light  border-top border-success border-5 rounded d-flex align-items-center justify-content-between p-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.9s"
n="1000">
        <i class="bi bi-grid fs-1 text-primary"></i>
        <div class="ms-3">
          <p data-wow-duration="1s" data-wow-delay="0.9s"  class="mb-2 wow fadeInUp">Jumlah Prodi UINSU</p>
          <h6 data-wow-duration="1s" data-wow-delay="0.9s"  class="mb-0 wow fadeInUp">94</h6>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="container-fluid pt-4 px-4">
  <div class="row g-4">

    <div class="col-sm-12 col-xl-6">
      <div class="bg-light  border-top border-success border-5 rounded h-100 p-4">
        <h6 class="mb-4 text-primary wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.9s" >Mahasiswa Yang Sukses</h6>
        <div class="owl-carousel testimonial-carousel">
          <div class="testimonial-item text-center"> 
            <img data-wow-duration="1s" data-wow-delay="0.9s"  class="img-fluid rounded-circle mx-auto mb-4 wow fadeInUp"
              src="img/user.jpg" style="width: 100px; height: 100px;">
            <h5  class="mb-1 ">Paris Alvito</h5>
            <p >Web Developer</p>
            <p  class="mb-0">Lorem ipsum dolor sit amet consectetur
              adipisicing elit. Dolor, voluptate?</p>
          </div>
          <div class="testimonial-item text-center" data-wow-duration="1s" data-wow-delay="0.9s" >
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
      <div class="bg-light  border-top border-success border-5 rounded h-100 p-4">
        <iframe data-wow-duration="1s" data-wow-delay="0.9s"  class="position-relative rounded w-100 h-100"
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3982.4031529224258!2d98.58519047403404!3d3.493725950939795!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x303125197f331eeb%3A0x1c418b38fc4ea5e!2sUINSU%20Medan%20Tuntungan%20Kampus%20IV!5e0!3m2!1sid!2sid!4v1708260701586!5m2!1sid!2sid"
          frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
      </div>
    </div>


  </div>
</div>
<!-- header End -->

<div class="container-fluid pt-4 px-4 ms-0 my-4">

    <div class="row  justify-content-center border-top border-success border-5 rounded p-4 mx-1 bg-light " >
      <!-- Chart 1 -->
    
        <div class="col-lg-12 col-sm-12 d-flex align-items-center justify-content-between mb-4">
          <span  class="mb-0 h4 ">Visualisasi Data Tracer Study</span>
          <a href="" class="btn btn-success">Tampilkan Semua</a>
          
        </div> 

        <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-lg-6 col-sm-12  wow fadeInUp "
          id="urutan2">    
          <canvas data-wow-duration="1s" data-wow-delay="0.9s" class="wow fadeInUp" id="bar"></canvas>
        </div>
        
        <div data-wow-duration="1s" data-wow-delay="0.9s" class="col-lg-6 col-sm-12  wow fadeInUp"
          id="urutan3">
          <div id="legend-container"></div>
        </div>

      <!-- End Chart 1 -->

    
    </div>

</div>


{{-- table start --}}
<div class="container-fluid pt-4 px-4 ms-0">
  <div class="bg-light  border-top border-success border-5 text-center rounded p-4">
    <div class="d-flex align-items-center justify-content-between mb-4">
      <span data-wow-duration="1s" data-wow-delay="0.9s"  class="mb-0 h4 wow fadeInUp">Data Mahasiswa</span>
    </div>
    <div class="table-responsive">
      <table class="table text-start align-middle table-bordered table-hover mb-0">
        <thead data-wow-duration="1s" data-wow-delay="0.9s" class="wow fadeInUp" >
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
        <tbody data-wow-duration="1s" data-wow-delay="0.9s" class="wow fadeInUp">
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
            <td>456</td>
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

<script>
  


</script>


@endsection