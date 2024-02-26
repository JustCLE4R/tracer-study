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

<script>
  AOS.init();

// Chart 1
var ctx1 = document.getElementById("bar").getContext("2d");
var myChart1 = new Chart(ctx1, {
    type: "bar",
    data: {
        labels: ["Perbandingan mahasiswa yang mengisi dengan yang lulus"],
        datasets: [
            {
                label: "Fakultas Dakwah Dan Komunikasi",
                data: [60],
                backgroundColor: "rgb(1, 60, 1)",
            },
            {
                label: "Fakulktas Ekonomi Dan Bisnis Islam",
                data: [38],
                backgroundColor: "rgb(10, 83, 10)",
            },
            {
                label: "Fakultas Syariah Dan Hukum",
                data: [45],
                backgroundColor: "rgb(0, 133, 0)",
            },
            {
                label: "Fakultas Ilmu Tarbiyah Dan Keguruan",
                data: [33],
                backgroundColor: "rgb(2, 178, 2)",
            },
            {
                label: "Fakultas Ushuluddin Dan Studi Islam",
                data: [18],
                backgroundColor: "rgb(54, 214, 54)",
            },
            {
                label: "Fakultas Sains Dan Teknologi",
                data: [42],
                backgroundColor: "rgb(0, 255, 0)",
            },
            {
                label: "Fakultas Ilmu Sosial",
                data: [33],
                backgroundColor: "rgba(106, 255, 0, 0.818)",
            },
            {
                label: "Fakultas Kesehatan Masyarakat",
                data: [12],
                backgroundColor: "rgba(51, 158, 25, 0.546)",
            },
            {
                label: "Pasca Sarjana",
                data: [28],
                backgroundColor: "rgba(80, 167, 18, 0.546)",
            },
        ],
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: false,
            },
        },
    },
});

var legendItems = myChart1.legend.legendItems;

// Menampilkan keterangan warna dan label ke dalam col dengan ID "urutan3"
var legendContainer = document.getElementById("urutan3");
var legendList = document.createElement("ol");

legendItems.forEach(function (item) {
    var listItem = document.createElement("li");

    // Menambahkan atribut data-aos
    listItem.setAttribute("data-aos", "fade-up");
    listItem.setAttribute("data-aos-duration", "1200");

    // Menambahkan icon
    var icon = document.createElement("i");
    icon.className = "fa-solid fa-square";
    icon.style.color = item.fillStyle;

    // Menambahkan margin untuk spasi antara ikon dan teks label
    icon.style.marginRight = "5px";

    listItem.appendChild(icon);

    // Menambahkan teks label
    var label = document.createElement("span");
    label.textContent = item.text;
    listItem.appendChild(label);

    // Menentukan warna font pada label
    listItem.style.color = "black";

    // Menambahkan list item ke dalam list
    legendList.appendChild(listItem);
});

// Menambahkan list ke dalam container
legendContainer.appendChild(legendList);
// End Chart 1

// Chart 2
var ctx5 = document.getElementById("pie-chart").getContext("2d");
var myChart5 = new Chart(ctx5, {
    type: "pie",
    data: {
        labels: ["Sudah Mengisi", "Belum Mengisi"],
        datasets: [
            {
                backgroundColor: ["rgb(10, 83, 10)", "rgba(14, 153, 7, 0.919)"],
                data: [141, 253],
            },
        ],
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: false,
            },
        },
    },
});

// Fungsi untuk menampilkan keterangan warna dan label ke dalam suatu container
function showLegend(chart, containerId) {
    var legendItems = chart.legend.legendItems;
    var legendContainer = document.getElementById(containerId);
    var legendList = document.createElement("ol");

    legendItems.forEach(function (item) {
        var listItem = document.createElement("li");

        // Menambahkan atribut data-aos
        listItem.setAttribute("data-aos", "fade-up");
        listItem.setAttribute("data-aos-duration", "1500");

        // Menambahkan icon
        var icon = document.createElement("i");
        icon.className = "fa-solid fa-square";
        icon.style.color = item.fillStyle;

        // Menambahkan margin untuk spasi antara ikon dan teks label
        icon.style.marginRight = "5px";

        listItem.appendChild(icon);

        // Menambahkan teks label
        var label = document.createElement("span");
        label.textContent = item.text;
        listItem.appendChild(label);

        // Menentukan warna font pada label
        listItem.style.color = "black";

        // Menambahkan list item ke dalam list
        legendList.appendChild(listItem);
    });

    // Menambahkan list ke dalam container
    legendContainer.appendChild(legendList);
}

// Menampilkan keterangan warna dan label dari diagram pie
showLegend(myChart5, "urutan5", 2);
// End Chart 2

</script>


@endsection