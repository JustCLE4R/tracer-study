@extends('dashboard.layouts.main')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded p-5 border-top border-success border-5" style="min-height: 80vh;">
                <div class="row">
                    <div class="col-12">
                        <h4 class="d-inline-block">Import User</h4> <h6 class="d-inline-block text-muted">{{ $title }}</h6>
                        <hr>
                    </div>
                </div>
                @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show col-lg-10 mb-0" role="alert">
                    <strong>Success!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            

                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="file" class="form-label">Upload Excel</label>
                        <input class="form-control @error('file') is-invalid @enderror" type="file" name="file" id="file" accept=".xlsx,.xls">
                        @error('file')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>

                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection