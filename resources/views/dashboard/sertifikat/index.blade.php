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
  <div class="row justify-content-center my-3">
    <div class="col-10  m-2 shadow p-0"  style="background-image: linear-gradient(135deg, transparent 0%, transparent 38%, rgba(54, 174, 62, 0.41) 38%, rgba(54, 174, 62, 0.41) 62%, transparent 62%, transparent 64%, rgba(32, 147, 51, 0.44) 64%, rgba(32, 147, 51, 0.44) 100%), linear-gradient(45deg, transparent 0%, transparent 56%, rgb(64, 197, 116) 56%, rgb(64, 197, 116) 64%, rgb(0, 65, 12) 64%, rgb(0, 65, 12) 91%, transparent 91%, transparent 100%), linear-gradient(90deg, rgb(255, 255, 255), rgb(255, 255, 255));
" >
   <div class="ser pb-5" style="background-color: rgba(255, 255, 255, 0.568);">

    
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
      <div class="col-md-8 p-4">
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
  </div>
  </div>
{{-- 
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
  </div> --}}
</body>
</html>