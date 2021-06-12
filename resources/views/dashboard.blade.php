@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-lg-6 col-12">
		<!-- small box -->
		<div class="small-box bg-success">
			<div class="inner">
				<h3>{{ $f2s_lulus }}</h3>

				<p>Jumlah Mahasiswa Lulus</p>
			</div>
			<div class="icon">
				<i class="fas fa-user-check"></i>
			</div>
			<a href="{{ route('f2s_lulus') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-6 col-12">
		<!-- small box -->
		<div class="small-box bg-danger">
			<div class="inner">
				<h3>{{ $f2s_tidaklulus }}</h3>

				<p>Jumlah Mahasiswa Tidak/Belum Lulus</p>
			</div>
			<div class="icon">
				<i class="fas fa-user-times"></i>
			</div>
			<a href="{{ route('f2s_tidaklulus') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<!-- ./col -->
</div>
@endsection