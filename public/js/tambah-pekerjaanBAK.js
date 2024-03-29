var dynamicFormVisible = false;

function handleStatusChange() {
    var filterTracer = $("#filterTracer");
    var bekerjaSelect = $("#bekerjaSelect");

    if (filterTracer.val() === "Pilih Status" || filterTracer.val() === "") {
        clearDynamicForm();
        clearInfoPerusahaanForm(); // Hapus form informasi perusahaan saat status tidak dipilih atau kosong
        dynamicFormVisible = false;
        return;
    }

    if (filterTracer.val() === "pekerja") {
        bekerjaSelect.show();
        if (bekerjaSelect.val() === "Pilih Status Bekerja") {
            clearDynamicForm();
            clearInfoPerusahaanForm(); // Hapus form informasi perusahaan saat memilih "pekerja" tetapi status pekerjaan tidak dipilih
            dynamicFormVisible = false;
            return;
        }
        handleBekerjaChange(filterTracer.val());
        dynamicFormVisible = true;
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
        clearInfoPerusahaanForm(); // Hapus form informasi perusahaan untuk status lainnya
        dynamicFormVisible = false;
    }
}

function handleBekerjaChange(value) {
    loadQuestions(value);

    
}


function isFreelancer(value) {
    if (value === "d") {
        $("#infoPerusahaan").empty();
    } 
    else {
        $("#infoPerusahaan").append();//saya ingin infoPerusahaan ditambahkan lagi setelah dihapus
    }
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

function loadQuestionsBekerja() {
    var apiUrlBekerja = "http://127.0.0.1:8000/api/questions/category/bekerja";

    return $.ajax({
        url: apiUrlBekerja,
        method: "GET",
        dataType: "json",
        success: function (dataBekerja) {
            var questionsBekerja = dataBekerja.questions;
            // Panggil fungsi buildDynamicBekerja dengan parameter questionsBekerja
        },
        error: function (errorBekerja) {
            console.error("Error fetching bekerja data:", errorBekerja);
        }
    });
}

function loadQuestionsInfoPerusahaan() {
    var apiUrlInfoPerusahaan = "http://127.0.0.1:8000/api/questions/category/info-perusahaan";

    return $.ajax({
        url: apiUrlInfoPerusahaan,
        method: "GET",
        dataType: "json",
        success: function (dataInfoPerusahaan) {
            var questionsInfoPerusahaan = dataInfoPerusahaan.questions;
            // Panggil fungsi buildDynamicInfoPerusahaan dengan parameter questionsInfoPerusahaan
        },
        error: function (errorInfoPerusahaan) {
            console.error("Error fetching info perusahaan data:", errorInfoPerusahaan);
        }
    });
}
function loadQuestions(type, status = null) { 
    clearDynamicForm();


    if (type === "wirausaha") {
        loadQuestionsWirausaha().then(buildDynamicFormWirausaha);
    } else if (type === "belum-kerja") {
        loadQuestionsBelumKerja().then(buildDynamicFormBelumKerja);
    } else if (type === "bekerja") {
        console.log(status);
    } else {
        console.error("Invalid type:", type);
    }
}

function buildDynamicBekerja(questionsBekerja) {
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
}

function buildDynamicInfoPerusahaan(questionsInfoPerusahaan) {
    var infoPerusahaanDiv = $("<div>").addClass("row mb-3").attr("id", "infoPerusahaan");
    var infoPerusahaanSpan = $("<span>").addClass("h4").text("Informasi Perusahaan");
    infoPerusahaanDiv.append(infoPerusahaanSpan);
    dynamicForm.append(infoPerusahaanDiv);

    questionsInfoPerusahaan.forEach(function (question) {
        var colDiv = createQuestionElement(question);
        infoPerusahaanDiv.append(colDiv);
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


function createQuestionElement(question) {
    var colDiv = $("<div>").addClass("col-lg-4 col-md-6 col-sm-12 my-2");
    var label = $("<label>").addClass("form-label text-secondary").text(question.question + " *");
    colDiv.append(label);

    if (question.id === 2) {
        var select = $("<select>")
            .addClass("form-select")
            .attr("aria-label", "Default select example")
            .attr("name", question.question.toLowerCase().replace(/\s+/g, '-').replace(/[^a-zA-Z0-9-]/g, '').replace(/-{2,}/g, '-'))
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
            .attr("name", question.question.toLowerCase().replace(/\s+/g, '-').replace(/[^a-zA-Z0-9-]/g, '').replace(/-{2,}/g, '-')); 
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
            .attr({ type: question.type, id: "formGroupExampleInput", name: question.question.toLowerCase().replace(/\s+/g, '-').replace(/[^a-zA-Z0-9-]/g, '').replace(/-{2,}/g, '-') }) 
            .addClass("form-control");
        colDiv.append(input);
    } else if (question.type === "file") {
        var fileInputContainer = $("<div>").addClass("d-flex align-items-center");
        var fileLabel = $("<label>").addClass("form-label text-secondary").text(question.question + " *");
        var fileInput = $("<input>")
            .attr({ type: "file", id: "formGroupExampleFile", name: question.question.toLowerCase().replace(/\s+/g, '-').replace(/[^a-zA-Z0-9-]/g, '').replace(/-{2,}/g, '-') }) 
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
            .attr({ type: "email", id: "formGroupExampleInput", name: question.question.toLowerCase().replace(/\s+/g, '-').replace(/[^a-zA-Z0-9-]/g, '').replace(/-{2,}/g, '-') }) 
            .addClass("form-control");
        colDiv.append(inputEmail);
    } else if (question.type === "checkbox") {
        // Parse JSON dari qanswer
        var qanswer = JSON.parse(question.qanswer);
    
        var labelDiv = $("<div>").addClass("col-12");
        labelDiv.append(label);
        colDiv.append(labelDiv);
    
        Object.keys(qanswer).forEach(function(key) {
            var checkboxDiv = $("<div>").addClass("form-check col-6");
    
            var checkboxInput = $("<input>")
                .attr({ type: "checkbox", id: "formGroupExampleCheckbox_" + key, name: question.question.toLowerCase().replace(/\s+/g, '-').replace(/[^a-zA-Z0-9-]/g, '').replace(/-{2,}/g, '-') + "[]", value: key })
                .addClass("form-check-input");
    
            var checkboxLabel = $("<label>").addClass("form-check-label").text(qanswer[key]);
    
            checkboxDiv.append(checkboxInput);
            checkboxDiv.append(checkboxLabel);
            colDiv.append(checkboxDiv);
        });
    }
    

    return colDiv;
}


