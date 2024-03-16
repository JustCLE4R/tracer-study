@extends('dashboard.layouts.main')

@section('content')
<div id="row" class="row justify-content-center p-3">
	@if (session()->has('success'))
	<div class="alert alert-success alert-dismissible fade show col-lg-10 mb-0" role="alert">
		<strong>Success!</strong> {{ session('success') }}
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
	@endif
	<div class="col-lg-5 col-md-7 col-sm-8 col-xs-8 p-2 m-3 position-relative">
		<div class="accordion " id="accordionExample">
			<div class="accordion-item">
				<h2 class="accordion-header" id="headingOne">
					<button class="accordion-button border-top border-success border-5 bg-light shadow rounded" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="background-color: #fff;">
						<span class="h4 text-success p-2" style="font-weight: bold">Riwayat Pekerjaan </span>
					</button>
				</h2>
				<div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
					<div class="accordion-body">
						<div class="timeline mx-3 pb-5">
							<figcaption class="blockquote-footer text-success ms-2">Setelah Lulus </figcaption>
							<!--first-->
							@for ($i = 0; $i < 3; $i++)
							<div class="timeline__event animated fadeInUp delay-3s timeline__event--type1">
								<div class="timeline__event__icon">
									<i class="bi bi-person-workspace"></i>
								</div>
								<div class="timeline__event__date">
									TEKNISI JARINGAN MAJU CERAH
								</div>
								<div class="timeline__event__content">
									<div class="timeline__event__title">
										Bekerja
									</div>
									<div class="timeline__event__description">
										<p>1 Agustus 2021 - Sekarang </p>
									</div>
	
									<div class="col mt-2 float-end">
										<a href="" class="btn btn-link btn-sm text-success m-0 p-0"><i class="bi bi-pencil-square"></i></a>
										<a href="" class="btn btn-link btn-sm text-success m-0 p-0"><i class="bi bi-trash3"></i></a>
									</div>
	
								</div>
							</div>
							@endfor
						</div>
	
						<div class="col d-flex justify-content-end">
							<a href="/dashboard/pekerja/create" class="btn btn-success"><i class="bi bi-plus-lg"></i> Tambah Pekerjaan</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-lg-5 col-md-7 col-sm-8 col-xs-8 p-2 m-3 position-relative">
		<div class="accordion" id="accordionEducation">
			<div class="accordion-item">
				<h2 class="accordion-header" id="headingEducation">
					<button class="accordion-button border-top border-success border-5 bg-light shadow rounded" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEducation" aria-expanded="true" aria-controls="collapseEducation" style="background-color: #fff;">
						<span class="h4 text-success p-2" style="font-weight: bold">Riwayat Pendidikan</span>
					</button>
				</h2>
				<div id="collapseEducation" class="accordion-collapse collapse show" aria-labelledby="headingEducation" data-bs-parent="#accordionEducation">
					<div class="accordion-body">
						<div class="timeline pb-5">
							<figcaption class="blockquote-footer text-success ms-2">Setelah Lulus </figcaption>
							<!--first-->
							@foreach ($pendidikans as $pendidikan)
								<div class="timeline__event animated fadeInUp delay-3s timeline__event--type1">
									<div class="timeline__event__icon">
										<i class="bi bi-mortarboard-fill"></i>
									</div>
									<div class="timeline__event__date">
										{{ $pendidikan->program_studi }} ({{ $pendidikan->perguruan_tinggi }})
									</div>
									<div class="timeline__event__content">
										<div class="timeline__event__title">
											@if ($pendidikan->tingkat_pendidikan == 'a')
												Strata 1 (S1)
											@elseif ($pendidikan->tingkat_pendidikan == 'b')
												Strata 2 (S2)
											@else
												Strata 3 (S3)
											@endif
										</div>
										<div class="timeline__event__description">
											<p>{{ \Carbon\Carbon::parse($pendidikan->tgl_mulai_pendidikan)->translatedFormat('d F Y', 'id_ID') }}</p>
										</div>
		
										<div class="col mt-2 float-end">
											<a href="/dashboard/pendidikan/{{ $pendidikan->id }}" class="btn btn-link btn-sm text-success m-0 p-0"><i class="bi bi-eye"></i></a>
											<a href="/dashboard/pendidikan/{{ $pendidikan->id }}/edit" class="btn btn-link btn-sm text-success m-0 p-0"><i class="bi bi-pencil-square"></i></a>
											<form action="/dashboard/pendidikan/{{ $pendidikan->id }}" method="post" class="d-inline m-0 p-0">
												@csrf
												@method('DELETE')
												<button class="btn btn-link btn-sm text-success m-0 p-0" onclick="return confirm('Are you sure?')"><i class="bi bi-trash3"></i></button>
											</form>
										</div>
									</div>
								</div>
							@endforeach
						</div>
	
						<div class="col d-flex justify-content-end">
							<a href="/dashboard/pendidikan/create" class="btn btn-success"><i class="bi bi-plus-lg"></i> Tambah Pendidikan</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	
	
</div>



@endsection