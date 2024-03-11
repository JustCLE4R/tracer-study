AOS.init();
(function ($) {
  "use strict";

  // Spinner
  var spinner = function () {
    setTimeout(function () {
      if ($("#spinner").length > 0) {
        $("#spinner").removeClass("show");
      }
    }, 1);
  };
  spinner();

  // Back to top button
  $(window).scroll(function () {
    if ($(this).scrollTop() > 300) {
      $(".back-to-top").fadeIn("slow");
    } else {
      $(".back-to-top").fadeOut("slow");
    }
  });
  $(".back-to-top").click(function () {
    $("html, body").animate({ scrollTop: 0 }, 1500, "easeInOutExpo");
    return false;
  });

  // Sidebar Toggler
  $(".sidebar-toggler").click(function () {
    $(".sidebar, .content").toggleClass("open");
    return false;
  });

  // Progress Bar
  $(".pg-bar").waypoint(
    function () {
      $(".progress .progress-bar").each(function () {
        $(this).css("width", $(this).attr("aria-valuenow") + "%");
      });
    },
    { offset: "80%" }
  );

  // Calender
  $("#calender").datetimepicker({
    inline: true,
    format: "L",
  });

  //  carousel
  $(".testimonial-carousel").owlCarousel({
    autoplay: true,
    smartSpeed: 1000,
    items: 1,
    dots: true,
    loop: true,
    nav: false,
  });
})(jQuery);



// Chart 1
var ctx1 = document.getElementById("bar").getContext("2d");
var myChart1 = new Chart(ctx1, {
    type: "bar",
    data: {
        labels: ["Perbandingan mahasiswa yang mengisi dengan yang lulus"],
        datasets: [
            {
                label: "Fakultas Dakwah Dan Komunikasi",
                data: [60],
                backgroundColor: "rgb(1, 60, 1)",
            },
            {
                label: "Fakulktas Ekonomi Dan Bisnis Islam",
                data: [38],
                backgroundColor: "rgb(10, 83, 10)",
            },
            {
                label: "Fakultas Syariah Dan Hukum",
                data: [45],
                backgroundColor: "rgb(0, 133, 0)",
            },
            {
                label: "Fakultas Ilmu Tarbiyah Dan Keguruan",
                data: [33],
                backgroundColor: "rgb(2, 178, 2)",
            },
            {
                label: "Fakultas Ushuluddin Dan Studi Islam",
                data: [18],
                backgroundColor: "rgb(54, 214, 54)",
            },
            {
                label: "Fakultas Sains Dan Teknologi",
                data: [42],
                backgroundColor: "rgb(0, 255, 0)",
            },
            {
                label: "Fakultas Ilmu Sosial",
                data: [33],
                backgroundColor: "rgba(106, 255, 0, 0.818)",
            },
            {
                label: "Fakultas Kesehatan Masyarakat",
                data: [12],
                backgroundColor: "rgba(51, 158, 25, 0.546)",
            },
            {
                label: "Pasca Sarjana",
                data: [28],
                backgroundColor: "rgba(80, 167, 18, 0.546)",
            },
        ],
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: false,
            },
        },
    },
});

var legendItems = myChart1.legend.legendItems;

// Menampilkan keterangan warna dan label ke dalam col dengan ID "urutan3"
var legendContainer = document.getElementById("urutan3");
var legendList = document.createElement("ol");

legendItems.forEach(function (item) {
    var listItem = document.createElement("li");

    // Menambahkan atribut data-aos
    listItem.setAttribute("data-aos", "fade-up");
    listItem.setAttribute("data-aos-duration", "1200");

    // Menambahkan icon
    var icon = document.createElement("i");
    icon.className = "bi bi-circle-fill";
    icon.style.color = item.fillStyle;

    // Menambahkan margin untuk spasi antara ikon dan teks label
    icon.style.marginRight = "5px";

    listItem.appendChild(icon);

    // Menambahkan teks label
    var label = document.createElement("span");
    label.textContent = item.text;
    listItem.appendChild(label);

    // Menentukan warna font pada label
    listItem.style.color = "black";

    // Menambahkan list item ke dalam list
    legendList.appendChild(listItem);
});

// Menambahkan list ke dalam container
legendContainer.appendChild(legendList);
// End Chart 1

// Chart 2
var ctx5 = document.getElementById("pie-chart").getContext("2d");
var myChart5 = new Chart(ctx5, {
    type: "pie",
    data: {
        labels: ["Sudah Mengisi", "Belum Mengisi"],
        datasets: [
            {
                backgroundColor: ["rgb(10, 83, 10)", "rgba(14, 153, 7, 0.919)"],
                data: [141, 253],
            },
        ],
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: false,
            },
        },
    },
});

// Fungsi untuk menampilkan keterangan warna dan label ke dalam suatu container
function showLegend(chart, containerId) {
    var legendItems = chart.legend.legendItems;
    var legendContainer = document.getElementById(containerId);
    var legendList = document.createElement("ol");

    legendItems.forEach(function (item) {
        var listItem = document.createElement("li");

        // Menambahkan atribut data-aos
        listItem.setAttribute("data-aos", "fade-up");
        listItem.setAttribute("data-aos-duration", "1500");

        // Menambahkan icon
        var icon = document.createElement("i");
        icon.className = "bi bi-circle-fill";
        icon.style.color = item.fillStyle;

        // Menambahkan margin untuk spasi antara ikon dan teks label
        icon.style.marginRight = "5px";

        listItem.appendChild(icon);

        // Menambahkan teks label
        var label = document.createElement("span");
        label.textContent = item.text;
        listItem.appendChild(label);

        // Menentukan warna font pada label
        listItem.style.color = "black";

        // Menambahkan list item ke dalam list
        legendList.appendChild(listItem);
    });

    // Menambahkan list ke dalam container
    legendContainer.appendChild(legendList);
}

// Menampilkan keterangan warna dan label dari diagram pie
showLegend(myChart5, "urutan5", 2);
// End Chart 2




