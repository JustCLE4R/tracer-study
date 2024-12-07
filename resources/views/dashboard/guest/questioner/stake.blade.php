<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pusat Pengembangan Karir</title>

    <!-- Favicon -->
    <link href="favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap">

    <!-- Icons Font -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Libraries Stylesheet -->
    <link rel="stylesheet" href="/lib/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel='stylesheet' href='https://cdn.lineicons.com/1.0.1/LineIcons.min.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:100,300,400,600&amp;display=swap'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <link rel="stylesheet" type="text/css" href="/css/trix.css">

    <!-- Custom Stylesheet -->
    <link href="/css/dashboard.css" rel="stylesheet">
    <link href="/css/timeline.css" rel="stylesheet">

</head>

<body>

    <div class="row justify-content-center bg-white p-0 mb-4">

        <div class="content" style="width:100% !important; margin-left:0 !important; padding:0 !important;">
            <div class="container-fluid pt-4">
                <div class="row justify-content-center">
                    <div class="col-10">
                        <div class="bg-light rounded p-5 border-top border-success border-5" style="min-height: 70vh ;">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ $questioner->token }}" method="POST">
                                <div class="row">
                                    <div class="col-12">
                                        <span class="h4">Kuesioner StakeHolder</span>
                                        <hr>
                                    </div>
                                </div>
                                @csrf
                                <div class="row my-2">
                                    <div class="h6 mb-2"><b>(a) Menilai</b></div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                        <label for="a_1" class="form-label">Nama: </label>
                                        <input type="text" class="form-control" name="a_1" id="a_1"
                                            value="{{ $questioner->pekerja->user->nama }}" readonly>
                                    </div>
                                    <div class="col-6">
                                        <label for="a_2" class="form-label">Jabatan: </label>
                                        <input type="text" class="form-control" name="a_2" id="a_2"
                                            value="{{ $questioner->pekerja->jabatan_pekerjaan }}" readonly>
                                    </div>
                                </div>
                                <div class="row justify-content-between">
                                    <div class="h6 mb-2"><b>(b) Penilai </b></div>
                                    <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                        <label class="form-label text-secondary" for="b_1">Nama Perusahaan:</label>
                                        <input type="text" id="b_1" name="b_1" class="form-control"
                                            value="{{ old('b_1', $questioner->nama_perusahaan) }}" required>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                        <label class="form-label text-secondary" for="b_2">Nama Atasan:</label>
                                        <input type="text" id="b_2" name="b_2" class="form-control"
                                            value="{{ old('b_2', $questioner->nama_atasan) }}" required>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                        <label class="form-label text-secondary" for="b_3">Posisi / Jabatan
                                            Atasan:</label>
                                        <input type="text" id="b_3" name="b_3" class="form-control"
                                            value="{{ old('b_3', $questioner->jabatan_atasan) }}" required>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                        <label class="form-label text-secondary" for="b_4">Nomor Telepon
                                            Atasan:</label>
                                        <input type="text" id="b_4" name="b_4" class="form-control"
                                            value="{{ old('b_4', $questioner->telepon_atasan) }}" required>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                        <label class="form-label text-secondary" for="b_5">Alamat
                                            Perusahaan:</label>
                                        <input type="text" id="b_5" name="b_5" class="form-control"
                                            value="{{ old('b_5', $questioner->alamat_perusahaan) }}" required>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                        <label class="form-label text-secondary" for="b_6">Alamat Email Aktif
                                            Atasan:</label>
                                        <input type="email" id="b_6" name="b_6" class="form-control"
                                            value="{{ old('b_6', $questioner->email_atasan) }}" required>
                                    </div>
                                </div>
                                <div class="row my-2">
                                    <div class="col-12">
                                        <div class="h6 mb-2"><b>(c) Hubungan kerjasama apakah yang kantor/perusahaan
                                                anda Miliki saat ini dengan UINSU?
                                            </b></div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12 my-1">
                                        <div>
                                            <input class="form-check-input" type="radio" id="c-radio-ada"
                                                name="c_1[]">
                                            <label class="form-check-label" for="c-radio-ada">Ada? Tampilkan</label>

                                            <input class="form-check-input ms-3" type="radio" id="c-radio-tidak-ada"
                                                name="c_1[]" value="f">
                                            <label class="form-check-label" for="c-radio-tidak-ada">Tidak Ada</label>
                                        </div>

                                        <div id="c-checkbox-group" style="display: none; margin-top: 10px;">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" name="c_1[]"
                                                    value="a" id="checkbox-sponsorship">
                                                <label class="form-check-label"
                                                    for="checkbox-sponsorship">Sponsorship</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" name="c_1[]"
                                                    value="b" id="checkbox-rekrutmen">
                                                <label class="form-check-label"
                                                    for="checkbox-rekrutmen">Rekrutmen</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" name="c_1[]"
                                                    value="c" id="checkbox-magang">
                                                <label class="form-check-label" for="checkbox-magang">Magang</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" name="c_1[]"
                                                    value="d" id="checkbox-beasiswa">
                                                <label class="form-check-label"
                                                    for="checkbox-beasiswa">Beasiswa</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" name="c_1[]"
                                                    value="e" id="checkbox-kuliah-tamu">
                                                <label class="form-check-label" for="checkbox-kuliah-tamu">Kuliah
                                                    Tamu</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row my-2">
                                    <div class="col-12">
                                        <div class="h6 mb-2"><b>(d) Hubungan apakah yang kantor/perusahaan anda
                                                Inginkan saat ini dengan UINSU?
                                            </b></div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12 my-1">
                                        <div>
                                            <input class="form-check-input" type="radio" id="d-radio-ada"
                                                name="d_1[]">
                                            <label class="form-check-label" for="d-radio-ada">Ada? Tampilkan</label>

                                            <input class="form-check-input ms-3" type="radio" id="d-radio-tidak-ada"
                                                name="d_1[]" value="f">
                                            <label class="form-check-label" for="d-radio-tidak-ada">Tidak Ada</label>
                                        </div>

                                        <div id="d-checkbox-group" style="display: none; margin-top: 10px;">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" name="d_1[]"
                                                    value="a" id="checkbox-sponsorship">
                                                <label class="form-check-label"
                                                    for="checkbox-sponsorship">Sponsorship</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" name="d_1[]"
                                                    value="b" id="checkbox-rekrutmen">
                                                <label class="form-check-label"
                                                    for="checkbox-rekrutmen">Rekrutmen</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" name="d_1[]"
                                                    value="c" id="checkbox-magang">
                                                <label class="form-check-label" for="checkbox-magang">Magang</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" name="d_1[]"
                                                    value="d" id="checkbox-beasiswa">
                                                <label class="form-check-label"
                                                    for="checkbox-beasiswa">Beasiswa</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" name="d_1[]"
                                                    value="e" id="checkbox-kuliah-tamu">
                                                <label class="form-check-label" for="checkbox-kuliah-tamu">Kuliah
                                                    Tamu</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row" id="questionnaire-form"></div>

                                <div class="row my-2">
                                    <div class="col-12">
                                        <span class="h6 mb-2"><b>(g) Menurut Anda, Kompetensi HARDSKILL apakah yang
                                                menurut Anda kurang diberikan di UIN SU Medan?</b></span>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <label for="g_1" class="form-label">Jawaban Anda:</label>
                                        <input type="text" class="form-control" name="g_1" id="g_1"
                                            value="{{ old('g_1') }}" required>
                                    </div>
                                </div>
                                <div class="row my-2">
                                    <div class="col-12">
                                        <span class="h6 mb-2"><b>(i) Menurut Anda, Kompetensi SOFTSKILL apakah yang
                                                menurut Anda kurang diberikan di UINSU Medan</b></span>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <label for="i_1" class="form-label">Jawaban Anda:</label>
                                        <input type="text" class="form-control" name="i_1" id="i_1"
                                            value="{{ old('i_1') }}" required>
                                    </div>
                                </div>
                                <div class="row my-2">
                                    <div class="col-12">
                                        <span class="h6 mb-2"><b>(j) Apakah Usulan Anda untuk meningkatkan kompetensi
                                                Alumni yang sesuai dengan kebutuhan di Perusahaan Anda saat
                                                ini?</b></span>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <label for="j_1" class="form-label">Jawaban Anda:</label>
                                        <input type="text" class="form-control" name="j_1" id="j_1"
                                            value="{{ old('j_1') }}" required>
                                    </div>
                                </div>
                                <div class="row mt-2 justify-content-end">
                                    <div class="col-lg-3 col-md-3 col-sm-10 text-end">
                                        <button class="btn btn-success btn-sm mb-3">Kirim Jawaban <i
                                                class="bi bi-send-fill"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>



            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const radioAda = document.getElementById("c-radio-ada");
                    const radioTidakAda = document.getElementById("c-radio-tidak-ada");
                    const checkboxGroup = document.getElementById("c-checkbox-group");

                    radioAda.addEventListener("change", function() {
                        if (radioAda.checked) {
                            checkboxGroup.style.display = "block";
                        }
                    });

                    radioTidakAda.addEventListener("change", function() {
                        if (radioTidakAda.checked) {
                            checkboxGroup.style.display = "none";
                            const checkboxes = checkboxGroup.querySelectorAll("input[type='checkbox']");
                            checkboxes.forEach(function(checkbox) {
                                checkbox.checked = false; 
                            });
                        }
                    });
                });

                document.addEventListener("DOMContentLoaded", function() {
                    const radioAda = document.getElementById("d-radio-ada");
                    const radioTidakAda = document.getElementById("d-radio-tidak-ada");
                    const checkboxGroup = document.getElementById("d-checkbox-group");

                    radioAda.addEventListener("change", function() {
                        if (radioAda.checked) {
                            checkboxGroup.style.display = "block";
                        }
                    });

                    radioTidakAda.addEventListener("change", function() {
                        if (radioTidakAda.checked) {
                            checkboxGroup.style.display = "none";
                            const checkboxes = checkboxGroup.querySelectorAll("input[type='checkbox']");
                            checkboxes.forEach(function(checkbox) {
                                checkbox.checked = false; 
                            });
                        }
                    });
                });



                document.addEventListener('DOMContentLoaded', function() {
                    const formContainer = document.getElementById('questionnaire-form');

                    fetch('/json/stack.json')
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok ' + response.statusText);
                            }
                            return response.json();
                        })
                        .then(data => {
                            data.questioner.forEach(section => {
                                const sectionTitle = document.createElement('div');
                                sectionTitle.className = 'row';
                                sectionTitle.innerHTML = `
                    <div class="col-12">
                        <span class="h6 mb-2"><b>${section.title}</b></span>
                    </div>
                `;
                                formContainer.appendChild(sectionTitle);

                                if (section.questions) {
                                    // Create questions
                                    section.questions.forEach((question, index) => {
                                        const questionCol = document.createElement('div');
                                        questionCol.className = 'col-lg-6 col-sm-12 my-1';
                                        questionCol.innerHTML = `
                            <span class="mb-1">${index + 1}. ${question.text}</span>
                        `;
                                        question.options.forEach((option, index) => {
                                            const optionDiv = document.createElement('div');
                                            optionDiv.className = 'form-check';
                                            optionDiv.innerHTML = `
                                <input class="form-check-input" type="radio" name="${question.name}" id="${question.name}-${option}" value="${question.options.length - index - 1}" required>
                                <label class="form-check-label" for="${question.name}-${option}">
                                    ${option}
                                </label>
                            `;
                                            questionCol.appendChild(optionDiv);
                                        });

                                        formContainer.appendChild(questionCol);
                                    });
                                } else if (section.options) {
                                    const optionsCol = document.createElement('div');
                                    optionsCol.className = 'col-lg-6 col-sm-12 my-1';
                                    section.options.forEach((option, index) => {
                                        const optionDiv = document.createElement('div');
                                        optionDiv.className = 'form-check';
                                        optionDiv.innerHTML = `
                            <input class="form-check-input" type="radio" name="${section.name}" id="${section.name}-${option}" value="${index}" required>
                            <label class="form-check-label" for="${section.name}-${option}">
                                ${option}
                            </label>
                        `;
                                        optionsCol.appendChild(optionDiv);
                                    });

                                    formContainer.appendChild(optionsCol);
                                }
                            });
                        })
                        .catch(error => {
                            console.error('Error fetching the JSON data:', error);
                        });
                });
            </script>


        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://kit.fontawesome.com/fc596df623.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="/js/wow.min.js"></script>

    <script src="/lib/waypoints/waypoints.min.js"></script>
    <script src="/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="/lib/tempusdominus/js/moment.min.js"></script>
    <script src="/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>


    <script type="text/javascript" src="/js/trix.js"></script>
    <script>
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        });
    </script>

    <!-- Custom Javascript -->
    <script src="/js/dashboard.js"></script>
</body>

</html>
