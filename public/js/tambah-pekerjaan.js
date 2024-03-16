var dynamicFormVisible = false;

function handleStatusChange() {
    var filterTracer = $("#filterTracer");
    var bekerjaSelect = $("#bekerjaSelect");

    if (filterTracer.val() === "Pilih Status" || filterTracer.val() === "") {
        clearDynamicForm();
        dynamicFormVisible = false;
        return;
    }

    if (filterTracer.val() === "bekerja") {
        bekerjaSelect.show();
        if (bekerjaSelect.val() === "Pilih Status Bekerja") {
            clearDynamicForm();
            dynamicFormVisible = false;
            return;
        }
        dynamicFormVisible = true;
        loadQuestions(bekerjaSelect.val());
    } else if (filterTracer.val() === "wirausaha") {
        bekerjaSelect.hide();
        dynamicFormVisible = true;
        loadQuestions("wirausaha");
    } else if (filterTracer.val() === "Belum memungkinkan bekerja") {
        bekerjaSelect.hide();
        dynamicFormVisible = true;
        loadQuestions("belum-kerja"); // Memuat pertanyaan untuk kategori belum-kerja
    } else {
        bekerjaSelect.hide();
        clearDynamicForm();
        dynamicFormVisible = false;
    }
}



function handleBekerjaChange() {
    var bekerjaSelect = $("#bekerjaSelect");
    var selectedValue = bekerjaSelect.val();
    loadQuestions(selectedValue);
}

function clearDynamicForm() {
    var dynamicForm = $("#dynamicForm");
    dynamicForm.empty();
}

function loadQuestionsWirausaha() {
    var apiUrlWirausaha = "http://127.0.0.1:8000/api/questions/category/wirausaha";

    $.ajax({
        url: apiUrlWirausaha,
        method: "GET",
        dataType: "json",
        success: function (dataWirausaha) {
            var questionsWirausaha = dataWirausaha.questions;
            buildDynamicFormWirausaha(questionsWirausaha);
        },
        error: function (errorWirausaha) {
            console.error("Error fetching wirausaha data:", errorWirausaha);
        }
    });
}

function buildDynamicFormWirausaha(questionsWirausaha) {
    clearDynamicForm();
    var dynamicForm = $("#dynamicForm");

    var infoWirausahaDiv = $("<div>").addClass("col-12 mb-3");
    var infoWirausahaSpan = $("<span>").addClass("h4").text("Informasi Wirausaha");
    infoWirausahaDiv.append(infoWirausahaSpan);
    dynamicForm.append(infoWirausahaDiv);

    questionsWirausaha.forEach(function (question) {
        var colDiv = createQuestionElement(question);
        dynamicForm.append(colDiv);
    });

    var buttonRow = $("<div>").addClass("row justify-content-end my-1");
    var buttonCol = $("<div>").addClass("col-lg-5 col-md-8 col-sm-12 text-end");
    var backButton = $("<a>")
        .addClass("btn btn-secondary mx-1")
        .attr("href", "/dashboard/perjalanan")
        .html('<i class="bi bi-arrow-left-circle"></i> Kembali');
    var saveButton = $("<button>")
        .addClass("btn btn-success mx-1")
        .html('<i class="bi bi-file-earmark-check"></i> Simpan');
    
    buttonCol.append(backButton);
    buttonCol.append(saveButton);
    buttonRow.append(buttonCol);
    dynamicForm.append(buttonRow);
}
function loadQuestionsBelumKerja() {
    var apiUrlBelumKerja = "http://127.0.0.1:8000/api/questions/category/belum-kerja";

    $.ajax({
        url: apiUrlBelumKerja,
        method: "GET",
        dataType: "json",
        success: function (dataBelumKerja) {
            var questionsBelumKerja = dataBelumKerja.questions;
            buildDynamicFormBelumKerja(questionsBelumKerja);
        },
        error: function (errorBelumKerja) {
            console.error("Error fetching belum-kerja data:", errorBelumKerja);
        }
    });
}

