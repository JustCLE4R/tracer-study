$.ajax({
  url: "/api/questions/category/studi",
  type: "GET",
  dataType: "json",
  success: function (data) {
    populateForm(data.questions);
  },
  error: function (error) {
    console.log("Error fetching data:", error);
  },
})

function populateForm(questions){
  const pendidikanForm = $('#pendidikanForm')
  
  questions.forEach(question => {
    if(question.type == 'select'){
      pendidikanForm.append(createSelectElement(question))
    }
    else if(question.type == 'text'){
      pendidikanForm.append(createTextElement(question))
    }
    else if(question.type == 'date'){
      pendidikanForm.append(createDateElement(question))
    }
    else if(question.type == 'file'){
      pendidikanForm.append(createFileElement(question))
    }
  });
}

function createSelectElement(question){
  let colDiv = $("<div>").addClass("col-lg-4 col-md-6 col-sm-12 my-2");
  let label = $("<label>").addClass("form-label text-secondary").text(question.question + " *");
  let select = $("<select>").addClass("form-select").attr("name", question.question.toLowerCase().replace(/\s/g, '_'));
  let defaultOption = $("<option>").prop({ selected: true, hidden: true}).text("Pilih " + question.question);

  select.append(defaultOption);

  $.each(JSON.parse(question.qanswer), function (index, value) {
    let option = $("<option>").text(value).val(index);
    select.append(option);
  })

  colDiv.append(label);
  colDiv.append(select);

  return colDiv;
}

function createTextElement(question){
  let colDiv = $("<div>").addClass("col-lg-4 col-md-6 col-sm-12 my-2");
  let label = $("<label>").addClass("form-label text-secondary").text(`${question.question} *`);
  let textInput = $("<input>").addClass("form-control").attr('type', 'text').attr("name", question.question.toLowerCase().replace(/\s/g, '_'));

  colDiv.append(label);
  colDiv.append(textInput);

  return colDiv;
}


function createDateElement(question){
  let colDiv = $("<div>").addClass("col-lg-4 col-md-6 col-sm-12 my-2");
  let label = $("<label>").addClass("form-label text-secondary").text(question.question + " *");
  let dateInput = $("<input>").addClass("form-control").attr('type', 'date').attr("name", question.question.toLowerCase().replace(/\s/g, '_'));

  colDiv.append(label);
  colDiv.append(dateInput);

  return colDiv;
}

function createFileElement(question){
  let colDiv = $("<div>").addClass("col-lg-4 col-md-6 col-sm-12 my-2");
  let label = $("<label>").addClass("form-label text-secondary").text(question.question + " *");
  let fileInput = $("<input>").addClass("form-control").attr('type', 'file').attr("name", question.question.toLowerCase().replace(/\s/g, '_'));

  colDiv.append(label);
  colDiv.append(fileInput);

  return colDiv;
}