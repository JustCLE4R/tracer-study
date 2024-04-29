@extends('dashboard.layouts.main')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded p-5 border-top border-success border-5">
                    <div class="row">
                        <div class="col-12">
                            <span class="h4">Edit Pekerjaan</span>
                            <hr>
                        </div>
                    </div>
                    <form action="/dashboard/perjalanan-karir" method="POST" enctype="multipart/form-data">

                        <div class="row justify-content-between" id="dynamicForm">
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Kriteria Pekerjaan *</label>
                                <select class="form-select" aria-label="Default select example" name="kriteria-pekerjaan">
                                    <option>Pilih Kriteria Pekerjaan</option>
                                    <option value="a" {{ (old('kriteria-pekerjaan') ? old('kriteria-pekerjaan') : $pekerja->getRawOriginal('kriteria_pekerjaan')) == 'a' ? 'selected' : '' }}>Instansi pemerintah (termasuk BUMN)</option>
                                    <option value="b" {{ (old('kriteria-pekerjaan') ? old('kriteria-pekerjaan') : $pekerja->getRawOriginal('kriteria_pekerjaan')) == 'b' ? 'selected' : '' }}>Organisasi non-profit / lembaga swadaya masyarakat</option>
                                    <option value="c" {{ (old('kriteria-pekerjaan') ? old('kriteria-pekerjaan') : $pekerja->getRawOriginal('kriteria_pekerjaan')) == 'c' ? 'selected' : '' }}>Perusahaan swasta</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Bidang Pekerjaan *</label>
                                <select class="form-select" aria-label="Default select example" name="bidang-pekerjaan">
                                    <option>Pilih Bidang Pekerjaan</option>
                                    <option value="a" {{ (old('bidang-pekerjaan') ? old('bidang-pekerjaan') : $pekerja->getRawOriginal('bidang_pekerjaan')) == 'a' ? 'selected' : '' }}>Pertanian, perikanan, dan kehutanan</option>
                                    <option value="b" {{ (old('bidang-pekerjaan') ? old('bidang-pekerjaan') : $pekerja->getRawOriginal('bidang_pekerjaan')) == 'b' ? 'selected' : '' }}>Pertambangan dan penggalian</option>
                                    <option value="c" {{ (old('bidang-pekerjaan') ? old('bidang-pekerjaan') : $pekerja->getRawOriginal('bidang_pekerjaan')) == 'c' ? 'selected' : '' }}>Industri pengolahan</option>
                                    <option value="d" {{ (old('bidang-pekerjaan') ? old('bidang-pekerjaan') : $pekerja->getRawOriginal('bidang_pekerjaan')) == 'd' ? 'selected' : '' }}>Pengadaaan listrik, gas, uap/air panas, dan udara dingin</option>
                                    <option value="e" {{ (old('bidang-pekerjaan') ? old('bidang-pekerjaan') : $pekerja->getRawOriginal('bidang_pekerjaan')) == 'e' ? 'selected' : '' }}>Pengelolaan air, pengolahan air limbah, pengelolaan dan daur ulang sampah, dan aktivitas remediasi</option>
                                    <option value="f" {{ (old('bidang-pekerjaan') ? old('bidang-pekerjaan') : $pekerja->getRawOriginal('bidang_pekerjaan')) == 'f' ? 'selected' : '' }}>Konstruksi</option>
                                    <option value="g" {{ (old('bidang-pekerjaan') ? old('bidang-pekerjaan') : $pekerja->getRawOriginal('bidang_pekerjaan')) == 'g' ? 'selected' : '' }}>Perdagangan besar dan eceran, reparasi dan perawatan mobil dan sepeda motor</option>
                                    <option value="h" {{ (old('bidang-pekerjaan') ? old('bidang-pekerjaan') : $pekerja->getRawOriginal('bidang_pekerjaan')) == 'h' ? 'selected' : '' }}>Pengangkutan dan pergudangan</option>
                                    <option value="i" {{ (old('bidang-pekerjaan') ? old('bidang-pekerjaan') : $pekerja->getRawOriginal('bidang_pekerjaan')) == 'i' ? 'selected' : '' }}>Penyediaan akomodasi dan penyediaan makanan dan minuman</option>
                                    <option value="j" {{ (old('bidang-pekerjaan') ? old('bidang-pekerjaan') : $pekerja->getRawOriginal('bidang_pekerjaan')) == 'j' ? 'selected' : '' }}>Informasi dan komunikasi</option>
                                    <option value="k" {{ (old('bidang-pekerjaan') ? old('bidang-pekerjaan') : $pekerja->getRawOriginal('bidang_pekerjaan')) == 'k' ? 'selected' : '' }}>Aktivitas keuangan dan asuransi</option>
                                    <option value="l" {{ (old('bidang-pekerjaan') ? old('bidang-pekerjaan') : $pekerja->getRawOriginal('bidang_pekerjaan')) == 'l' ? 'selected' : '' }}>Real estate</option>
                                    <option value="m" {{ (old('bidang-pekerjaan') ? old('bidang-pekerjaan') : $pekerja->getRawOriginal('bidang_pekerjaan')) == 'm' ? 'selected' : '' }}>Aktivitas profesional, ilmiah, dan teknis</option>
                                    <option value="n" {{ (old('bidang-pekerjaan') ? old('bidang-pekerjaan') : $pekerja->getRawOriginal('bidang_pekerjaan')) == 'n' ? 'selected' : '' }}>Aktivitas persewaan dan sewa guna usaha tanpa hak opsi, ketenagakerjaan, agen perjalanan dan lainnya</option>
                                    <option value="o" {{ (old('bidang-pekerjaan') ? old('bidang-pekerjaan') : $pekerja->getRawOriginal('bidang_pekerjaan')) == 'o' ? 'selected' : '' }}>Administrasi pemerintahan, pertahanan, dan jaminan sosial wajib</option>
                                    <option value="p" {{ (old('bidang-pekerjaan') ? old('bidang-pekerjaan') : $pekerja->getRawOriginal('bidang_pekerjaan')) == 'p' ? 'selected' : '' }}>Aktivitas Pendidikan</option>
                                    <option value="q" {{ (old('bidang-pekerjaan') ? old('bidang-pekerjaan') : $pekerja->getRawOriginal('bidang_pekerjaan')) == 'q' ? 'selected' : '' }}>Aktivitas kesehatan dan aktivitas sosial</option>
                                    <option value="r" {{ (old('bidang-pekerjaan') ? old('bidang-pekerjaan') : $pekerja->getRawOriginal('bidang_pekerjaan')) == 'r' ? 'selected' : '' }}>Kesenian, hiburan dan rekreasi</option>
                                    <option value="s" {{ (old('bidang-pekerjaan') ? old('bidang-pekerjaan') : $pekerja->getRawOriginal('bidang_pekerjaan')) == 's' ? 'selected' : '' }}>Aktivitas jasa lainnya</option>
                                    <option value="t" {{ (old('bidang-pekerjaan') ? old('bidang-pekerjaan') : $pekerja->getRawOriginal('bidang_pekerjaan')) == 't' ? 'selected' : '' }}>Aktivitas rumah tangga sebagai pemberi kerja, aktivitas yang menghasilkan barang dan jasa oleh rumah yang digunakan untuk memenuhi kebutuhan sendiri yang digunakan untuk memenuhi kebutuhan sendiri</option>
                                    <option value="u" {{ (old('bidang-pekerjaan') ? old('bidang-pekerjaan') : $pekerja->getRawOriginal('bidang_pekerjaan')) == 'u' ? 'selected' : '' }}>Aktivitas badan internasional dan badan ekstra internasional lainnya</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Tingkat / Ukuran Tempat Bekerja *</label>
                                <select class="form-select" aria-label="Default select example"
                                    name="tingkat-ukuran-tempat-bekerja">
                                    <option>Pilih Tingkat / Ukuran Tempat Bekerja</option>
                                    <option value="a">Lokal</option>
                                    <option value="b">Nasional</option>
                                    <option value="c">Multinasional</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Posisi / Jabatan Pekerjaan *</label>
                                <select class="form-select" aria-label="Default select example"
                                    name="posisi-jabatan-pekerjaan">
                                    <option>Pilih Posisi / Jabatan Pekerjaan</option>
                                    <option value="b">Direktur</option>
                                    <option value="c">Kepala Unit</option>
                                    <option value="d">Supervisor</option>
                                    <option value="e">Staf</option>
                                    <option value="f">Self Employed</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Detail Pekerjaan *</label>
                                <input type="text" id="formGroupExampleInput" name="detail-pekerjaan"
                                    class="form-control">
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Jumlah Pendapatan Perbulan *</label>
                                <input type="number" id="formGroupExampleInput" name="jumlah-pendapatan-perbulan"
                                    class="form-control">
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Kesesuaian Pekerjaan dengan Prodi *</label>
                                <select class="form-select" aria-label="Default select example"
                                    name="kesesuaian-pekerjaan-dengan-prodi">
                                    <option>Pilih Kesesuaian Pekerjaan dengan Prodi</option>
                                    <option value="a">Tinggi</option>
                                    <option value="b">Sedang</option>
                                    <option value="c">Rendah</option>
                                </select> 
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Tanggal Mulai Bekerja *</label>
                                <input type="date" id="formGroupExampleInput" name="tanggal-mulai-bekerja"
                                    class="form-control">
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Tanggal Akhir Kerja (Kosongkan Jika Masih Bekerja)*</label>
                                <input type="date" id="formGroupExampleInput" name="tanggal-akhir-kerja"
                                    class="form-control">
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
                                <label class="form-label text-secondary">Foto/Bukti Telah Bekerja *</label>
                                <div class="d-flex align-items-center">
                                    <input type="file" id="formGroupExampleFile" name="fotobukti-telah-bekerja"
                                        class="form-control">
                                    <span class="ms-2" data-bs-toggle="popover" data-bs-title="Keterangan"
                                        data-bs-content="File ini bisa berupa foto/screenshot yang membuktikan bahwa anda telah bekerja/berwirausaha, contoh: 1. Surat/Email Penerimaan Bekerja, 2. Surat Keputusan kontrak kerja, 3. Riwayat chat penerimaan /pemanggilan kerja, 4. Foto Tempat Berwirausaha, 5. Dan lain-lain">
                                        <i class="bi bi-info-circle"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="row justify-content-between" id="informasiPerusahaan">
                            <span class="h4">Informasi Perusahaan</span>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Nama Perusahaan *</label>
                                <input type="text" id="formGroupExampleInput" name="nama-perusahaan"
                                    class="form-control" value="{{ old('nama-perusahaan', $pekerja->detailPerusahaan->nama_perusahaan) }}">
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Nama Atasan *</label>
                                <input type="text" id="formGroupExampleInput" name="nama-atasan"
                                    class="form-control" value="{{ old('nama-atasan', $pekerja->detailPerusahaan->nama_atasan) }}">
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Posisi / Jabatan Atasan *</label>
                                <input type="text" id="formGroupExampleInput" name="posisi-jabatan-atasan"
                                    class="form-control" value="{{ old('posisi-jabatan-atasan', $pekerja->detailPerusahaan->jabatan_atasan) }}">
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Nomor Telepon Atasan *</label>
                                <input type="text" id="formGroupExampleInput" name="nomor-telepon-atasan"
                                    class="form-control" value="{{ old('nomor-telepon-atasan', $pekerja->detailPerusahaan->telepon_atasan) }}">
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Alamat Perusahaan *</label>
                                <input type="text" id="formGroupExampleInput" name="alamat-perusahaan"
                                    class="form-control" value="{{ old('alamat-perusahaan', $pekerja->detailPerusahaan->alamat_perusahaan) }}">
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Alamat Email Aktif Atasan *</label>
                                <input type="email" id="formGroupExampleInput" name="alamat-email-aktif-atasan"
                                    class="form-control" value="{{ old('alamat-email-aktif-atasan', $pekerja->detailPerusahaan->email_atasan) }}">
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
