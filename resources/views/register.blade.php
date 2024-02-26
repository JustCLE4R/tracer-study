<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <link rel="stylesheet" href="/css/register.css">

    <title>Registrasi Tracer Study</title> 
</head>
<body >
    <div class="container m-3 shadow">
        <header data-aos="fade-left" data-aos-duration="800">Registration </header>

        <form action="#">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Informasi Akademik</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Nama Lengkap</label>
                            <input type="text" placeholder="Enter your name" required>
                        </div>                        

                        <div class="input-field">
                            <label>NIM</label>
                            <input type="number" placeholder="Enter NIM" required>
                        </div>
                        

                        <div class="input-field">
                            <label>No WA/HP</label>
                            <input type="number" placeholder="Enter mobile number" required>
                        </div>

                        <div class="input-field">
                            <label>Fakultas</label>
                            <select required>
                                <option disabled selected>Pilih Fakultas</option>
                                <option value="">Fakultas Dakwah Dan Komunikasi</option>
                                <option value="">Fakulktas Ekonomi Dan Bisnis Islam</option>
                                <option value="">Fakultas Syariah Dan Hukum</option>
                                <option value="">Fakultas Ilmu Tarbiyah Dan Keguruan</option>
                                <option value="">Fakultas Ushuluddin Dan Studi Islam</option>
                                <option value="">Fakultas Sains Dan Teknologi</option>
                                <option value="">Fakultas Ilmu Sosial</option>
                                <option value="">Fakultas Kesehatan Masyarakat</option>
                                
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Program Studi</label>
                            <select required>
                                <option disabled selected>Pilih Program Studi</option>
                                <option value="">Ilmu Komputer</option>
                                <option value="">Matematika</option>
                                <option value="">Fisika</option>
                                <option value="">Kimia</option>
                                <option value="">Sistem Informasi</option>

                                
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Tingkat Pendidikan</label>
                            <select required>
                                <option disabled selected>Pilih Tingkat Pendidikan</option>
                                <option value="">S1</option>
                                <option value="">S2</option>
                                <option value="">S3</option>

                                
                            </select>
                        </div>
                    </div>
                </div>

                <div class="details ID">
                    <span class="title">Informasi Akademik Tambahan</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Angkatan/Tahun Masuk</label>
                            <select required>
                                <option disabled selected>Pilih Tahun Masuk</option>
                                <option value="">2015</option>
                                <option value="">2016</option>
                                <option value="">2017</option>
                                <option value="">2018</option>
                                <option value="">2019</option>
                                <option value="">2020</option>                                
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Tanggal Lulus/Tanggal Sidang</label>
                            <input type="date" required>
                        </div>

                        <div class="input-field">
                            <label>Tanggal Yudisium</label>
                            <input type="date" required>
                        </div>

                        <div class="input-field">
                            <label>Tanggal Wisuda</label>
                            <input type="date" required>
                        </div>

                        <div class="input-field">
                            <label>IPK</label>
                            <input type="number" placeholder="Enter your IPK" required>
                        </div>

                        <div class="input-field">
                            <label>SKS Kumulatif</label>
                            <input type="number" placeholder="SKS Kumulatif" required>
                        </div>

                    </div>

                    <div class="row justify-content-between align-items-center" id="btn">
                        <div class="col-4">
                            <button class="nextBtn">
                                <span class="btnText">Next</span>
                                <i class="uil uil-navigator"></i>
                            </button>
                        </div>
                        <div class="col-6 text-end">
                            <span id="span">Sudah Memiliki Akun? <a href="login.php">Login Disini</a></span>
                        </div>
                    </div>
                    
                </div> 
            </div>

            <div class="form second">
                <div class="details address">
                    <span class="title">Informasi Pribadi</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Nomor KTP</label>
                            <input type="number" placeholder="No KTP" required>
                        </div>

                        <div class="input-field">
                            <label>Tempat Lahir</label>
                            <input type="text" placeholder="Enter Tempat Lahir" required>
                        </div>

                        <div class="input-field">
                            <label>Jenis Kelamin</label>
                            <select required>
                                <option disabled selected>Pilih Jenis Kelamin</option>
                                <option value="">Laki-laki</option>
                                <option value="">Perempuan</option>                             
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Status Pernikahan</label>
                            <select required>
                                <option disabled selected>Pilih Status Pernikahan</option>
                                <option value="">Lajang</option>
                                <option value="">Menikah</option>    
                                <option value="">Bercerai</option>                           
                            </select>
                        </div>

                        
                    </div>
                </div>

                <div class="details family">
                    <span class="title">Domisili</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Kewarga Negaraan</label>
                            <input type="text" placeholder="Enter Kewarganegaraan" required>
                        </div>

                        <div class="input-field">
                            <label>Domisili Saat Ini/Alamat Saat ini</label>
                            <input type="text" placeholder="Enter Domisili" required>
                        </div>

                        <div class="input-field">
                            <label for="provinsi">Provinsi</label>
                            <select id="provinsi" required>
                                <option disabled selected>Pilih Provinsi</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label for="kota">Kabupaten/Kota</label>
                            <select id="kota" required>
                                <option disabled selected>Pilih Kabupaten/Kota</option>
                            </select>
                        </div>

                    </div>

                    <div class="buttons">
                        <div class="backBtn">
                            <i class="uil uil-navigator"></i>
                            <span class="btnText">Back</span>
                        </div>
                        
                        <button class="sumbit">
                            <span class="btnText">Submit</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                </div> 
            </div>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="/js/register.js"></script>
</body>
</html>