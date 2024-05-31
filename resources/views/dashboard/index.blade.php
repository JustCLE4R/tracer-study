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
        <h6 class="mb-4 text-primary text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.9s" >Selamat Datang di Tracer Study UIN Sumatera Utara</h6>
        <div class="owl-carousel testimonial-carousel">
          <div class="testimonial-item text-center"> 
            <img data-wow-duration="1s" data-wow-delay="0.9s"  class="img-fluid rounded-circle mx-auto mb-4 wow fadeInUp"
              src="img/hero-1.png" style="width: 250px;">
            <h4  class="mb-2 ">Lengkapi Profile Biodata</h4>
            <p  class="mb-0">Agar dapat melakukan Pengisian Data Perjalanan karir, Questioner & Berita Lowongan Pekerjaan. <br>Sihlakan lengkapi profil biodata anda terlebih dahulu!</p>
          </div>
          <div class="testimonial-item text-center" data-wow-duration="1s" data-wow-delay="0.9s" >
            <img class="img-fluid rounded-circle mx-auto mb-4" src="img/hero-2.webp"
              style="width: 250px;">
            <h4 class="mb-2">Dapatkan Sertifikasi</h4>
            <p class="mb-0">Jika anda telah menyelesaikan pengisian perjalanan karir & Questioner, maka anda akan <br> mendapatkan Sertifikasi yang dapat digunakan untuk penyelesaian administrasi akhir </p>
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

{{-- table start --}}
<div class="container-fluid pt-4 px-4 ms-0">
  <div class="bg-light  border-top border-success border-5 text-center rounded p-4">
    <div class="d-flex align-items-center justify-content-between mb-4">
      <span data-wow-duration="1s" data-wow-delay="0.9s"  class="mb-0 h4 wow fadeInUp">Data Pengisi Tracer Study & Questioner</span>
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