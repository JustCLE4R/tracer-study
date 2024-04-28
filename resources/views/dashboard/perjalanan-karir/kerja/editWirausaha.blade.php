@extends('dashboard.layouts.main')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded p-5 border-top border-success border-5">
                    <div class="row">
                        <div class="col-12">
                            <span class="h4">Edit Wirausaha</span>
                            <hr>
                        </div>
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row justify-content-between" id="dynamicForm">
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Nama Usaha *</label>
                                <input type="text" id="formGroupExampleInput" name="nama-usaha" class="form-control">
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Tingkat / Ukuran Tempat Usaha *</label>
                                <select class="form-select" aria-label="Default select example" name="tingkat-ukuran-tempat-usaha">
                                    <option>Pilih Tingkat / Ukuran Tempat Usaha</option>
                                    <option value="a">Lokal</option>
                                    <option value="b">Nasional</option>
                                    <option value="c">Multinasional</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Bidang Usaha *</label>
                                <select class="form-select" aria-label="Default select example" name="bidang-usaha">
                                    <option>Pilih Bidang Usaha</option>
                                    <option value="a">Pertanian, perikanan, dan kehutanan</option>
                                    <option value="b">Pertambangan dan penggalian</option>
                                    <option value="c">Industri pengolahan</option>
                                    <option value="d">Pengadaaan listrik, gas, uap/air panas, dan udara dingin</option>
                                    <option value="e">Pengelolaan air, pengolahan air limbah, pengelolaan dan daur ulang sampah, dan aktivitas remediasi</option>
                                    <option value="f">Konstruksi</option>
                                    <option value="g">Perdagangan besar dan eceran, reparasi dan perawatan mobil dan sepeda motor</option>
                                    <option value="h">Pengangkutan dan pergudangan</option>
                                    <option value="i">Penyediaan akomodasi dan penyediaan makanan dan minuman</option>
                                    <option value="j">Informasi dan komunikasi</option>
                                    <option value="k">Aktivitas keuangan dan asuransi</option>
                                    <option value="l">Real estate</option>
                                    <option value="m">Aktivitas profesional, ilmiah, dan teknis</option>
                                    <option value="n">Aktivitas persewaan dan sewa guna usaha tanpa hak opsi, ketenagakerjaan, agen perjalanan dan penunjang usaha lainnya</option>
                                    <option value="o">Administrasi pemerintahan, pertahanan, dan jaminan sosial wajib</option>
                                    <option value="p">Aktivitas Pendidikan</option>
                                    <option value="q">Aktivitas kesehatan dan aktivitas sosial</option>
                                    <option value="r">Kesenian, hiburan dan rekreasi</option>
                                    <option value="s">Aktivitas jasa lainnya</option>
                                    <option value="t">Aktivitas rumah tangga sebagai pemberi kerja, aktivitas yang menghasilkan barang dan jasa oleh rumah tangga yang digunakan untuk memenuhi kebutuhan sendiri yang digunakan untuk memenuhi kebutuhan sendiri</option>
                                    <option value="u">Aktivitas badan internasional dan badan ekstra internasional lainnya</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Posisi / Jabatan Pekerjaan *</label>
                                <select class="form-select" aria-label="Default select example" name="posisi-jabatan-pekerjaan">
                                    <option>Pilih Posisi / Jabatan Pekerjaan</option>
                                    <option value="a">Pemilik</option>
                                    <option value="b">Direktur</option>
                                    <option value="c">Kepala Unit</option>
                                    <option value="d">Supervisor</option>
                                    <option value="e">Staf</option>
                                    <option value="f">Self Employed</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Detail Usaha *</label>
                                <input type="text" id="formGroupExampleInput" name="detail-usaha" class="form-control">
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Jumlah Pendapatan Perbulan (Omset Penjualan) *</label>
                                <input type="number" id="formGroupExampleInput" name="jumlah-pendapatan-perbulan-omset-penjualan" class="form-control">
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Jumlah Pendapatan Bersih Perbulan *</label>
                                <input type="number" id="formGroupExampleInput" name="jumlah-pendapatan-bersih-perbulan" class="form-control">
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <div class="col-12">
                                    <label class="form-label text-secondary">Pemodal Saat Ini *</label>
                                </div>
                                <div class="form-check col-8">
                                    <input type="checkbox" id="formGroupExampleCheckbox_a" name="pemodal-saat-ini[]" value="a" class="form-check-input">
                                    <label class="form-check-label">Pribadi / Tabungan</label>
                                </div>
                                <div class="form-check col-8">
                                    <input type="checkbox" id="formGroupExampleCheckbox_b" name="pemodal-saat-ini[]" value="b" class="form-check-input">
                                    <label class="form-check-label">Bank</label>
                                </div>
                                <div class="form-check col-8">
                                    <input type="checkbox" id="formGroupExampleCheckbox_c" name="pemodal-saat-ini[]" value="c" class="form-check-input">
                                    <label class="form-check-label">Keluarga</label>
                                </div>
                                <div class="form-check col-8">
                                    <input type="checkbox" id="formGroupExampleCheckbox_d" name="pemodal-saat-ini[]" value="d" class="form-check-input">
                                    <label class="form-check-label">Investor</label>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Kesesuaian Pekerjaan dengan Prodi *</label>
                                <select class="form-select" aria-label="Default select example" name="kesesuaian-pekerjaan-dengan-prodi">
                                    <option>Pilih Kesesuaian Pekerjaan dengan Prodi</option>
                                    <option value="a">Tinggi</option>
                                    <option value="b">Sedang</option>
                                    <option value="c">Rendah</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Tanggal Mulai Berusaha *</label>
                                <input type="date" id="formGroupExampleInput" name="tanggal-mulai-berusaha" class="form-control">
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Apakah Saat Ini Masih Memiliki Usaha ? *</label>
                                <select class="form-select" aria-label="Default select example" name="apakah-saat-ini-masih-memiliki-usaha-[]">
                                    <option>Pilih Kesesuaian Pekerjaan dengan Prodi</option>
                                    <option value="a">Masih</option>
                                    <option value="b">Tidak</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Provinsi *</label>
                                <input type="text" id="formGroupExampleInput" name="provinsi" class="form-control">
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Kabupaten *</label>
                                <input type="text" id="formGroupExampleInput" name="kabupaten" class="form-control">
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Alamat *</label>
                                <input type="text" id="formGroupExampleInput" name="alamat" class="form-control">
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Foto/Bukti Telah Berwirausaha *</label>
                                <div class="d-flex align-items-center">
                                    <input type="file" id="formGroupExampleFile" name="fotobukti-telah-berwirausaha" class="form-control">
                                    <span class="ms-2" data-bs-toggle="popover" data-bs-title="Keterangan" data-bs-content="File ini bisa berupa foto/screenshot yang membuktikan bahwa anda telah bekerja/berwirausaha, contoh: 1. Surat/Email Penerimaan Bekerja, 2. Surat Keputusan kontrak kerja, 3. Riwayat chat penerimaan /pemanggilan kerja, 4. Foto Tempat Berwirausaha, 5. Dan lain-lain">
                                        <i class="bi bi-info-circle"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-end my-1" id="buttonGroup">
                            <div class="col-lg-5 col-md-8 col-sm-12 text-end">
                                <a class="btn btn-secondary mx-1" href="/dashboard/perjalanan-karir">
                                    <i class="bi bi-arrow-left-circle"></i> Kembali
                                </a>
                                <button class="btn btn-success mx-1">
                                    <i class="bi bi-file-earmark-check"></i> Simpan
                                </button>
                            </div>
                        </div>
                        
                    </form>
                </div>

            </div>

        </div>

    </div>
@endsection
