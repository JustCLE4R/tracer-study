@extends('dashboard.layouts.main')
@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded p-5 border-top border-success border-5">
                <div class="row">
                    <div class="col-12">
                        <span class="h4">Tambah Perjalanan</span>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <span class="h5">Informasi Pekerjaan</span>
                    </div>
                    <div class="col-12">

                        <form action="/dashboard/tracer" method="post" class="mt-4">
                            <div class="mb-3 col-lg-4 col-md-5 col-sm-12">
                              <label for="filterTracer" class="form-label .text-secondarytext-secondary">Pilihlah status pekerjaan anda saat ini *</label>
                              <select class="form-select " id="filterTracer" onchange="populateTracer(this.value)">
                                <option hidden selected>Pilih Status</option>
                                <option value="bekerja">Bekerja (full time/part time)</option>
                                <option value="wiraswasta">Wiraswasta</option>
                                <option value="studi">Melanjutkan Pendidikan</option>
                                <option value="Belum memungkinkan bekerja">Belum memungkinkan bekerja</option>
                              </select>
                            </div>
                  
                            <div id="dynamicForm"></div>
                  
                            <div class="row mt-4 justify-content-between">
                              <div id="liveAlertPlaceholder"></div>
                              <div class="col-lg-1 col-md-3 col-sm-4">
                                <button id="liveAlertBtn" class="btn btn-success" style="display: none;">Kirim</button>
                              </div>
                            </div>
                        </form>

                    </div>
                </div>

                <div class="row justify-content-between my-1">
                    <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                        <label for="formGroupExampleInput" class="form-label text-secondary">Kriteria Pekerjaan *</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                        <label for="formGroupExampleInput" class="form-label text-secondary">Ukuran Tempat Bekerja *</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                        <label for="formGroupExampleInput" class="form-label text-secondary">Posisi Jabatan/Pekerjaan *</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
                    </div>
                </div>
                <div class="row justify-content-between my-1">
                    <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                        <label for="formGroupExampleInput" class="form-label text-secondary">Gaji Penghasilan Perbulan *</label>
                        <input type="number" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                        <div class="row">
                            <div class="col">
                                Kesesuaian Bidang Kerja Dengan Prodi *
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col mt-3">
                                <span class="align-middle me-2" >
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                    <label class="form-check-label mt-1" for="flexRadioDefault1">
                                        Tinggi 
                                    </label>
                                </span>
                                <span class="align-middle me-2" >
                                    <input class="form-check-input " type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                    <label class="form-check-label mt-1" for="flexRadioDefault2">
                                        Sedang 
                                    </label>
                                </span>
                                <span class="align-middle" >
                                    <input class="form-check-input " type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                                    <label class="form-check-label mt-1" for="flexRadioDefault3">
                                        Rendah 
                                    </label>
                                </span>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                        <label for="formGroupExampleInput" class="form-label text-secondary">Mulai Bekerja *</label>
                        <input type="date" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
                    </div>

                </div>

                <div class="row justify-content-between my-1">
                    <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                        <label for="formGroupExampleInput" class="form-label text-secondary">Status Sekarang *</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                        <label for="formGroupExampleInput" class="form-label text-secondary">Provinsi Tempat Bekerja *</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                        <label for="formGroupExampleInput" class="form-label text-secondary">Kota Tempat Bekerja *</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
                <div class="row justify-content-between my-1">
                    <div class="col-12 mt-3">
                        <span class="h5">Informasi Perusahaan/Instansi </span>
                    </div>
                    <div class="col-lg-8 col-md-6 col-sm-12 my-2">
                        <label for="formGroupExampleInput" class="form-label text-secondary">Nama Perusahaan/Instansi *</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                        <label for="formGroupExampleInput" class="form-label text-secondary">Nama Atasan *</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
                    </div>                    
                </div>
                <div class="row justify-content-between my-1">
                    <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                        <label for="formGroupExampleInput" class="form-label text-secondary">No Telepon Atasan *</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                        <label for="formGroupExampleInput" class="form-label text-secondary">Email Atasan *</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                        <label for="formGroupExampleInput" class="form-label text-secondary">Nama Atasan</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
                    </div>
                    
                </div>
                <div class="row justify-content-between my-1">
                    <div class="col-lg-6 col-md-8 col-sm-12 my-2">
                        <label for="" class="form-label .text-secondary">Foto/Bukti TelahBekerja Berwirausaha <span  data-bs-toggle="popover" data-bs-title="Keterangan" data-bs-content="File ini bisa berupa foto/screenshot yang membuktikan bahwa anda telah bekerja/berwirausaha, contoh: 1. Surat/Email Penerimaan Bekerja, 2. Surat Keputusan kontrak kerja, 3. Riwayat chat penerimaan /pemanggilan kerja, 4. Foto Tempat Berwirausaha, 5. Dan lain-lain"><i class="bi bi-info-circle"></i></span></label> 
                        <input type="file" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">           
                    </div>
                </div>

                <div class="row justify-content-end">
                    <div class="col-lg-5 col-md-8 col-sm-12 text-end">                        
                        <button class="btn btn-secondary mx-1"><i class="bi bi-arrow-left-circle"></i> Kembali</button>
                        <button class="btn btn-success mx-1"><i class="bi bi-file-earmark-check"></i> Simpan</button>
                    </div>
                </div>
                

            </div>
        </div>
    </div>
</div>    
@endsection