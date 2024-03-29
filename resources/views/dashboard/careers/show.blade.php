@extends('dashboard.layouts.main')

@section('content')
<div class="container-fluid pt-4 px-4">
  <div class="row g-4">
      <div class="col-sm-12 col-xl-12">
          <div class="bg-light rounded p-5 border-top border-success border-5">
            <div class="row">
              <div class="col-lg-8 ps-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                  <h1 class="h2">{{ $career->company_name ." | ". $career->position }}</h1>
                </div>
                <a href="/dashboard/career" class="btn btn-success btn-sm"><i class="bi bi-arrow-left"></i> Kembali</a>
                <a href="/dashboard/career/{{ $career->slug }}/edit" class="btn btn-secondary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                <form class="d-inline" action="/dashboard/career/{{ $career->slug }}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="bi bi-trash3"></i> Hapus</button>
                </form>
                @if ($career->image)
                  <img src="{{ asset('storage/'.$career->image) }}" class="img-fluid mt-3 d-block" alt="{{ $career->position }}" style="max-height: 400px">
                @else
                  <img src="https://source.unsplash.com/1200x400?{{ $career->position }}" class="img-fluid mt-3" alt="{{ $career->position }}">
                @endif
                <article class="my-3 fs-5">
                  {!! $career->description !!}
                </article>
              </div>
            </div>
          </div>
      </div>
  </div>
</div>
  


  
@endsection