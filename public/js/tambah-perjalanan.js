function handleStatusChange() {
    var filterTracer = document.getElementById("filterTracer");
    var bekerjaSelect = document.getElementById("bekerjaSelect");
  
    if (filterTracer.value === "bekerja") {
      bekerjaSelect.style.display = "block";
      loadQuestions("fulltime"); // Default pertanyaan untuk fulltime
    } else {
      bekerjaSelect.style.display = "none";
      clearDynamicForm();
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
    // Ganti URL API sesuai dengan kebutuhan
    var apiUrl = "http://127.0.0.1:8000/api/questions/category/bekerja";
  
    // Gunakan fetch atau AJAX untuk mendapatkan pertanyaan dari API
    fetch(apiUrl)
      .then(response => response.json())
      .then(data => {
        buildDynamicForm(data.questions);
      })
      .catch(error => console.error("Error fetching data:", error));
  }
  
  function buildDynamicForm(questions) {
    clearDynamicForm();
  
    var dynamicForm = document.getElementById("dynamicForm");
  
    questions.forEach(question => {
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

    var defaultOption = document.createElement("option");
    defaultOption.selected = true;
    defaultOption.textContent = "Pilih " + question.question; // Ubah di sini
    select.appendChild(defaultOption);

    var qanswer = JSON.parse(question.qanswer);
    Object.keys(qanswer).forEach(key => {
        var option = document.createElement("option");
        option.value = key;
        option.textContent = qanswer[key];
        select.appendChild(option);
    });

    colDiv.appendChild(select);
}
else if (question.type === "text" || question.type === "number" || question.type === "date") {
        var input = document.createElement("input");
        input.type = question.type;
        input.classList.add("form-control");
        input.id = "formGroupExampleInput";
  
        colDiv.appendChild(input);
      } else if (question.type === "radio") {
        var radioContainer = document.createElement("div");
        radioContainer.classList.add("row");
  
        var radioCol = document.createElement("div");
        radioCol.classList.add("col");
  
        var radioLabels = ["Tinggi", "Sedang", "Rendah"];
  
        radioLabels.forEach(radioLabel => {
          var radioSpan = document.createElement("span");
          radioSpan.classList.add("align-middle", "me-2");
  
          var radioInput = document.createElement("input");
          radioInput.classList.add("form-check-input");
          radioInput.type = "radio";
          radioInput.name = "flexRadioDefault";
  
          var radioInputLabel = document.createElement("label");
          radioInputLabel.classList.add("form-check-label", "mt-1");
          radioInputLabel.textContent = radioLabel;
  
          radioSpan.appendChild(radioInput);
          radioSpan.appendChild(radioInputLabel);
          radioCol.appendChild(radioSpan);
        });
  
        radioContainer.appendChild(radioCol);
        colDiv.appendChild(radioContainer);
      }
  
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
  
  
  