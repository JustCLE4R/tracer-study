@extends('dashboard.layouts.main')

@section('content')
  {{ $user }}
  <hr>
  <br>
  <br>
  {{ $user->career }}
  <hr>
  <br>
  <br>
  {{ $user->wirausaha }}
  <hr>
  <br>
  <br>
  {{ $user->pekerja }}
  <hr>
  <hr style="border-width: 10px;">
  <hr>
  @foreach ($user->pekerja as $pekerja)
    {{ $pekerja->detailPerusahaan }}
  @endforeach
  <hr>
  <br>
  <br>
  {{ $user->pendidikan }}
@endsection