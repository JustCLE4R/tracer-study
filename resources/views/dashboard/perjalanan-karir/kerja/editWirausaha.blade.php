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
                    <form action="/dashboard/wirausaha/{{ $wirausaha->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row justify-content-between" id="dynamicForm">
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Nama Usaha *</label>
                                <input type="text" id="formGroupExampleInput" name="nama-usaha" class="form-control" value="{{ old('nama-usaha', $wirausaha->nama_usaha) }}">
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Tingkat / Ukuran Tempat Usaha *</label>
                                <select class="form-select" aria-label="Default select example" name="tingkat-ukuran-tempat-usaha">
                                    <option>Pilih Tingkat / Ukuran Tempat Bekerja</option>
                                    <option value="a" {{ (old('tingkat-ukuran-tempat-usaha') ? old('tingkat-ukuran-tempat-usaha') : $wirausaha->getRawOriginal('tingkat_tempat_usaha')) == 'a' ? 'selected' : '' }}>Lokal</option>
                                    <option value="b" {{ (old('tingkat-ukuran-tempat-usaha') ? old('tingkat-ukuran-tempat-usaha') : $wirausaha->getRawOriginal('tingkat_tempat_usaha')) == 'b' ? 'selected' : '' }}>Nasional</option>
                                    <option value="c" {{ (old('tingkat-ukuran-tempat-usaha') ? old('tingkat-ukuran-tempat-usaha') : $wirausaha->getRawOriginal('tingkat_tempat_usaha')) == 'c' ? 'selected' : '' }}>Multinasional</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Bidang Usaha *</label>
                                <select class="form-select" aria-label="Default select example" name="bidang-usaha">
                                    <option>Pilih Bidang Usaha</option>
                                    <option value="a" {{ (old('bidang-usaha') ? old('bidang-usaha') : $wirausaha->getRawOriginal('bidang_usaha')) == 'a' ? 'selected' : '' }}>Pertanian, perikanan, dan kehutanan</option>
                                    <option value="b" {{ (old('bidang-usaha') ? old('bidang-usaha') : $wirausaha->getRawOriginal('bidang_usaha')) == 'b' ? 'selected' : '' }}>Pertambangan dan penggalian</option>
                                    <option value="c" {{ (old('bidang-usaha') ? old('bidang-usaha') : $wirausaha->getRawOriginal('bidang_usaha')) == 'c' ? 'selected' : '' }}>Industri pengolahan</option>
                                    <option value="d" {{ (old('bidang-usaha') ? old('bidang-usaha') : $wirausaha->getRawOriginal('bidang_usaha')) == 'd' ? 'selected' : '' }}>Pengadaaan listrik, gas, uap/air panas, dan udara dingin</option>
                                    <option value="e" {{ (old('bidang-usaha') ? old('bidang-usaha') : $wirausaha->getRawOriginal('bidang_usaha')) == 'e' ? 'selected' : '' }}>Pengelolaan air, pengolahan air limbah, pengelolaan dan daur ulang sampah, dan aktivitas remediasi</option>
                                    <option value="f" {{ (old('bidang-usaha') ? old('bidang-usaha') : $wirausaha->getRawOriginal('bidang_usaha')) == 'f' ? 'selected' : '' }}>Konstruksi</option>
                                    <option value="g" {{ (old('bidang-usaha') ? old('bidang-usaha') : $wirausaha->getRawOriginal('bidang_usaha')) == 'g' ? 'selected' : '' }}>Perdagangan besar dan eceran, reparasi dan perawatan mobil dan sepeda motor</option>
                                    <option value="h" {{ (old('bidang-usaha') ? old('bidang-usaha') : $wirausaha->getRawOriginal('bidang_usaha')) == 'h' ? 'selected' : '' }}>Pengangkutan dan pergudangan</option>
                                    <option value="i" {{ (old('bidang-usaha') ? old('bidang-usaha') : $wirausaha->getRawOriginal('bidang_usaha')) == 'i' ? 'selected' : '' }}>Penyediaan akomodasi dan penyediaan makanan dan minuman</option>
                                    <option value="j" {{ (old('bidang-usaha') ? old('bidang-usaha') : $wirausaha->getRawOriginal('bidang_usaha')) == 'j' ? 'selected' : '' }}>Informasi dan komunikasi</option>
                                    <option value="k" {{ (old('bidang-usaha') ? old('bidang-usaha') : $wirausaha->getRawOriginal('bidang_usaha')) == 'k' ? 'selected' : '' }}>Aktivitas keuangan dan asuransi</option>
                                    <option value="l" {{ (old('bidang-usaha') ? old('bidang-usaha') : $wirausaha->getRawOriginal('bidang_usaha')) == 'l' ? 'selected' : '' }}>Real estate</option>
                                    <option value="m" {{ (old('bidang-usaha') ? old('bidang-usaha') : $wirausaha->getRawOriginal('bidang_usaha')) == 'm' ? 'selected' : '' }}>Aktivitas profesional, ilmiah, dan teknis</option>
                                    <option value="n" {{ (old('bidang-usaha') ? old('bidang-usaha') : $wirausaha->getRawOriginal('bidang_usaha')) == 'n' ? 'selected' : '' }}>Aktivitas persewaan dan sewa guna usaha tanpa hak opsi, ketenagakerjaan, agen perjalanan dan lainnya</option>
                                    <option value="o" {{ (old('bidang-usaha') ? old('bidang-usaha') : $wirausaha->getRawOriginal('bidang_usaha')) == 'o' ? 'selected' : '' }}>Administrasi pemerintahan, pertahanan, dan jaminan sosial wajib</option>
                                    <option value="p" {{ (old('bidang-usaha') ? old('bidang-usaha') : $wirausaha->getRawOriginal('bidang_usaha')) == 'p' ? 'selected' : '' }}>Aktivitas Pendidikan</option>
                                    <option value="q" {{ (old('bidang-usaha') ? old('bidang-usaha') : $wirausaha->getRawOriginal('bidang_usaha')) == 'q' ? 'selected' : '' }}>Aktivitas kesehatan dan aktivitas sosial</option>
                                    <option value="r" {{ (old('bidang-usaha') ? old('bidang-usaha') : $wirausaha->getRawOriginal('bidang_usaha')) == 'r' ? 'selected' : '' }}>Kesenian, hiburan dan rekreasi</option>
                                    <option value="s" {{ (old('bidang-usaha') ? old('bidang-usaha') : $wirausaha->getRawOriginal('bidang_usaha')) == 's' ? 'selected' : '' }}>Aktivitas jasa lainnya</option>
                                    <option value="t" {{ (old('bidang-usaha') ? old('bidang-usaha') : $wirausaha->getRawOriginal('bidang_usaha')) == 't' ? 'selected' : '' }}>Aktivitas rumah tangga sebagai pemberi kerja, aktivitas yang menghasilkan barang dan jasa oleh rumah yang digunakan untuk memenuhi kebutuhan sendiri yang digunakan untuk memenuhi kebutuhan sendiri</option>
                                    <option value="u" {{ (old('bidang-usaha') ? old('bidang-usaha') : $wirausaha->getRawOriginal('bidang_usaha')) == 'u' ? 'selected' : '' }}>Aktivitas badan internasional dan badan ekstra internasional lainnya</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Detail Usaha *</label>
                                <input type="text" id="formGroupExampleInput" name="detail-usaha" class="form-control" value="{{ old('detail-usaha', $wirausaha->detail_usaha) }}">
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Jumlah Pendapatan Perbulan (Omset Penjualan) *</label>
                                <input type="number" id="formGroupExampleInput" name="jumlah-pendapatan-perbulan-omset-penjualan" class="form-control" value="{{ old('jumlah-pendapatan-perbulan-omset-penjualan', $wirausaha->omset) }}">
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Jumlah Pendapatan Bersih Perbulan *</label>
                                <input type="number" id="formGroupExampleInput" name="jumlah-pendapatan-bersih-perbulan" class="form-control" value="{{ old('jumlah-pendapatan-bersih-perbulan', $wirausaha->pendapatan) }}">
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <div class="col-12">
                                    <label class="form-label text-secondary">Pemodal Saat Ini *</label>
                                </div>
                                <div class="form-check col-8">
                                    <input type="checkbox" id="formGroupExampleCheckbox_a" name="pemodal-saat-ini[]" value="a" class="form-check-input" {{ (old('pemodal-saat-ini') ? in_array('a', old('pemodal-saat-ini')) : (in_array('a', json_decode($wirausaha->getRawOriginal('pemodal'))))) ? 'checked' : '' }}>
                                    <label class="form-check-label">Pribadi / Tabungan</label>
                                </div>
                                <div class="form-check col-8">
                                    <input type="checkbox" id="formGroupExampleCheckbox_b" name="pemodal-saat-ini[]" value="b" class="form-check-input" {{ (old('pemodal-saat-ini') ? in_array('b', old('pemodal-saat-ini')) : (in_array('b', json_decode($wirausaha->getRawOriginal('pemodal'))))) ? 'checked' : '' }}>
                                    <label class="form-check-label">Bank</label>
                                </div>
                                <div class="form-check col-8">
                                    <input type="checkbox" id="formGroupExampleCheckbox_c" name="pemodal-saat-ini[]" value="c" class="form-check-input" {{ (old('pemodal-saat-ini') ? in_array('c', old('pemodal-saat-ini')) : (in_array('c', json_decode($wirausaha->getRawOriginal('pemodal'))))) ? 'checked' : '' }}>
                                    <label class="form-check-label">Keluarga</label>
                                </div>
                                <div class="form-check col-8">
                                    <input type="checkbox" id="formGroupExampleCheckbox_d" name="pemodal-saat-ini[]" value="d" class="form-check-input" {{ (old('pemodal-saat-ini') ? in_array('d', old('pemodal-saat-ini')) : (in_array('d', json_decode($wirausaha->getRawOriginal('pemodal'))))) ? 'checked' : '' }}>
                                    <label class="form-check-label">Investor</label>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Kesesuaian usaha dengan Prodi *</label>
                                <select class="form-select" aria-label="Default select example" name="kesesuaian-usaha-dengan-prodi">
                                    <option>Pilih Kesesuaian usaha dengan Prodi</option>
                                    <option value="a" {{ (old('kesesuaian-usaha-dengan-prodi') ? old('kesesuaian-usaha-dengan-prodi') : $wirausaha->getRawOriginal('kesesuaian')) == 'a' ? 'selected' : '' }}>Tinggi</option>
                                    <option value="b" {{ (old('kesesuaian-usaha-dengan-prodi') ? old('kesesuaian-usaha-dengan-prodi') : $wirausaha->getRawOriginal('kesesuaian')) == 'b' ? 'selected' : '' }}>Sedang</option>
                                    <option value="c" {{ (old('kesesuaian-usaha-dengan-prodi') ? old('kesesuaian-usaha-dengan-prodi') : $wirausaha->getRawOriginal('kesesuaian')) == 'c' ? 'selected' : '' }}>Rendah</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Tanggal Mulai Usaha *</label>
                                <input type="date" id="formGroupExampleInput" name="tanggal-mulai-usaha" class="form-control" value="{{ old('tanggal-mulai-usaha', $wirausaha->tgl_mulai_usaha) }}">
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Tanggal Akhir Usaha</label>
                                <input type="date" id="formGroupExampleInput" name="tanggal-akhir-usaha" class="form-control" value="{{ old('tanggal-akhir-usaha', $wirausaha->tgl_akhir_usaha) }}">
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Provinsi *</label>
                                <input type="text" id="formGroupExampleInput" name="provinsi" class="form-control" value="{{ old('provinsi', $wirausaha->provinsi_usaha) }}">
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Kabupaten *</label>
                                <input type="text" id="formGroupExampleInput" name="kabupaten" class="form-control" value="{{ old('kabupaten', $wirausaha->kabupaten_usaha) }}">
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Alamat *</label>
                                <input type="text" id="formGroupExampleInput" name="alamat" class="form-control" value="{{ old('alamat', $wirausaha->alamat_usaha) }}">
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Foto/Bukti Telah Berwirausaha</label>
                                <input type="hidden" name="oldImage" value="{{ $wirausaha->bukti_berusaha }}">
                                <img src="{{ asset('storage/'.$wirausaha->bukti_berusaha) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                <div class="d-flex align-items-center">
                                    <input class="form-control" type="file" id="image" name="fotobukti-telah-berwirausaha" onchange="previewImage()">
                                    <span class="ms-2" data-bs-toggle="popover" data-bs-title="Keterangan"
                                        data-bs-content="File ini bisa berupa foto/screenshot yang membuktikan bahwa anda telah bekerja/berwirausaha, contoh: 1. Surat/Email Penerimaan Bekerja, 2. Surat Keputusan kontrak kerja, 3. Riwayat chat penerimaan /pemanggilan kerja, 4. Foto Tempat Berwirausaha, 5. Dan lain-lain">
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

    <script>
        function previewImage() {
            const imgPreview = $('.img-preview');
            // imgPreview.show();
            imgPreview.css('display', 'block');

            const blob = URL.createObjectURL($('#image')[0].files[0]);
            imgPreview.attr('src', blob);
        }
    </script>
@endsection
