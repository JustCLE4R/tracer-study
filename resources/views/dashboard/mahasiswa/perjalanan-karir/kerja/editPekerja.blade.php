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
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="/dashboard/pekerja/{{ $pekerja->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row justify-content-between" id="dynamicForm">
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Status Pekerjaan *</label>
                                <select class="form-select" aria-label="Default select example" name="status-pekerjaan"
                                    disabled>
                                    <option>Pilih Kriteria Pekerjaan</option>
                                    <option value="a"
                                        {{ (old('status-pekerjaan') ? old('status-pekerjaan') : $pekerja->getRawOriginal('status_pekerjaan')) == 'a' ? 'selected' : '' }}>
                                        Full-time</option>
                                    <option value="b"
                                        {{ (old('status-pekerjaan') ? old('status-pekerjaan') : $pekerja->getRawOriginal('status_pekerjaan')) == 'b' ? 'selected' : '' }}>
                                        Part-time</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Kriteria Pekerjaan *</label>
                                <select class="form-select" aria-label="Default select example" name="kriteria-pekerjaan"
                                    disabled>
                                    <option>Pilih Kriteria Pekerjaan</option>
                                    <option value="a"
                                        {{ (old('kriteria-pekerjaan') ? old('kriteria-pekerjaan') : $pekerja->getRawOriginal('kriteria_pekerjaan')) == 'a' ? 'selected' : '' }}>
                                        Instansi pemerintah (termasuk BUMN)</option>
                                    <option value="b"
                                        {{ (old('kriteria-pekerjaan') ? old('kriteria-pekerjaan') : $pekerja->getRawOriginal('kriteria_pekerjaan')) == 'b' ? 'selected' : '' }}>
                                        Organisasi non-profit / lembaga swadaya masyarakat</option>
                                    <option value="c"
                                        {{ (old('kriteria-pekerjaan') ? old('kriteria-pekerjaan') : $pekerja->getRawOriginal('kriteria_pekerjaan')) == 'c' ? 'selected' : '' }}>
                                        Perusahaan swasta</option>
                                    <option value="d"
                                        {{ (old('kriteria-pekerjaan') ? old('kriteria-pekerjaan') : $pekerja->getRawOriginal('kriteria_pekerjaan')) == 'd' ? 'selected' : '' }}>
                                        Freelance (Self Employed) (termasuk Dai)</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Bidang Pekerjaan *</label>
                                <select class="form-select" aria-label="Default select example" name="bidang-pekerjaan">
                                    <option>Pilih Bidang Pekerjaan</option>
                                    <option value="a"
                                        {{ (old('bidang-pekerjaan') ? old('bidang-pekerjaan') : $pekerja->getRawOriginal('bidang_pekerjaan')) == 'a' ? 'selected' : '' }}>
                                        Pertanian, perikanan, dan kehutanan</option>
                                    <option value="b"
                                        {{ (old('bidang-pekerjaan') ? old('bidang-pekerjaan') : $pekerja->getRawOriginal('bidang_pekerjaan')) == 'b' ? 'selected' : '' }}>
                                        Pertambangan dan penggalian</option>
                                    <option value="c"
                                        {{ (old('bidang-pekerjaan') ? old('bidang-pekerjaan') : $pekerja->getRawOriginal('bidang_pekerjaan')) == 'c' ? 'selected' : '' }}>
                                        Industri pengolahan</option>
                                    <option value="d"
                                        {{ (old('bidang-pekerjaan') ? old('bidang-pekerjaan') : $pekerja->getRawOriginal('bidang_pekerjaan')) == 'd' ? 'selected' : '' }}>
                                        Pengadaaan listrik, gas, uap/air panas, dan udara dingin</option>
                                    <option value="e"
                                        {{ (old('bidang-pekerjaan') ? old('bidang-pekerjaan') : $pekerja->getRawOriginal('bidang_pekerjaan')) == 'e' ? 'selected' : '' }}>
                                        Pengelolaan air, pengolahan air limbah, pengelolaan dan daur ulang sampah, dan
                                        aktivitas remediasi</option>
                                    <option value="f"
                                        {{ (old('bidang-pekerjaan') ? old('bidang-pekerjaan') : $pekerja->getRawOriginal('bidang_pekerjaan')) == 'f' ? 'selected' : '' }}>
                                        Konstruksi</option>
                                    <option value="g"
                                        {{ (old('bidang-pekerjaan') ? old('bidang-pekerjaan') : $pekerja->getRawOriginal('bidang_pekerjaan')) == 'g' ? 'selected' : '' }}>
                                        Perdagangan besar dan eceran, reparasi dan perawatan mobil dan sepeda motor</option>
                                    <option value="h"
                                        {{ (old('bidang-pekerjaan') ? old('bidang-pekerjaan') : $pekerja->getRawOriginal('bidang_pekerjaan')) == 'h' ? 'selected' : '' }}>
                                        Pengangkutan dan pergudangan</option>
                                    <option value="i"
                                        {{ (old('bidang-pekerjaan') ? old('bidang-pekerjaan') : $pekerja->getRawOriginal('bidang_pekerjaan')) == 'i' ? 'selected' : '' }}>
                                        Penyediaan akomodasi dan penyediaan makanan dan minuman</option>
                                    <option value="j"
                                        {{ (old('bidang-pekerjaan') ? old('bidang-pekerjaan') : $pekerja->getRawOriginal('bidang_pekerjaan')) == 'j' ? 'selected' : '' }}>
                                        Informasi dan komunikasi</option>
                                    <option value="k"
                                        {{ (old('bidang-pekerjaan') ? old('bidang-pekerjaan') : $pekerja->getRawOriginal('bidang_pekerjaan')) == 'k' ? 'selected' : '' }}>
                                        Aktivitas keuangan dan asuransi</option>
                                    <option value="l"
                                        {{ (old('bidang-pekerjaan') ? old('bidang-pekerjaan') : $pekerja->getRawOriginal('bidang_pekerjaan')) == 'l' ? 'selected' : '' }}>
                                        Real estate</option>
                                    <option value="m"
                                        {{ (old('bidang-pekerjaan') ? old('bidang-pekerjaan') : $pekerja->getRawOriginal('bidang_pekerjaan')) == 'm' ? 'selected' : '' }}>
                                        Aktivitas profesional, ilmiah, dan teknis</option>
                                    <option value="n"
                                        {{ (old('bidang-pekerjaan') ? old('bidang-pekerjaan') : $pekerja->getRawOriginal('bidang_pekerjaan')) == 'n' ? 'selected' : '' }}>
                                        Aktivitas persewaan dan sewa guna usaha tanpa hak opsi, ketenagakerjaan, agen
                                        perjalanan dan lainnya</option>
                                    <option value="o"
                                        {{ (old('bidang-pekerjaan') ? old('bidang-pekerjaan') : $pekerja->getRawOriginal('bidang_pekerjaan')) == 'o' ? 'selected' : '' }}>
                                        Administrasi pemerintahan, pertahanan, dan jaminan sosial wajib</option>
                                    <option value="p"
                                        {{ (old('bidang-pekerjaan') ? old('bidang-pekerjaan') : $pekerja->getRawOriginal('bidang_pekerjaan')) == 'p' ? 'selected' : '' }}>
                                        Aktivitas Pendidikan</option>
                                    <option value="q"
                                        {{ (old('bidang-pekerjaan') ? old('bidang-pekerjaan') : $pekerja->getRawOriginal('bidang_pekerjaan')) == 'q' ? 'selected' : '' }}>
                                        Aktivitas kesehatan dan aktivitas sosial</option>
                                    <option value="r"
                                        {{ (old('bidang-pekerjaan') ? old('bidang-pekerjaan') : $pekerja->getRawOriginal('bidang_pekerjaan')) == 'r' ? 'selected' : '' }}>
                                        Kesenian, hiburan dan rekreasi</option>
                                    <option value="s"
                                        {{ (old('bidang-pekerjaan') ? old('bidang-pekerjaan') : $pekerja->getRawOriginal('bidang_pekerjaan')) == 's' ? 'selected' : '' }}>
                                        Aktivitas jasa lainnya</option>
                                    <option value="t"
                                        {{ (old('bidang-pekerjaan') ? old('bidang-pekerjaan') : $pekerja->getRawOriginal('bidang_pekerjaan')) == 't' ? 'selected' : '' }}>
                                        Aktivitas rumah tangga sebagai pemberi kerja, aktivitas yang menghasilkan barang dan
                                        jasa oleh rumah yang digunakan untuk memenuhi kebutuhan sendiri yang digunakan untuk
                                        memenuhi kebutuhan sendiri</option>
                                    <option value="u"
                                        {{ (old('bidang-pekerjaan') ? old('bidang-pekerjaan') : $pekerja->getRawOriginal('bidang_pekerjaan')) == 'u' ? 'selected' : '' }}>
                                        Aktivitas badan internasional dan badan ekstra internasional lainnya</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Tingkat / Ukuran Tempat Bekerja *</label>
                                <select class="form-select" aria-label="Default select example"
                                    name="tingkat-ukuran-tempat-bekerja">
                                    <option>Pilih Tingkat / Ukuran Tempat Bekerja</option>
                                    <option value="a"
                                        {{ (old('tingkat-ukuran-tempat-bekerja') ? old('tingkat-ukuran-tempat-bekerja') : $pekerja->getRawOriginal('tingkat_tempat_bekerja')) == 'a' ? 'selected' : '' }}>
                                        Lokal</option>
                                    <option value="b"
                                        {{ (old('tingkat-ukuran-tempat-bekerja') ? old('tingkat-ukuran-tempat-bekerja') : $pekerja->getRawOriginal('tingkat_tempat_bekerja')) == 'b' ? 'selected' : '' }}>
                                        Nasional</option>
                                    <option value="c"
                                        {{ (old('tingkat-ukuran-tempat-bekerja') ? old('tingkat-ukuran-tempat-bekerja') : $pekerja->getRawOriginal('tingkat_tempat_bekerja')) == 'c' ? 'selected' : '' }}>
                                        Multinasional</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Posisi / Jabatan Pekerjaan *</label>
                                <select class="form-select" aria-label="Default select example"
                                    name="posisi-jabatan-pekerjaan">
                                    <option>Pilih Posisi / Jabatan Pekerjaan</option>
                                    <option value="b"
                                        {{ (old('posisi-jabatan-pekerjaan') ? old('posisi-jabatan-pekerjaan') : $pekerja->getRawOriginal('jabatan_pekerjaan')) == 'b' ? 'selected' : '' }}>
                                        Direktur</option>
                                    <option value="c"
                                        {{ (old('posisi-jabatan-pekerjaan') ? old('posisi-jabatan-pekerjaan') : $pekerja->getRawOriginal('jabatan_pekerjaan')) == 'c' ? 'selected' : '' }}>
                                        Kepala Unit</option>
                                    <option value="d"
                                        {{ (old('posisi-jabatan-pekerjaan') ? old('posisi-jabatan-pekerjaan') : $pekerja->getRawOriginal('jabatan_pekerjaan')) == 'd' ? 'selected' : '' }}>
                                        Supervisor</option>
                                    <option value="e"
                                        {{ (old('posisi-jabatan-pekerjaan') ? old('posisi-jabatan-pekerjaan') : $pekerja->getRawOriginal('jabatan_pekerjaan')) == 'e' ? 'selected' : '' }}>
                                        Staf</option>
                                    <option value="f"
                                        {{ (old('posisi-jabatan-pekerjaan') ? old('posisi-jabatan-pekerjaan') : $pekerja->getRawOriginal('jabatan_pekerjaan')) == 'f' ? 'selected' : '' }}>
                                        Self Employed</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Detail Pekerjaan *</label>
                                <input type="text" id="formGroupExampleInput" name="detail-pekerjaan"
                                    class="form-control" value="{{ old('detail-pekerjaan', $pekerja->detail_pekerjaan) }}">
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Jumlah Pendapatan Perbulan *</label>
                                <input type="number" id="formGroupExampleInput" name="jumlah-pendapatan-perbulan"
                                    class="form-control"
                                    value="{{ old('jumlah-pendapatan-perbulan', $pekerja->pendapatan) }}">
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Kesesuaian Pekerjaan dengan Prodi *</label>
                                <select class="form-select" aria-label="Default select example"
                                    name="kesesuaian-pekerjaan-dengan-prodi">
                                    <option>Pilih Kesesuaian Pekerjaan dengan Prodi</option>
                                    <option value="a"
                                        {{ (old('kesesuaian-pekerjaan-dengan-prodi') ? old('kesesuaian-pekerjaan-dengan-prodi') : $pekerja->getRawOriginal('kesesuaian')) == 'a' ? 'selected' : '' }}>
                                        Tinggi</option>
                                    <option value="b"
                                        {{ (old('kesesuaian-pekerjaan-dengan-prodi') ? old('kesesuaian-pekerjaan-dengan-prodi') : $pekerja->getRawOriginal('kesesuaian')) == 'b' ? 'selected' : '' }}>
                                        Sedang</option>
                                    <option value="c"
                                        {{ (old('kesesuaian-pekerjaan-dengan-prodi') ? old('kesesuaian-pekerjaan-dengan-prodi') : $pekerja->getRawOriginal('kesesuaian')) == 'c' ? 'selected' : '' }}>
                                        Rendah</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Tanggal Mulai Bekerja *</label>
                                <input type="date" id="formGroupExampleInput" name="tanggal-mulai-bekerja"
                                    class="form-control"
                                    value="{{ old('tanggal-mulai-bekerja', $pekerja->tgl_mulai_kerja) }}">
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Tanggal Akhir Kerja (Kosongkan Jika Masih
                                    Bekerja)*</label>
                                <input type="date" id="formGroupExampleInput" name="tanggal-akhir-kerja"
                                    class="form-control"
                                    value="{{ old('tanggal-akhir-kerja', $pekerja->tgl_akhir_kerja) }}">
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Provinsi *</label>
                                <select id="provinsi" name="provinsi" class="form-control">
                                    <option hidden="">Pilih Provinsi</option>
                                </select>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Kabupaten/Kota *</label>
                                <select id="kota" name="kabupaten" class="form-control">
                                    <option hidden="">Pilih Kabupaten/Kota</option>
                                </select>
                            </div>



                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label class="form-label text-secondary">Foto/Bukti Telah Bekerja *</label>
                                <input type="hidden" name="oldImage" value="{{ $pekerja->bukti_bekerja }}">
                                <img src="{{ asset('storage/' . $pekerja->bukti_bekerja) }}"
                                    class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                <div class="d-flex align-items-center">
                                    <input class="form-control" type="file" id="image"
                                        name="fotobukti-telah-bekerja" onchange="previewImage()">
                                    <span class="ms-2" data-bs-toggle="popover" data-bs-title="Keterangan"
                                        data-bs-content="File ini bisa berupa foto/screenshot yang membuktikan bahwa anda telah bekerja/berwirausaha, contoh: 1. Surat/Email Penerimaan Bekerja, 2. Surat Keputusan kontrak kerja, 3. Riwayat chat penerimaan /pemanggilan kerja, 4. Foto Tempat Berwirausaha, 5. Dan lain-lain">
                                        <i class="bi bi-info-circle"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        @if ($pekerja->getRawOriginal('kriteria_pekerjaan') != 'd')
                            <div class="row justify-content-between" id="informasiPerusahaan">
                                <span class="h4">Informasi Perusahaan</span>
                                <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                    <label class="form-label text-secondary">Nama Perusahaan *</label>
                                    <input type="text" id="formGroupExampleInput" name="nama-perusahaan"
                                        class="form-control"
                                        value="{{ old('nama-perusahaan', $pekerja->detailPerusahaan->nama_perusahaan) }}">
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                    <label class="form-label text-secondary">Nama Atasan *</label>
                                    <input type="text" id="formGroupExampleInput" name="nama-atasan"
                                        class="form-control"
                                        value="{{ old('nama-atasan', $pekerja->detailPerusahaan->nama_atasan) }}">
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                    <label class="form-label text-secondary">Posisi / Jabatan Atasan *</label>
                                    <input type="text" id="formGroupExampleInput" name="posisi-jabatan-atasan"
                                        class="form-control"
                                        value="{{ old('posisi-jabatan-atasan', $pekerja->detailPerusahaan->jabatan_atasan) }}">
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                    <label class="form-label text-secondary">Nomor Telepon Atasan *</label>
                                    <input type="text" id="formGroupExampleInput" name="nomor-telepon-atasan"
                                        class="form-control"
                                        value="{{ old('nomor-telepon-atasan', $pekerja->detailPerusahaan->telepon_atasan) }}">
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                    <label class="form-label text-secondary">Alamat Perusahaan *</label>
                                    <input type="text" id="formGroupExampleInput" name="alamat-perusahaan"
                                        class="form-control"
                                        value="{{ old('alamat-perusahaan', $pekerja->detailPerusahaan->alamat_perusahaan) }}">
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                    <label class="form-label text-secondary">Alamat Email Aktif Atasan *</label>
                                    <input type="email" id="formGroupExampleInput" name="alamat-email-aktif-atasan"
                                        class="form-control"
                                        value="{{ old('alamat-email-aktif-atasan', $pekerja->detailPerusahaan->email_atasan) }}">
                                </div>
                            </div>
                        @endif

                        <hr>

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
        // function previewImage() {
        //     const imgPreview = $('.img-preview');
        //     // imgPreview.show();
        //     imgPreview.css('display', 'block');

        //     const blob = URL.createObjectURL($('#image')[0].files[0]);
        //     imgPreview.attr('src', blob);
        // }
        document.addEventListener('DOMContentLoaded', function() {
            const apiURL = '/json/data.json';
            const provinsiSelect = document.getElementById('provinsi');
            const kotaSelect = document.getElementById('kota');

            const initProvinsi = '{{ old('provinsi', $pekerja->provinsi_pekerja) }}';
            const initKabupaten = '{{ old('kabupaten', $pekerja->kabupaten_pekerja) }}';

            fetch(apiURL)
                .then((response) => response.json())
                .then((data) => {
                    // Isi provinsi
                    data.forEach((prov) => {
                        const option = document.createElement('option');
                        option.value = prov.provinsi;
                        option.textContent = prov.provinsi;

                        if (prov.provinsi === initProvinsi) {
                            option.selected = true;
                        }

                        provinsiSelect.appendChild(option);
                    });

                    // Event handler ketika provinsi dipilih
                    provinsiSelect.addEventListener('change', function() {
                        kotaSelect.innerHTML = '<option hidden="">Pilih Kabupaten/Kota</option>';

                        const selectedProvinsi = this.value;
                        const selectedData = data.find((prov) => prov.provinsi === selectedProvinsi);

                        if (selectedData && selectedData.kota) {
                            selectedData.kota.forEach((kabupaten) => {
                                const option = document.createElement('option');
                                option.value = kabupaten;
                                option.textContent = kabupaten;

                                if (kabupaten === initKabupaten) {
                                    option.selected = true;
                                }

                                kotaSelect.appendChild(option);
                            });
                        }
                    });
                    if (initProvinsi) {
                        provinsiSelect.value = initProvinsi;
                        provinsiSelect.dispatchEvent(new Event('change'));
                    }
                })
                .catch((error) => console.error('Error fetching data:', error));
        });
    </script>
@endsection
