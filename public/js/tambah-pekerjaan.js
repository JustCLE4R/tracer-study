const dynamicForm = $("#dynamicForm");
const informasiPerusahaan = $("#informasiPerusahaan");
const handleStatus = $("#handleStatus");
const buttonGroup = $("#buttonGroup");

function handlePekerjaan(value) {
    dynamicForm.empty();
    informasiPerusahaan.empty();
    if (value === "wirausaha") {
        handleStatus.addClass("d-none");
        fetchQuestion("wirausaha");
    } else if (value === "belum-kerja") {
        handleStatus.addClass("d-none");
        // add checkbox that have value saya-belum-memiliki-pekerjaan
        var checkboxDiv = $("<div>").addClass("form-check");
        var checkbox = $("<input>")
            .attr("type", "checkbox")
            .attr("id", "saya-belum-memiliki-pekerjaan")
            .attr("name", "saya-belum-memiliki-pekerjaan[]")
            .addClass("form-check-input");
        var label = $("<label>")
            .addClass("form-check-label")
            .attr("for", "saya-belum-memiliki-pekerjaan")
            .text("Saya belum memiliki pekerjaan");
        checkboxDiv.append(checkbox, label);
        dynamicForm.append(checkboxDiv);
        fetchQuestion("belum-kerja");
    } else if (value === "pekerja") {
        buttonGroup.addClass("d-none");
        handleStatus
            .removeClass("d-none")
            .val(handleStatus.find("option:first").val());
    }
}

function handleStatusChange(value) {
    fetchQuestion("bekerja", value);

    informasiPerusahaan.append(populateInformasiPerusahaan());
}

function fetchQuestion(url, status = null) {
    buttonGroup.removeClass("d-none");
    $.ajax({
        url: "/json/" + url + ".json",
        method: "GET",
        dataType: "json",
        success: function (data) {
            if (url === "bekerja" && status === "a") {
                data.questions = data.questions.filter(
                    (question) => question.id !== 2
                );
            } else if (url === "bekerja" && status === "b") {
                data.questions = data.questions.filter(
                    (question) => question.id !== 1
                );
            }

            data.status = status;
            populateForm(data);
        },
        error: function (error) {
            console.log("Error fetching data:", error);
        },
    });
}

function populateForm(data) {
    dynamicForm.empty();

    data.questions.forEach((question) => {
        dynamicForm.append(buildDynamicForm(question));
    });
}

function populateInformasiPerusahaan() {
    informasiPerusahaan.empty();
    informasiPerusahaan.append(
        $("<span>").addClass("h4").text("Informasi Perusahaan")
    );
    $.ajax({
        url: "/json/info-perusahaan.json",
        method: "GET",
        dataType: "json",
        success: function (data) {
            data.questions.forEach((element) => {
                informasiPerusahaan.append(buildDynamicForm(element));
            });
        },
        error: function (error) {
            console.log("Error fetching data:", error);
        },
    });
}

function isFreelancer(value) {
    if (value == "d") {
        informasiPerusahaan.empty();
    } else {
        informasiPerusahaan.append(populateInformasiPerusahaan());
    }
}