function buildDynamicFormBelumKerja(questionsBelumKerja) {
    clearDynamicForm();
    var dynamicForm = $("#dynamicForm");

    questionsBelumKerja.forEach(function (question) {
        var colDiv = createQuestionElement(question);
        dynamicForm.append(colDiv);
    });

    var buttonRow = $("<div>").addClass("row justify-content-end my-1");
    var buttonCol = $("<div>").addClass("col-lg-5 col-md-8 col-sm-12 text-end");
    var backButton = $("<a>")
        .addClass("btn btn-secondary mx-1")
        .attr("href", "/dashboard/perjalanan")
        .html('<i class="bi bi-arrow-left-circle"></i> Kembali');
    var saveButton = $("<button>")
        .addClass("btn btn-success mx-1")
        .html('<i class="bi bi-file-earmark-check"></i> Simpan');
    
    buttonCol.append(backButton);
    buttonCol.append(saveButton);
    buttonRow.append(buttonCol);
    dynamicForm.append(buttonRow);
}


function loadQuestions(type) {
    if (type === "wirausaha") {
        loadQuestionsWirausaha();
    } else if (type === "belum-kerja") {
        loadQuestionsBelumKerja(); // Menambahkan pemanggilan untuk kategori belum-kerja
    } else {
        var apiUrlBekerja = "http://127.0.0.1:8000/api/questions/category/bekerja";
        var apiUrlInfoPerusahaan = "http://127.0.0.1:8000/api/questions/category/info-perusahaan";
        $.when(
            $.ajax({ url: apiUrlBekerja, method: "GET", dataType: "json" }),
            $.ajax({ url: apiUrlInfoPerusahaan, method: "GET", dataType: "json" })
        ).done(function (dataBekerja, dataInfoPerusahaan) {
            var questionsBekerja = dataBekerja[0].questions;
            var questionsInfoPerusahaan = dataInfoPerusahaan[0].questions;

            var filteredQuestionsBekerja = questionsBekerja.filter(function (question) {
                return !(type === "parttime" && question.id === 1) && !(type === "fulltime" && question.id === 2);
            });

            buildDynamicForm(filteredQuestionsBekerja, questionsInfoPerusahaan);
        }).fail(function (errors) {
            console.error("Error fetching data:", errors);
        });
    }
}

function buildDynamicForm(questionsBekerja, questionsInfoPerusahaan) {
    clearDynamicForm();
    var dynamicForm = $("#dynamicForm");

    var infoJobDiv = $("<div>").addClass("col-12 mb-3");
    var infoJobSpan = $("<span>").addClass("h4").text("Informasi Pekerjaan");
    infoJobDiv.append(infoJobSpan);
    dynamicForm.append(infoJobDiv);

    questionsBekerja.forEach(function (question) {
        var colDiv = createQuestionElement(question);
        dynamicForm.append(colDiv);
    });

    var infoPerusahaanDiv = $("<div>").addClass("row mb-3").attr("id", "infoPerusahaan");
    var infoPerusahaanSpan = $("<span>").addClass("h4").text("Informasi Perusahaan");
    infoPerusahaanDiv.append(infoPerusahaanSpan);
    dynamicForm.append(infoPerusahaanDiv);

    questionsInfoPerusahaan.forEach(function (question) {
        var colDiv = createQuestionElement(question);
        infoPerusahaanDiv.append(colDiv);
        // dynamicForm.append(colDiv);
    });

    var buttonRow = $("<div>").addClass("row justify-content-end my-1");
    var buttonCol = $("<div>").addClass("col-lg-5 col-md-8 col-sm-12 text-end");
    var backButton = $("<a>")
        .addClass("btn btn-secondary mx-1")
        .attr("href", "/dashboard/perjalanan")
        .html('<i class="bi bi-arrow-left-circle"></i> Kembali');
    var saveButton = $("<button>")
        .addClass("btn btn-success mx-1")
        .html('<i class="bi bi-file-earmark-check"></i> Simpan');
    
    buttonCol.append(backButton);
    buttonCol.append(saveButton);
    buttonRow.append(buttonCol);
    dynamicForm.append(buttonRow);
}

function isFreelancer(value) {
    console.log(value);
    if (value === "d") {
        $("#infoPerusahaan").css("display", "none");
    } 
    else {
        $("#infoPerusahaan").css("display", "block");
    }
}

