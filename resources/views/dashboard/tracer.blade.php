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
        <form action="">
          <label for="filterTracer">1. FIlter</label>
          <select name="" id="filterTracer" onchange="populateTracer(this.value)">
            <option hidden selected>Pilih Tracer Study</option>
            <option value="bekerja">Bekerja</option>
            <option value="wiraswasta">Wiraswasta</option>
            <option value="studi">Studi</option>
            <option value=""></option>
          </select>
          <div id="tracer">
            {{-- populated by ajax --}}
          </div>
          <button class="btn btn-primary" style="display: none" id="submitTracer">Submit</button>
        </form>
      </div>
    </div>
@endsection