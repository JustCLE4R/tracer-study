$(document).ready(function() {
    // Ganti URL API dengan URL yang sesuai
    var apiUrl = 'http://127.0.0.1:8000/api/questions/category/bekerja';

    // Ambil data dari API menggunakan AJAX
    $.ajax({
        url: apiUrl,
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            // Proses data dan tambahkan ke formulir
            buildForm(data.questions);
        },
        error: function(error) {
            console.log('Error fetching data:', error);
        }
    });

    function buildForm(questions) {
        var formContent = '';

        questions.forEach(function(question, index) {
            formContent += '<div class="row my-2">';
            formContent += '<div class="col-12">' + (index + 1) + '. ' + question.question + '</div>';
            formContent += '<div class="col-12 ps-4">';

            var qanswer = JSON.parse(question.qanswer);

            // Tambahkan logika sesuai dengan tipe pertanyaan
            if (question.type === 'radio') {
                Object.keys(qanswer).forEach(function(key) {
                    formContent += '<div class="form-check">';
                    formContent += '<input class="form-check-input" type="radio" name="question_' + question.id + '" id="answer_' + question.id + '_' + key + '">';
                    formContent += '<label class="form-check-label" for="answer_' + question.id + '_' + key + '">';
                    formContent += key + '. ' + qanswer[key];
                    formContent += '</label>';
                    formContent += '</div>';
                });
            } else if (question.type === 'select') {
                // Tambahkan logika untuk jenis pertanyaan select
                formContent += '<select class="form-select" name="question_' + question.id + '">';
                Object.keys(qanswer).forEach(function(key) {
                    formContent += '<option value="' + key + '">' + qanswer[key] + '</option>';
                });
                formContent += '</select>';
            } else if (question.type === 'text' || question.type === 'number') {
                // Tambahkan logika untuk jenis pertanyaan input teks dan angka
                formContent += '<input type="' + question.type + '" class="form-control" name="question_' + question.id + '">';
            } else if (question.type === 'checkbox') {
                // Tambahkan logika untuk jenis pertanyaan checkbox
                Object.keys(qanswer).forEach(function(key) {
                    formContent += '<div class="form-check">';
                    formContent += '<input class="form-check-input" type="checkbox" name="question_' + question.id + '_' + key + '" id="answer_' + question.id + '_' + key + '">';
                    formContent += '<label class="form-check-label" for="answer_' + question.id + '_' + key + '">';
                    formContent += key + '. ' + qanswer[key];
                    formContent += '</label>';
                    formContent += '</div>';
                });
            }

            formContent += '</div></div>';
        });

        // Tambahkan formulir ke elemen dengan id dynamicForm
        $('#dynamicForm').append(formContent);
    }
    
    

});

$(document).ready(function() {
    var apiWiraswasta = 'http://127.0.0.1:8000/api/questions/category/wiraswasta';

    // Ambil data dari API menggunakan AJAX
    $.ajax({
        url: apiWiraswasta,
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            // Proses data dan tambahkan ke formulir
            buildForm(data.questions);
        },
        error: function(error) {
            console.log('Error fetching data:', error);
        }
    });

    function buildForm(questions) {
        var formContent = '';

        questions.forEach(function(question, index) {
            formContent += '<div class="row my-2">';
            formContent += '<div class="col-12">' + (index + 1) + '. ' + question.question + '</div>';
            formContent += '<div class="col-12 ps-4">';

            var qanswer = JSON.parse(question.qanswer);

            // Tambahkan logika sesuai dengan tipe pertanyaan
            if (question.type === 'radio') {
                Object.keys(qanswer).forEach(function(key) {
                    formContent += '<div class="form-check">';
                    formContent += '<input class="form-check-input" type="radio" name="question_' + question.id + '" id="answer_' + question.id + '_' + key + '">';
                    formContent += '<label class="form-check-label" for="answer_' + question.id + '_' + key + '">';
                    formContent += key + '. ' + qanswer[key];
                    formContent += '</label>';
                    formContent += '</div>';
                });
            } else if (question.type === 'select') {
                // Tambahkan logika untuk jenis pertanyaan select
                formContent += '<select class="form-select" name="question_' + question.id + '">';
                Object.keys(qanswer).forEach(function(key) {
                    formContent += '<option value="' + key + '">' + qanswer[key] + '</option>';
                });
                formContent += '</select>';
            } else if (question.type === 'text' || question.type === 'number') {
                // Tambahkan logika untuk jenis pertanyaan input teks dan angka
                formContent += '<input type="' + question.type + '" class="form-control" name="question_' + question.id + '">';
            } else if (question.type === 'checkbox') {
                // Tambahkan logika untuk jenis pertanyaan checkbox
                Object.keys(qanswer).forEach(function(key) {
                    formContent += '<div class="form-check">';
                    formContent += '<input class="form-check-input" type="checkbox" name="question_' + question.id + '_' + key + '" id="answer_' + question.id + '_' + key + '">';
                    formContent += '<label class="form-check-label" for="answer_' + question.id + '_' + key + '">';
                    formContent += key + '. ' + qanswer[key];
                    formContent += '</label>';
                    formContent += '</div>';
                });
            }

            formContent += '</div></div>';
        });

        // Tambahkan formulir ke elemen dengan id dynamicForm
        $('#wira').append(formContent);
    }
});

document.addEventListener('DOMContentLoaded', function () {
    // Hide bekerja and wiraswasta forms initially
    $('#bekerjaForm, #wiraswastaForm').hide();

    // Handle form submission
    $('#liveAlertBtn').on('click', function () {
        var selectedOption = $('input[name=flexRadioDefault1]:checked').attr('id');

        // Hide all forms initially
        $('#filterForm, #bekerjaForm, #wiraswastaForm').hide();

        // Show the selected form based on user's choice
        if (selectedOption === 'bekerja') {
            $('#bekerjaForm').show();
        } else if (selectedOption === 'wiraswasta') {
            $('#wiraswastaForm').show();
        } else {
            // Show the default filter form
            $('#filterForm').show();
        }
    });
});