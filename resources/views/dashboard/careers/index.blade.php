@extends('dashboard.layouts.main')

@section('content')
{{-- include bootstrap cdn --}}

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  @foreach ($careers as $career)
    <div class="row g-0">
      <div class="col-5">
        <h3>{{ $career->position }}</h3>
        <p>
          {{ $career->company_name }}
        </p>
        <article>
          {!! $career->description !!}
        </article>
      </div>
      <div class="col-7">
        <img src="{{ asset('storage/' . $career->image) }}" alt="{{ $career->position }}" class="img-fluid" style="width: 200px">
      </div>
    </div>
    <hr>
  @endforeach
@endsection