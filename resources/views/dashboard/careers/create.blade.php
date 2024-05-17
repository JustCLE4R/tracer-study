@extends('dashboard.layouts.main')
<style>
  .trix-button-group.trix-button-group--file-tools {
    display: none;
  }
</style>
@section('content')
<div class="container-fluid pt-4 px-4">
  <div class="row g-4">
    <div class="col-sm-12 col-xl-12">
      <div class="bg-light rounded p-5 border-top border-success border-5">
        <div class="row">
          <div class="col-12">
            <span class="h4">Tambah Career</span>
            <hr>
          </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-19 col-md-10 col-sm-12">
              <form class="mb-5" action="/dashboard/career" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="company_name" class="form-label">Nama Perusahaan</label>
                  <input type="text" class="form-control @error('company_name') is-invalid @enderror" id="company_name"
                    name="company_name" value="{{ old('company_name') }}" required autofocus>
                  @error('company_name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="category" class="form-label">Kategori</label>
                  <select class="form-control @error('category') is-invalid @enderror" name="category" id="category" >
                    <option hidden selected>Pilih Kategori</option>
                    <option value="1" {{ old('category') == 1 ? 'selected' : '' }}>Instansi Pemerintahan</option>
                    <option value="2" {{ old('category') == 2 ? 'selected' : '' }}>Lembaga Swadaya Masyarakat</option>
                    <option value="3" {{ old('category') == 3 ? 'selected' : '' }}>Perusahaan Swasta</option>
                    <option value="4" {{ old('category') == 4 ? 'selected' : '' }}>Freelancer</option>
                  </select>
                  @error('category')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="position" class="form-label">Posisi</label>
                  <input type="text" class="form-control @error('position') is-invalid @enderror" id="position"
                    name="position" value="{{ old('position') }}" required>
                  @error('position')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="url" class="form-label">Website Perusahaan</label>
                  <input type="text" class="form-control @error('url') is-invalid @enderror" id="url" name="url"
                    value="{{ old('url') }}">
                  @error('url')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="slug" class="form-label">Slug</label>
                  <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                    value="{{ old('slug') }}" required readonly>
                  @error('slug')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="image" class="form-label">Foto Brosur</label>
                  <img class="img-preview img-fluid mb-3 col-sm-5">
                  <input class="form-control @error('image') is-invalid @enderror" type="file"
                    id="image" name="image" onchange="previewImage()">
                  @error('image')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="description" class="form-label">Deskripsi</label>
                  @error('description')
                  <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
                  @enderror
                  <input id="description" type="hidden" name="description" value="{{ old('description') }}">
                  <trix-editor input="description"></trix-editor>
                </div>
                <div class="row justify-content-end">
                  <div class="col-lg-5 col-md-8 col-sm-12 text-end">
                    <a href="/dashboard/career" class="btn btn-secondary mx-1"><i class="bi bi-arrow-left-circle"></i>
                      Kembali</a>
                    <button type="submit" class="btn btn-success mx-1"><i class="bi bi-file-earmark-check"></i>
                      Simpan</button>
                  </div>
                </div>
              </form>
            </div>
        </div>
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