@extends('dashboard.layouts.main')
@section('content')

  <div class="container-fluid pt-4 px-4">
    <div class="row g-4">
      <div class="col-sm-12 col-xl-12">
        <div class="bg-light rounded p-5 border-top border-success border-5">
          <div class="row">
            <div class="col-12">
              <h4>Tambah Pendidikan</h4>
              <hr>
            </div>

            <form action="/dashboard/pendidikan" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row" id="pendidikanForm">
                {{-- populated by ajax --}}
              </div>
              <button class="btn btn-success">Simpan!</button>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>


  
  @if($errors->any())
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.all.min.js"></script>
    <script>
      const errorList = @json($errors->all());
        let errorMessage = '<ul>';
        errorList.forEach(error => {
            errorMessage += `<li>*${error}</li>`;
        });
        errorMessage += '</ul>';

        Swal.fire({
            icon: "error",
            title: "Masukan Error",
            html: `<div class="alert alert-danger text-start" role="alert">${errorMessage}</div>`,
            timer: 8000,
            timerProgressBar: true,
        });
    </script>
  @endif

@endsection