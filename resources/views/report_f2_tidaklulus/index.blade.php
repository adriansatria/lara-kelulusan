@extends('layouts.app')

@section('content')

<div class="row">
	<div class="col-12">
		@if(session()->has('add'))
		<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{ session()->get('add')}}
		</div>
		@elseif(session()->has('update'))
		<div class="alert alert-primary alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{ session()->get('update')}}
		</div>
		@elseif(session()->has('delete'))
		<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{ session()->get('delete')}}
		</div>
		@endif

		{{-- notifikasi form validasi --}}
		@if ($errors->has('file'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('file') }}</strong>
		</span>
		@endif
 
		{{-- notifikasi sukses --}}
		@if ($sukses = Session::get('sukses'))
		<div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button> 
			<span>{{ $sukses }}</span>
		</div>
		@endif

		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-12">
						<!-- <div class="float-left">
							<form class="form-inline" action="{{ route('f2s_tidaklulus.year') }}" method="POST">
								@csrf
								<div class="form-group">
									<label for="year">Year</label>
									<input type="text" name="year" class="form-control mx-sm-3">
								</div>
								<button class="btn btn-primary" type="submit"><i class="fas fa-search"></i> Search</button>
							</form>
						</div> -->
						<div class="float-right">	
							@if($year != '')
								<a href="{{ route('f2s_tidaklulus') }}" class="btn btn-success"> Refresh</a>
								<a href="{{ route('f2s_tidaklulus.export', $year) }}" class="btn btn-success"><i class="fas fa-file-excel"></i> Export to Excel</a>
							@endif
						</div>
					</div>
				</div>
			</div>
			<div class="card-body table-reponsive">
				<table id="example1" class="table table-bordered table-striped display nowrap" width="100%">
					<thead>
						<tr>
							<th>NO</th>
							<th>Nama Mahasiswa</th>
							<th>NIM</th>
							<th>Prodi</th>
							<th>Status</th>
							<th>Tahun</th>
						</tr>
					</thead>
					<tbody>
						@foreach($f2s_tidaklulus as $f2_tidaklulus)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{ $f2_tidaklulus->nama_mahasiswa }}</td>
							<td>{{ $f2_tidaklulus->nim }}</td>
							<td>{{ $f2_tidaklulus->prodi }}</td>
							<td>{{ $f2_tidaklulus->status }}</td>
							<td>{{ $f2_tidaklulus->tahun }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<!-- /.card-body -->
		</div>
	</div>
</div>

@endsection