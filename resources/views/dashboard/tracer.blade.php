@extends('dashboard.layouts.main')

@section('content')
<div class="container-fluid pt-4 px-4">
  <div class="row g-4">

    <div class="col-sm-12 col-xl-12">
      <div class="bg-light rounded p-4">
          <div class="row">
              <div class="col-12">
                  <span class="h6">Isilah Instrumen Pusat Pengembangan Karir  Mahasiswa Berikut Dibawah Ini Dengan Benar!</span>
              </div>
          </div>

          @include('dashboard.layouts.filter')
          @include('dashboard.layouts.wiraswasta')
          @include('dashboard.layouts.bekerja')
          

      
  </div>
</div>       



@endsection