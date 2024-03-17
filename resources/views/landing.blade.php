<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tracer Study UINSU</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
  <link rel="stylesheet" href="/css/style.css">
</head>

<body>
  {{-- Navbar --}}
  <nav class="navbar shadow ps-2 pe-4 navbar-expand-lg bg-body-tertiary fixed-top ">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img class="img-fluid" src="/img/logo.png" width="200px" alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item mx-1">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item mx-1">
            <a class="nav-link" href="admin/index.php">Tracer Study</a>
          </li>
          <li class="nav-item mx-1">
            <a class="nav-link" href="#">Career</a>
          </li>
          <li class="nav-item mx-1">
            <a class="nav-link" href="admin/form.html">Questioner</a>
          </li>
          <li class="nav-item mx-1">
            <a class="rounded-pill btn btn-success text-light py-1 my-1" href="login">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  {{-- Header and Background Video --}}
  <header class="position-relative">
    <video id="headerVideo" autoplay loop muted playsinline>
      <source src="https://virtualtour.uinsu.ac.id/video/polina.mp4" type="video/mp4">
      Your browser does not support the video tag.
    </video>
    <div class="container-fluid row header-text d-flex align-items-center justify-content-center">
      <div class="col-lg-7 col-md-10 col-sm-12 text-center">
        <span data-aos="fade-up" data-aos-duration="1000" class="h1">SELAMAT DATANG DI WEBSITE TRACER STUDY
          UIN SUMATERA UTARA</span>
        <p data-aos="fade-up" data-aos-duration="1500" class="m-2">Menyediakan Informasi Seputar Rekam Jejak
          Karir Lulusan UIN Sumatera Utara Dan Informasi Tentang Berita Lowongan Pekerjaan</p>
        <button data-aos="fade-up" data-aos-duration="2000" class="btn btn-lg btn-success rounded-pill py-1">Kunjungi
          Sekarang</button>
      </div>
    </div>
  </header>

  {{-- Chart --}}
  <article class="position-relative">
    <div class="row p-2 pb-5 justify-content-center ">
      <div class="col-12 text-center p-3 m-3" id="urutan1">
        <div data-aos="fade-up" data-aos-duration="2000" class="title"><span>Data Statistik Tracer Study</span>
        </div>
      </div>
      <!-- Chart 1 -->
      <div data-aos="fade-right" data-aos-duration="800"
        class="col-lg-5 col-sm-10 shadow bg-light rounded m-3 px-5 py-3" id="urutan2">
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
      <div data-aos="fade-left" data-aos-duration="800" class="col-lg-5 col-sm-10 shadow bg-light rounded m-3 px-5 py-3"
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
        class="col-lg-5 col-sm-10 shadow bg-light rounded m-3 px-5 pt-3 py-3" id="urutan5">
        <div class="d-flex align-items-center justify-content-between mb-4">
          <span data-aos="fade-up" data-aos-duration="1000" class="mb-0 h4">Keterangan </span>
          <a data-aos="fade-up" data-aos-duration="1200" href="" class="text-success">Show All</a>
        </div>
        <div id="legend-container2"></div>
      </div>
      <div data-aos="fade-left" data-aos-duration="800"
        class="col-lg-5 col-sm-10 shadow bg-light rounded m-3 px-5 pb-5 pt-3" id="urutan4">
        <div class="d-flex align-items-center justify-content-between mb-4">
          <span data-aos="fade-up" data-aos-duration="1000" class="mb-0 h4">Total Mahasiswa Di
            Fakultas</span>
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
  </article>

  {{-- Questioner --}}
  <section class="questioner ">
    <div class="row p-2 justify-content-center text-light g-0" id="content">
      <div class="col-12 text-center mt-5">
        <div class="title"><span data-aos="fade-up" data-aos-duration="1000" class="text-light h1" id="quest">Buku
            Tracer Study UINSU</span></div>
      </div>
      <div class="col-lg-6 col-sm-8 col-md-6 mx-2 ">
        <span data-aos="fade-up" data-aos-duration="1200">Lorem ipsum dolor sit amet consectetur adipisicing
          elit. Sunt et distinctio quaerat ullam debitis atque deleniti eos voluptates architecto nisi.</span>
      </div>
      <div class="col-lg-4 col-sm-8 col-md-6 mx-2" id="custom">
        <div class="input-group mb-3" data-aos="fade-up" data-aos-duration="1200">
          <select class="form-select custom-select" id="inputGroupSelect04"
            aria-label="Example select with button addon">
            <option selected>Pilih Tahun</option>
            <option class="select-option" value="1">Tracer Study UINSU 2021</option>
            <option class="select-option" value="2">Tracer Study UINSU 2022</option>
            <option class="select-option" value="3">Tracer Study UINSU 2023</option>
            <option class="select-option" value="4">Tracer Study UINSU 2024</option>
          </select>
          <button class="btn btn-success" type="button" id="button-addon2">Download Buku</button>
        </div>
      </div>
    </div>
  </section>

  {{-- Berita --}}
  <section id="berita">
    <div class="row p-2 justify-content-center g-0">
      <div class="col-12 text-center  p-3 m-3">
        <div class="title" data-aos="fade-up" data-aos-duration="1000"><span>Berita Lowongan Pekerjaan</span>
        </div>
      </div>
      <div class="row justify-content-center m-3">

        @foreach ($careers as $career)
          <div class="col-md-6 col-lg-5">
            <div class="card mb-3" data-aos="fade-up" data-aos-duration="1200">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="{{ asset($career->image ? 'storage/' . $career->image : 'https://newuinsu.uinsu.ac.id/wp-content/uploads/2024/02/Graduation.jpg') }}"
                    class="img-fluid rounded-start" alt="..." style="object-fit: cover; height: 100%;">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 data-aos="fade-left" data-aos-duration="1200" class="card-title">{{ $career->position . '|' . $career->company_name }}</h5>
                    <p data-aos="fade-left" data-aos-duration="1000" class="card-text">{{ $career->excerpt }}</p>
                    <p data-aos="fade-up" data-aos-duration="1000" class="card-text">
                      <small class="text-body-secondary">
                        {{ $career->created_at->diffForHumans(['parts' => 3, 'join' => true]) }}
                      </small>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach

      </div>
    </div>
  </section>

  <footer class="container-fluid mt-3">
    <div class="row  m-3 mx-4">
      <div class="col-12 ">
        <span class="d-block">Copyright © 2024 UIN Sumatera Utara Medan </span>

      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

  <script>
    AOS.init();

      // Chart 1
      var ctx1 = document.getElementById("bar").getContext("2d");
      var myChart1 = new Chart(ctx1, {
          type: "bar",
          data: {
          labels: ["Perbandingan mahasiswa yang mengisi dengan yang lulus"],
          datasets: [{
                  label: "Fakultas Dakwah Dan Komunikasi",
                  data: [60],
                  backgroundColor: "rgb(1, 60, 1)"
              },
              {
                  label: "Fakulktas Ekonomi Dan Bisnis Islam",
                  data: [38],
                  backgroundColor: "rgb(10, 83, 10)"
              },
              {
                  label: "Fakultas Syariah Dan Hukum",
                  data: [45],
                  backgroundColor: "rgb(0, 133, 0)"
              },
              {
                  label: "Fakultas Ilmu Tarbiyah Dan Keguruan",
                  data: [33],
                  backgroundColor: "rgb(2, 178, 2)"
              },
              {
                  label: "Fakultas Ushuluddin Dan Studi Islam",
                  data: [18],
                  backgroundColor: "rgb(54, 214, 54)"
              },
              {
                  label: "Fakultas Sains Dan Teknologi",
                  data: [42],
                  backgroundColor: "rgb(0, 255, 0)"
              },
              {
                  label: "Fakultas Ilmu Sosial",
                  data: [33],
                  backgroundColor: "rgba(106, 255, 0, 0.818)"
              },
              { 
                  label: "Fakultas Kesehatan Masyarakat",
                  data: [12],
                  backgroundColor: "rgba(51, 158, 25, 0.546)"
              },
              {
                  label: "Pasca Sarjana",
                  data: [28],
                  backgroundColor: "rgba(80, 167, 18, 0.546)"
              }
          ]
      },
      options: {
          responsive: true,
          plugins: {
              legend: {
                  display: false
              }
      }
      }
      });

      var legendItems = myChart1.legend.legendItems;

      // Menampilkan keterangan warna dan label ke dalam col dengan ID "urutan3"
      var legendContainer = document.getElementById("urutan3");
      var legendList = document.createElement("ol");

      legendItems.forEach(function(item) {
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
              datasets: [{
                  backgroundColor: [
                      "rgb(10, 83, 10)",
                      "rgba(14, 153, 7, 0.919)"
                  ],
                  data: [141, 253]
              }]
          },
          options: {
              responsive: true,
              plugins: {
                  legend: {
                      display: false
                  }
          }
          }
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
      showLegend(myChart5, "urutan5",2);
      // End Chart 2
  </script>
</body>

</html>