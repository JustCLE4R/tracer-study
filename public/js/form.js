function populateTracer(category) {
  $.ajax({
    url: "/api/questions/category/" + category,
    type: "GET",
    dataType: "json",
    success: function (data) {
      buildForm(data.questions);
    },
    error: function (error) {
      console.log("Error fetching data:", error);
    },
  });

  if ($("#filterTracer").length > 0) {
    $("#submitTracer").show();
  }
}

function buildForm(questions, currentPage, itemsPerPage) {
  var formContent = '';

  var startIndex = (currentPage - 1) * itemsPerPage;
  var endIndex = startIndex + itemsPerPage;

  questions.slice(startIndex, endIndex).forEach(function (question, index) {
    formContent += '<div class="row my-2">';
    formContent += '<div class="col-12">' + (startIndex + index + 1) + '. ' + question.question + '</div>';
    formContent += '<div class="'; // Start div for input

    var qanswer = JSON.parse(question.qanswer);

    if (question.type === 'radio' || question.type === 'checkbox') {
      formContent += 'col-12 ps-4">';
      Object.keys(qanswer).forEach(function (key) {
        formContent += '<div class="form-check">';
        formContent += '<input class="form-check-input" type="' + question.type + '" name="question_' + question.id + '" id="answer_' + question.id + '_' + key + '">';
        formContent += '<label class="form-check-label" for="answer_' + question.id + '_' + key + '">';
        formContent += key + '. ' + qanswer[key];
        formContent += '</label>';
        formContent += '</div>';
      });
    } else if (question.type === 'select' || question.type === 'text' || question.type === 'number' || question.type === 'date') {
      formContent += 'col-lg-3 col-md-4 col-sm-12 ps-4">';

      if (question.type === 'select') {
        formContent += '<select class="form-select" name="question_' + question.id + '">';
        Object.keys(qanswer).forEach(function (key) {
          formContent += '<option value="' + key + '">' + qanswer[key] + '</option>';
        });
        formContent += '</select>';
      } else if (question.type === 'text' || question.type === 'number') {
        formContent += '<input type="' + question.type + '" class="form-control" name="question_' + question.id + '">';
      } else if (question.type === 'date') {
        formContent += '<input type="date" class="form-control" name="question_' + question.id + '" id="answer_' + question.id + '_input">';
      }
    } else if (question.type === 'akhir_usaha') {
      formContent += 'col-12 ps-4">';
      formContent += '<div class="form-check">';
      formContent += '<input class="form-check-input" type="checkbox" name="question_' + question.id + '" id="answer_' + question.id + '_checkbox"';
      formContent += qanswer['a'] ? ' checked' : '';
      formContent += '>';
      formContent += '<label class="form-check-label" for="answer_' + question.id + '_checkbox">' + (qanswer['a'] || 'Masih Berwirausaha') + '</label>';
      formContent += '</div>';
      formContent += '<input type="date" class="form-control" name="question_' + question.id + '" id="answer_' + question.id + '_input"';
      formContent += qanswer['a'] ? '' : '';
      formContent += '>';
    }

    formContent += '</div></div>'; 
  });

  $('#dynamicForm').html(formContent);
}

function populateTracer(category, currentPage = 1) {
  $.ajax({
    url: "/api/questions/category/" + category,
    type: "GET",
    dataType: "json",
    success: function (data) {
      var totalItems = data.questions.length;
      var itemsPerPage = 12;
      var totalPages = Math.ceil(totalItems / itemsPerPage);

      if (totalPages > 1) {
        $('.pagination').show();
      } else {
        $('.pagination').hide();
      }

      if (currentPage < totalPages) {
        $('#liveAlertBtn').hide();
      } else {
        $('#liveAlertBtn').show();
      }

      buildForm(data.questions, currentPage, itemsPerPage);

      var paginationContent = '';

      paginationContent += '<li class="page-item ' + (currentPage === 1 ? 'disabled' : '') + '">';
      paginationContent += '<a class="page-link text-success" href="#" onclick="populateTracer(\'' + category + '\', ' + (currentPage - 1) + ')" aria-label="Previous">';
      paginationContent += '<span aria-hidden="true">&laquo;</span>';
      paginationContent += '</a>';
      paginationContent += '</li>';

      for (var i = 1; i <= totalPages; i++) {
        paginationContent += '<li class="page-item ' + (currentPage === i ? 'active' : '') + '"><a class="page-link text-success" href="#" onclick="populateTracer(\'' + category + '\', ' + i + ')">' + i + '</a></li>';
      }

      paginationContent += '<li class="page-item ' + (currentPage === totalPages ? 'disabled' : '') + '">';
      paginationContent += '<a class="page-link text-success" href="#" onclick="populateTracer(\'' + category + '\', ' + (currentPage + 1) + ')" aria-label="Next">';
      paginationContent += '<span aria-hidden="true">&raquo;</span>';
      paginationContent += '</a>';
      paginationContent += '</li>';

      $('.pagination').html(paginationContent);
    },
    error: function (error) {
      console.log("Error fetching data:", error);
    },
  });
}