function buildDynamicForm(question) {
    var colDiv = $("<div>").addClass("col-lg-4 col-md-6 col-sm-12 my-2");

    //Kustom label
    var labelText = question.question;

    var label = $("<label>")
        .addClass("form-label text-secondary")
        .text(labelText);
    colDiv.append(label);

    // Cek ID tertentu untuk elemen select
    if (question.id === 11 || question.id === 12) {
        var select = $("<select>")
            .addClass("form-select")
            .attr("aria-label", "Default select example")
            .attr(
                "name",
                question.name
                    .toLowerCase(),
            );

        var defaultOption = $("<option>")
            .prop({ selected: true })
            .text("Pilih " + labelText); // Use the updated label text
        select.append(defaultOption);

        if (question.id === 11) {
            $.ajax({
                url: "/json/data.json",
                method: "GET",
                dataType: "json",
                success: function (data) {
                    data.forEach((item) => {
                        var option = $("<option>")
                            .val(item.provinsi)
                            .text(item.provinsi);
                        select.append(option);
                    });

                    select.on("change", function () {
                        var selectedProvince = $(this).val();
                        populateCityOptions(selectedProvince);
                    });
                },
                error: function (error) {
                    console.log("Error fetching province data:", error);
                },
            });
        }
        colDiv.append(select);
    } else if (question.id === 30 || question.id === 31) {
        var select = $("<select>")
            .addClass("form-select")
            .attr("aria-label", "Default select example")
            .attr(
                "name",
                question.name
                    .toLowerCase(),
            );

        var defaultOption = $("<option>")
            .prop({ selected: true })
            .text("Pilih " + labelText); // Use the updated label text
        select.append(defaultOption);

        if (question.id === 30) {
            $.ajax({
                url: "/json/data.json",
                method: "GET",
                dataType: "json",
                success: function (data) {
                    data.forEach((item) => {
                        var option = $("<option>")
                            .val(item.provinsi)
                            .text(item.provinsi);
                        select.append(option);
                    });

                    select.on("change", function () {
                        var selectedProvince = $(this).val();
                        populateCityOptions(selectedProvince);
                    });
                },
                error: function (error) {
                    console.log("Error fetching province data:", error);
                },
            });
        }
        colDiv.append(select);
    } else if (question.type === "select" && question.id === 2) {
        var select = $("<select>")
            .addClass("form-select")
            .attr("aria-label", "Default select example")
            .attr(
                "name",
                question.name
                    .toLowerCase(),
            );
        var defaultOption = $("<option>")
            .prop({ selected: true })
            .text("Pilih " + labelText); // Use the updated label text
        select.append(defaultOption);

        var qanswer = JSON.parse(question.qanswer);
        $.each(qanswer, function (key, value) {
            var option = $("<option>").val(key).text(value);
            select.append(option);
        });

        select.on("change", function () {
            var value = $(this).val();
            if (value === "d") {
                informasiPerusahaan.empty();
            } else {
                informasiPerusahaan.append(populateInformasiPerusahaan());
            }
        });

        colDiv.append(select);
    } else if (question.type === "select") {
        if (question.id === 2) {
        } else {
            var select = $("<select>")
                .addClass("form-select")
                .attr("aria-label", "Default select example")
                .attr(
                    "name",
                    question.name
                        .toLowerCase(),
                );
            var defaultOption = $("<option>")
                .prop({ selected: true })
                .text("Pilih " + labelText);
            select.append(defaultOption);

            var qanswer = JSON.parse(question.qanswer);
            $.each(qanswer, function (key, value) {
                var option = $("<option>").val(key).text(value);
                select.append(option);
            });

            colDiv.append(select);
        }
    } else if (
        question.type === "text" ||
        question.type === "number" ||
        question.type === "date"
    ) {
        var inputID = "question-" + question.id;
        if ($("#" + inputID).length === 0) {
            var input = $("<input>")
                .attr({
                    type: question.type,
                    id: inputID,
                    name: question.name
                        .toLowerCase(),
                })
                .addClass("form-control");
            colDiv.append(input);
        }
    } else if (question.type === "file") {
        var fileInputContainer = $("<div>").addClass(
            "d-flex align-items-center"
        );
        var fileInput = $("<input>")
            .attr({
                type: "file",
                id: "formGroupExampleFile",
                name: question.name
                    .toLowerCase(),
            })
            .addClass("form-control");
        var fileInfoSpan = $("<span>").addClass("ms-2").attr({
            "data-bs-toggle": "popover",
            "data-bs-title": "Keterangan",
            "data-bs-content":
                "File ini bisa berupa foto/screenshot yang membuktikan bahwa anda telah bekerja/berwirausaha, contoh: 1. Surat/Email Penerimaan Bekerja, 2. Surat Keputusan kontrak kerja, 3. Riwayat chat penerimaan /pemanggilan kerja, 4. Foto Tempat Berwirausaha, 5. Dan lain-lain",
        });
        var infoIcon = $("<i>").addClass("bi bi-info-circle");
        fileInfoSpan.append(infoIcon);

        fileInputContainer.append(fileInput);
        fileInputContainer.append(fileInfoSpan);

        colDiv.append(fileInputContainer);
    } else if (question.type === "email") {
        var inputEmail = $("<input>")
            .attr({
                type: "email",
                id: "formGroupExampleInput",
                name: question.name
                    .toLowerCase(),
            })
            .addClass("form-control");
        colDiv.append(inputEmail);
    } else if (question.type === "checkbox") {
        var qanswer = JSON.parse(question.qanswer);

        var labelDiv = $("<div>").addClass("col-12");
        labelDiv.append(label);
        colDiv.append(labelDiv);

        Object.keys(qanswer).forEach(function (key) {
            var checkboxDiv = $("<div>").addClass("form-check col-8");

            var checkboxInput = $("<input>")
                .attr({
                    type: "checkbox",
                    id: "formGroupExampleCheckbox_" + key,
                    name:
                        question.name
                            .toLowerCase(),
                    value: key,
                })
                .addClass("form-check-input");

            var checkboxLabel = $("<label>")
                .addClass("form-check-label")
                .text(qanswer[key]);

            checkboxDiv.append(checkboxInput);
            checkboxDiv.append(checkboxLabel);
            colDiv.append(checkboxDiv);
        });
    }

    return colDiv;
}

function populateCityOptions(selectedProvince) {
    var citySelect = $("select[name='kabupaten']");
    citySelect.empty();
    citySelect.append(
        $("<option>").prop({ selected: true }).text("Pilih Kabupaten/Kota")
    );

    $.ajax({
        url: "/json/data.json",
        method: "GET",
        dataType: "json",
        success: function (data) {
            var provinceData = data.find(
                (item) => item.provinsi === selectedProvince
            );
            if (provinceData) {
                provinceData.kota.forEach((city) => {
                    var option = $("<option>").val(city).text(city);
                    citySelect.append(option);
                });
            }
        },
        error: function (error) {
            console.log("Error fetching city data:", error);
        },
    });
}
