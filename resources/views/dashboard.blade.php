@extends('layouts.app')

@section('content')
<head>
	<style>
		.sm-box-footer {
			background-color: rgba($black, .1);
			color: rgba($white, .8);
			display: block;
			padding: 3px 0;
			text-align: center;
			text-decoration: none;
			z-index: 10;
		}
	</style>
<h3 class=" m-4" style="font-weight: bold">Dashboard</h3>
</head>
<div class="row p-2">
	<div class="col-lg-6 col-12	">
		<!-- small box -->
		<div class="small-box bg border border-secondary">
			<div class="inner">
				<h3>{{ $f2s_lulus }}</h3>

				<p>Jumlah Mahasiswa Lulus</p>
			</div>
			<div class="icon">
				<i class="fas fa-user-check"></i>
			</div>
			<a href="{{ route('f2s_lulus') }}" class="sm-box-footer bg bg-secondary">More info <i class="fas fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-6 col-12">
		<!-- small box -->
		<div class="small-box bg border border-secondary">
			<div class="inner">
				<h3>{{ $f2s_tidaklulus }}</h3>

				<p>Jumlah Mahasiswa Tidak/Belum Lulus</p>
			</div>
			<div class="icon">
				<i class="fas fa-user-times"></i>
			</div>
			<a href="{{ route('f2s_tidaklulus') }}" class="sm-box-footer bg bg-secondary">More info <i class="fas fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<!-- ./col -->
</div>
@endsection