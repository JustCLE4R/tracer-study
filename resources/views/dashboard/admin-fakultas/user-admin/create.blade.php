@extends('dashboard.layouts.main')

@section('content')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
@endpush

<div class="col-sm-12 col-xl-12">
    <div class="bg-light rounded p-5 border-top border-success border-5">
        <div class="row">
            <form action="/dashboard/admin/fakultas/user/search" method="POST">
                @csrf
                {{-- not yet implement --}}
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
<script>

</script>
@endpush

@endsection