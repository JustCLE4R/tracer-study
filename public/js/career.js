const companyName = $('#company_name');
  const position = $('#position');
  const slug = $('#slug')
  const onValueChange = () => {
    $.ajax({
      url: '/dashboard/career/checkSlug',
      data: {
        company_name: companyName.val()+' '+position.val()
      }
    }).done((data) => {
      slug.val(data.slug);
    })
  }

  companyName.on('change', onValueChange);
  position.on('change', onValueChange);

  $(document).on('trix-file-accept', (e) => {
    e.preventDefault();
  })

  function previewImage() {
    const imgPreview = $('.img-preview');
    // imgPreview.show();
    imgPreview.css('display', 'block');

    const blob = URL.createObjectURL($('#image')[0].files[0]);
    imgPreview.attr('src', blob);

  }