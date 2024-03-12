var dynamicFormVisible = false;

function handleStatusChange() {
    var filterTracer = document.getElementById("filterTracer");
    var bekerjaSelect = document.getElementById("bekerjaSelect");

    console.log("Nilai filterTracer:", filterTracer.value);

    // Cek apakah user telah memilih status bekerja
    if (filterTracer.value === "Pilih Status" || filterTracer.value === "") {
        console.log("Pilih status bekerja terlebih dahulu.");
        clearDynamicForm(); // Hapus form jika user belum memilih
        dynamicFormVisible = false; // Setel flag menjadi false
        return;
    }

    if (filterTracer.value === "bekerja") {
        console.log("User memilih status bekerja");
        bekerjaSelect.style.display = "block";
        // Jika belum memilih fulltime/parttime, tidak perlu menampilkan dynamicForm
        if (bekerjaSelect.value === "Pilih Status Bekerja") {
            clearDynamicForm();
            dynamicFormVisible = false; // Setel flag menjadi false
            return;
        }
        dynamicFormVisible = true; // Setel flag menjadi true
        loadQuestions(bekerjaSelect.value); // Default pertanyaan untuk fulltime/parttime
    } else {
        console.log("User tidak memilih status bekerja");
        bekerjaSelect.style.display = "none";
        clearDynamicForm();
        dynamicFormVisible = false; // Setel flag menjadi false
    }
}



function handleBekerjaChange() {
    var bekerjaSelect = document.getElementById("bekerjaSelect");
    var selectedValue = bekerjaSelect.value;
    loadQuestions(selectedValue);
}

function clearDynamicForm() {
    var dynamicForm = document.getElementById("dynamicForm");
    dynamicForm.innerHTML = "";
}

function loadQuestions(type) {
    var filterTracer = document.getElementById("filterTracer");
    var bekerjaSelect = document.getElementById("bekerjaSelect");

    // Cek apakah user telah memilih status bekerja
    if (filterTracer.value === "Pilih Status" || filterTracer.value === "") {
        console.log("Pilih status bekerja terlebih dahulu.");
        clearDynamicForm(); // Hapus form jika user belum memilih
        return;
    }

    // Cek apakah user telah memilih fulltime atau parttime jika kategori bekerja terpilih
    if (filterTracer.value === "bekerja" && (type !== "fulltime" && type !== "parttime")) {
        console.log("Pilih fulltime atau partime terlebih dahulu.");
        clearDynamicForm(); // Hapus form jika user belum memilih
        return;
    }

    // Lanjutkan dengan menampilkan atau menyembunyikan select fulltime/parttime
    if (filterTracer.value === "bekerja") {
        bekerjaSelect.style.display = "block";
    } else {
        bekerjaSelect.style.display = "none";
        clearDynamicForm();
        return; // Jangan lanjut ke fetching pertanyaan jika bukan kategori bekerja
    }

    // Ganti URL API sesuai dengan kebutuhan
    var apiUrlBekerja = "http://127.0.0.1:8000/api/questions/category/bekerja";
    var apiUrlInfoPerusahaan = "http://127.0.0.1:8000/api/questions/category/info-perusahaan";

    // Fetch pertanyaan dari kedua kategori
    Promise.all([fetch(apiUrlBekerja), fetch(apiUrlInfoPerusahaan)])
        .then(responses => Promise.all(responses.map(response => response.json())))
        .then(dataArray => {
            var questionsBekerja = dataArray[0].questions;
            var questionsInfoPerusahaan = dataArray[1].questions;

            // Filter pertanyaan berdasarkan pilihan select
            var filteredQuestionsBekerja = questionsBekerja.filter(question => {
                return !(type === "fulltime" && question.id === 1) &&
                       !(type === "parttime" && question.id === 2);
            });

            // Setelah mendapatkan pertanyaan dari kedua kategori, panggil fungsi buildDynamicForm
            buildDynamicForm(filteredQuestionsBekerja, questionsInfoPerusahaan);
        })
        .catch(errors => {
            console.error("Error fetching data:", errors);
        });
}