function createQuestionElement(question) {
    var colDiv = $("<div>").addClass("col-lg-4 col-md-6 col-sm-12 my-2");
    var label = $("<label>").addClass("form-label text-secondary").text(question.question + " *");
    colDiv.append(label);

    if (question.id === 2) {
        var select = $("<select>")
            .addClass("form-select")
            .attr("aria-label", "Default select example")
            .attr("name", question.id)
            .attr("onchange", "isFreelancer(this.value)");
        var defaultOption = $("<option>").prop({ selected: true }).text("Pilih " + question.question);
        select.append(defaultOption);
        colDiv.append(select);

        var qanswer = JSON.parse(question.qanswer);
        $.each(qanswer, function (key, value) {
            var option = $("<option>").val(key).text(value);
            select.append(option);
        });
    }

    if (question.type === "select" && question.id !== 2) {
        var select = $("<select>")
            .addClass("form-select")
            .attr("aria-label", "Default select example")
            .attr("name", question.question.toLowerCase().replace(/\s+/g, '-')); // Mengubah nama menjadi lowercase dan mengganti spasi dengan -
        var defaultOption = $("<option>").prop({ selected: true }).text("Pilih " + question.question);
        select.append(defaultOption);

        var qanswer = JSON.parse(question.qanswer);
        $.each(qanswer, function (key, value) {
            var option = $("<option>").val(key).text(value);
            select.append(option);
        });

        colDiv.append(select);
    } else if (question.type === "text" || question.type === "number" || question.type === "date") {
        var input = $("<input>")
            .attr({ type: question.type, id: "formGroupExampleInput", name: question.question.toLowerCase().replace(/\s+/g, '-') }) // Mengubah nama menjadi lowercase dan mengganti spasi dengan -
            .addClass("form-control");
        colDiv.append(input);
    } else if (question.type === "file") {
        var fileInputContainer = $("<div>").addClass("d-flex align-items-center");
        var fileLabel = $("<label>").addClass("form-label text-secondary").text(question.question + " *");
        var fileInput = $("<input>")
            .attr({ type: "file", id: "formGroupExampleFile", name: question.question.toLowerCase().replace(/\s+/g, '-') }) // Mengubah nama menjadi lowercase dan mengganti spasi dengan -
            .addClass("form-control");
        var fileInfoSpan = $("<span>").addClass("ms-2").attr({
            "data-bs-toggle": "popover",
            "data-bs-title": "Keterangan",
            "data-bs-content": "File ini bisa berupa foto/screenshot yang membuktikan bahwa anda telah bekerja/berwirausaha, contoh: 1. Surat/Email Penerimaan Bekerja, 2. Surat Keputusan kontrak kerja, 3. Riwayat chat penerimaan /pemanggilan kerja, 4. Foto Tempat Berwirausaha, 5. Dan lain-lain"
        });
        var infoIcon = $("<i>").addClass("bi bi-info-circle");
        fileInfoSpan.append(infoIcon);

        fileInputContainer.append(fileInput);
        fileInputContainer.append(fileInfoSpan);

        colDiv.append(fileInputContainer);
    } else if (question.type === "email") {
        var inputEmail = $("<input>")
            .attr({ type: "email", id: "formGroupExampleInput", name: question.question.toLowerCase().replace(/\s+/g, '-') }) // Mengubah nama menjadi lowercase dan mengganti spasi dengan -
            .addClass("form-control");
        colDiv.append(inputEmail);
    } else if (question.type === "checkbox") {
        var checkboxDiv = $("<div>").addClass("form-check");
        var checkboxLabel = $("<label>").addClass("form-check-label").text("Benar");
        var checkboxInput = $("<input>")
            .attr({ type: "checkbox", id: "formGroupExampleCheckbox", name: question.question.toLowerCase().replace(/\s+/g, '-') }) // Mengubah nama menjadi lowercase dan mengganti spasi dengan -
            .addClass("form-check-input");

        checkboxDiv.append(checkboxInput);
        checkboxDiv.append(checkboxLabel);
        colDiv.append(checkboxDiv);
    }

    return colDiv;
}

