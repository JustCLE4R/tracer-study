<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sertifikat {{ $sertifikat->user->nama }}</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container my-4">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="text-center">
          <img src="{{ asset('img/logo.png') }}" alt="Logo" class="img-fluid mb-4" width="150">
        </div>
        <h1 class="text-center mb-4">Sertifikat Apresiasi</h1>
        <div class="row justify-content-center text-center">
          <div class="col-md-6">
            <h5 class="mb-0">Nama</h5>
            <p class="text-secondary">{{ $sertifikat->user->nama }}</p>
          </div>
          <div class="col-md-6">
            <h5 class="mb-0">NIM</h5>
            <p class="text-secondary">{{ $sertifikat->user->nim }}</p>
          </div>
        </div>

        <div class="row justify-content-center text-center">
          <div class="col-md-6">
            <h5 class="mb-0">Fakultas</h5>
            <p class="text-secondary">{{ $sertifikat->user->fakultas }}</p>
          </div>
          <div class="col-md-6">
            <h5 class="mb-0">Program Studi</h5>
            <p class="text-secondary">{{ $sertifikat->user->program_studi }}</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-center mt-4">
      <div class="col-md-8">
        <div class="text-center">
          <p class="lead">Ucapan Terima Kasih</p>
          <p>
            Kami mengucapkan terima kasih yang sebesar-besarnya atas partisipasi Anda dalam tracer study ini. Kontribusi Anda dalam mengisi kuesioner dan melengkapi data sangat berarti bagi kami dalam memperoleh wawasan yang berharga. Semoga informasi yang Anda berikan dapat memberikan manfaat yang besar bagi pengembangan kami ke depannya.
          </p>
          <p>
            Terima kasih atas dedikasi dan kerjasama Anda dalam proses ini. Kami menghargai setiap langkah kecil yang Anda ambil untuk membantu kami dalam mencapai tujuan bersama. Semoga kesempatan untuk berkolaborasi lagi dapat terjadi di masa mendatang.
          </p>
          <p>
            Hormat,
          </p>
          <p class="lead">[Tim Tracer Study UINSU]</p>
          <div class="row justify-content-center">
            <div class="col-md-8 d-flex justify-content-center">
              <img class="img-fluid float-end" src="{{ asset('storage/'.$sertifikat->qr_code) }}" alt="" width="100">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>