function buildDynamicForm(questionsBekerja, questionsInfoPerusahaan) {
    clearDynamicForm();

    var dynamicForm = document.getElementById("dynamicForm");

    // Tambahkan elemen informasi pekerjaan
    var infoJobDiv = document.createElement("div");
    infoJobDiv.classList.add("col-12", "mb-3");

    var infoJobSpan = document.createElement("span");
    infoJobSpan.classList.add("h4");
    infoJobSpan.textContent = "Informasi Pekerjaan";

    infoJobDiv.appendChild(infoJobSpan);
    dynamicForm.appendChild(infoJobDiv);

    // Loop untuk menambahkan pertanyaan kategori bekerja
    questionsBekerja.forEach(question => {
        var colDiv = createQuestionElement(question);
        dynamicForm.appendChild(colDiv);
    });

    // Tambahkan elemen informasi perusahaan
    var infoPerusahaanDiv = document.createElement("div");
    infoPerusahaanDiv.classList.add("col-12", "mb-3");

    var infoPerusahaanSpan = document.createElement("span");
    infoPerusahaanSpan.classList.add("h4");
    infoPerusahaanSpan.textContent = "Informasi Perusahaan";

    infoPerusahaanDiv.appendChild(infoPerusahaanSpan);
    dynamicForm.appendChild(infoPerusahaanDiv);

    // Loop untuk menambahkan pertanyaan kategori info-perusahaan
    questionsInfoPerusahaan.forEach(question => {
        var colDiv = createQuestionElement(question);
        dynamicForm.appendChild(colDiv);
    });

    // Tambahkan elemen untuk tombol Kembali dan Simpan
    var buttonRow = document.createElement("div");
    buttonRow.classList.add("row", "justify-content-end", "my-1");

    var buttonCol = document.createElement("div");
    buttonCol.classList.add("col-lg-5", "col-md-8", "col-sm-12", "text-end");

    var backButton = document.createElement("a");
    backButton.classList.add("btn", "btn-secondary", "mx-1");
    backButton.href = "/dashboard/perjalanan";
    backButton.innerHTML = '<i class="bi bi-arrow-left-circle"></i> Kembali';

    var saveButton = document.createElement("button");
    saveButton.classList.add("btn", "btn-success", "mx-1");
    saveButton.innerHTML = '<i class="bi bi-file-earmark-check"></i> Simpan';

    buttonCol.appendChild(backButton);
    buttonCol.appendChild(saveButton);
    buttonRow.appendChild(buttonCol);
    dynamicForm.appendChild(buttonRow);
}

function createQuestionElement(question) {
    var colDiv = document.createElement("div");
    colDiv.classList.add("col-lg-4", "col-md-6", "col-sm-12", "my-2");

    var label = document.createElement("label");
    label.classList.add("form-label", "text-secondary");
    label.textContent = question.question + " *";

    colDiv.appendChild(label);

    if (question.type === "select") {
        var select = document.createElement("select");
        select.classList.add("form-select");
        select.setAttribute("aria-label", "Default select example");
        select.name = question.id; // Menambahkan atribut name dengan nilai ID pertanyaan

        var defaultOption = document.createElement("option");
        defaultOption.selected = true;
        defaultOption.textContent = "Pilih " + question.question;
        select.appendChild(defaultOption);

        var qanswer = JSON.parse(question.qanswer);
        Object.keys(qanswer).forEach(key => {
            var option = document.createElement("option");
            option.value = key;
            option.textContent = qanswer[key];
            select.appendChild(option);
        });

        colDiv.appendChild(select);
    } else if (question.type === "text" || question.type === "number" || question.type === "date") {
        var input = document.createElement("input");
        input.type = question.type;
        input.classList.add("form-control");
        input.id = "formGroupExampleInput";
        input.name = question.id; // Menambahkan atribut name dengan nilai ID pertanyaan

        colDiv.appendChild(input);
    } else if (question.type === "file") {
        var fileInput = document.createElement("input");
        fileInput.type = "file";
        fileInput.classList.add("form-control-file");
        fileInput.id = "formGroupExampleFile";
        fileInput.name = question.id; // Menambahkan atribut name dengan nilai ID pertanyaan

        colDiv.appendChild(fileInput);
    } else if (question.type === "email") {
        var inputEmail = document.createElement("input");
        inputEmail.type = "email";
        inputEmail.classList.add("form-control");
        inputEmail.id = "formGroupExampleInput";
        inputEmail.name = question.id; // Menambahkan atribut name dengan nilai ID pertanyaan

        colDiv.appendChild(inputEmail);
    }

    return colDiv;
}

