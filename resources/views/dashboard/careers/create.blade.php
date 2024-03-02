@extends('dashboard.layouts.main')
<style>
  .trix-button-group.trix-button-group--file-tools {
    display:none;
  }
</style>
@section('content')
  
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Create New Career</h1>
</div>
<div class="container">
  <div class="row">
    <div class="col-lg-10 ps-4">
      <a href="/dashboard/career" class="btn btn-success btn-sm"><i class="bi bi-arrow-left"></i> Back</a>
      <div class="col-lg-10">
        <form class="mb-5" action="/dashboard/career" method="post" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="company_name" class="form-label">Company Name</label>
            <input type="text" class="form-control @error('company_name') is-invalid @enderror" id="company_name" name="company_name" value="{{ old('company_name') }}" required autofocus>
            @error('company_name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="position" class="form-label">Position</label>
            <input type="text" class="form-control @error('position') is-invalid @enderror" id="position" name="position" value="{{ old('position') }}" required>
            @error('position')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="url" class="form-label">Company Website</label>
            <input type="text" class="form-control @error('url') is-invalid @enderror" id="url" name="url" value="{{ old('url') }}">
            @error('url')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}" required readonly>
            @error('slug')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="image" class="form-label">Career Image/Brochure</label>
            <img class="img-preview img-fluid mb-3 col-sm-5">
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            @error('description')
              <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
            @enderror
            <input id="description" type="hidden" name="description" value="{{ old('description') }}">
            <trix-editor input="description"></trix-editor>
          </div>
          <button type="submit" class="btn btn-primary">Create Career!</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
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
</script>
@endsection