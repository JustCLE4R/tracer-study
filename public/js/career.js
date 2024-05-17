const companyName = $("#company_name");
const position = $("#position");
const slug = $("#slug");
const onValueChange = () => {
    $.ajax({
        url: "/dashboard/career/checkSlug",
        data: {
            company_name: companyName.val() + " " + position.val(),
        },
    }).done((data) => {
        slug.val(data.slug);
    });
};

companyName.on("change", onValueChange);
position.on("change", onValueChange);

$(document).on("trix-file-accept", (e) => {
    e.preventDefault();
});

function previewImage() {
    const imgPreview = $(".img-preview");
    // imgPreview.show();
    imgPreview.css("display", "block");

    const blob = URL.createObjectURL($("#image")[0].files[0]);
    imgPreview.attr("src", blob);
}

document.addEventListener('DOMContentLoaded', function() {
    let previousLink = document.querySelector('a.page-link[rel="prev"]');
    if (previousLink) {
        previousLink.textContent = 'Sebelumnya';
    }

    let previousSpan = document.querySelector('li.page-item.disabled span.page-link');
    if (previousSpan) {
        previousSpan.textContent = 'Sebelumnya';
    }

    let nextLink = document.querySelector('a.page-link[rel="next"]');
    if (nextLink) {
        nextLink.textContent = 'Selanjutnya';
    }

    let nextSpan = document.querySelector('li.page-item.disabled span.page-link');
    if (nextSpan) {
        nextSpan.textContent = 'Selanjutnya';
    }
});
