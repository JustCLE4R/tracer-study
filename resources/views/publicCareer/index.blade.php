{{-- Ini contoh foreach dek --}}
{{-- @foreach ($careers as $career)
    <div class="card mb-3">
      <div class="card-body">
        <h5 class="card-title">{{ $career->company_name }}</h5>
        <h6 class="card-subtitle mb-2 text-muted">{{ $career->position }}</h6>
        <p class="card-text">{{ $career->description }}</p>
        <a href="/career/{{ $career->slug }}" class="btn btn-primary">Lihat Detail</a>
      </div>
    </div>
@endforeach --}}

{{ json_encode($careers) }}
