const dynamicForm = $("#dynamicForm");
const informasiPerusahaan = $("#informasiPerusahaan");
const handleStatus = $("#handleStatus");
const buttonGroup = $("#buttonGroup");

function handlePekerjaan(value) {
  dynamicForm.empty();
  informasiPerusahaan.empty();
  if (value === "wirausaha") {
    handleStatus.addClass('d-none')
    fetchQuestion('wirausaha');
  } else if (value === "belum-kerja") {
    handleStatus.addClass('d-none')
    fetchQuestion('belum-kerja')
  } else {
    handleStatus.removeClass('d-none').val(handleStatus.find('option:first').val());
  }
}

function handleStatusChange(value){
  fetchQuestion('bekerja', value);

  informasiPerusahaan.append(populateInformasiPerusahaan());
}

function fetchQuestion(url, status = null){
  buttonGroup.removeClass('d-none');
  $.ajax({
    url: "http://127.0.0.1:8000/api/questions/category/"+url,
    method: "GET",
    dataType: "json",
    success: function (data) {
      if(url === 'bekerja' && status === 'fulltime'){
        data.questions.splice(1,1)
      } else if(url === 'bekerja' && status === 'parttime'){
        data.questions.splice(0,1)
      }

      data.status = status;
      populateForm(data);
    },
    error: function (error) {
      console.log("Error fetching data:", error);
    },
  });
}

function populateForm(data){
  dynamicForm.empty();

  data.questions.forEach(question => {
    dynamicForm.append(buildDynamicForm(question));
  });
}

function populateInformasiPerusahaan(){
  informasiPerusahaan.empty();
  informasiPerusahaan.append($("<span>").addClass("h4").text("Informasi Perusahaan"));
  $.ajax({
    url: "http://127.0.0.1:8000/api/questions/category/info-perusahaan",
    method: "GET",
    dataType: "json",
    success: function (data) {
      data.questions.forEach(element => {
        informasiPerusahaan.append(buildDynamicForm(element));
      });
    },
    error: function (error) {
      console.log("Error fetching data:", error);
    },
  });
}

function isFreelancer(value){
  if(value == 'd'){
    informasiPerusahaan.empty();
  }else{
    informasiPerusahaan.append(populateInformasiPerusahaan());
  }
}

function buildDynamicForm(question) {
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
            var checkboxDiv = $("<div>").addClass("form-check col-8");
    
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