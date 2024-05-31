@extends('dashboard.layouts.main')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded p-5 border-top border-success border-5" style="min-height: 70vh;">
                    <div class="row">
                        <div class="col-12">
                            <span class="h4">Questioner</span><br>
                            Status Pengisian:
                            @if ($questioner->isNotEmpty())
                                <span class="btn btn-sm btn-success">Sudah Mengisi <i class="bi bi-check-lg"></i></span>  
                                <p class="mt-3">Tanggal Pengisian: <span class="h6">{{ $questioner[0]->created_at->locale('id')->translatedFormat('d F Y') }}</span></p>
                            @else
                                <span class="btn btn-sm btn-danger text-light">Belum Mengisi <i class="bi bi-x-lg"></i></span>
                                <hr>
                            @endif
                        </div>
                        @if ($questioner->isEmpty())
                        <div class="col-12" style="line-height: 1.6rem;">
                            <p>Sebelum Melakukan Pengisian Kuesioner ini, diharapkan bagi alumni untuk:</p>
                            <ul>
                                <li>1. Melakukan pembaharuan data diri pada menu profile</li>
                                <li>2. Melakukan pembaharuan riwayat pekerjaan pada menu perjalanan karir</li>
                                <li>3. Melakukan pembaharuan riwayat pendidikan pada menu perjalanan karir</li>
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
            </div>


            @if ($questioner->isEmpty())
                <div class="col-sm-12 col-xl-12">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <div class="bg-light rounded p-5 border-top border-success border-5" style="min-height: 70vh ;">
                        <div class="row">
                            <div class="col-12">
                                <span class="h4">Tracer Study Alumni</span>
                                <hr>
                            </div>
                        </div>



                        <form action="questioner" method="POST">
                            @csrf
                            <div class="row" id="questionnaire-form"></div>
                            <div class="row my-2">
                                <div class="col-12">
                                    <span class="h6 mb-2"><b>(h) Matakuliah yang paling berperan terhadap kelanjutan karir anda?</b></span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <label for="h_1" class="form-label">Jawaban Anda :</label>
                                    <input type="text" class="form-control" name="h_1" id="h_1" required>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col-12">
                                    <span class="h6 mb-2"><b>(i) Matakuliah yang sebaiknya ditiadakan?</b></span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <label for="i_1" class="form-label">Jawaban Anda :</label>
                                    <input type="text" class="form-control" name="i_1" id="i_1" required>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col-12">
                                    <span class="h6 mb-2"><b>(j) Matakuliah yang sebaiknya diadakan di kampus?</b></span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <label for="j_1" class="form-label">Jawaban Anda :</label>
                                    <input type="text" class="form-control" name="j_1" id="j_1" required>
                                </div>
                            </div>
                            <div class="row mt-2 justify-content-end">
                                <div class="col-lg-3 col-md-3 col-sm-10 text-end">
                                    <button class="btn btn-success btn-sm mb-3">Kirim Jawaban <i class="bi bi-send-fill"></i>
                                    </button>
                                </div>    
                            </div>
                        </form>


                    </div>
                </div>
            @endif

        </div>
    </div>

    @if ($questioner->isEmpty())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const formContainer = document.getElementById('questionnaire-form');

                fetch('/questioner.json')
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
    @endif
    
@endsection
