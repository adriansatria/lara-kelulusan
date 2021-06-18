@extends('layouts.app')

@section('content')

<div class="row mt-2">
	<div class="col-md-2">
	<span>Prodi</span>
		<select class="form-select form-control" name="prodi" aria-label="Default select example" disabled>
			<option selected>PILIH</option>
			<option value="Teknik Informasi">Teknik Informasi</option>
			<option value="Teknik Informatika">Teknik Informatika</option>
		</select>
	</div>
	<div class="col-md-2">
	<span>Semester</span>
		<select class="form-select form-control" name="semester" aria-label="Default select example" disabled>
			<option selected>PILIH</option>
			<option value="Ganjil">Ganjil</option>
			<option value="Genap">Genap</option>
		</select>
	</div>
	<div class="col-md-2">
	<span>Tahun</span>
		<select class="form-select form-control" name="semester" aria-label="Default select example" disabled>
			<option selected>PILIH</option>
			<option value="2012">2012</option>
			<option value="2013">2013</option>
			<option value="2014">2014</option>
			<option value="2015">2015</option>
			<option value="2016">2016</option>
			<option value="2017">2017</option>
			<option value="2018">2018</option>
			<option value="2019">2019</option>
			<option value="2020">2020</option>
			<option value="2021">2021</option>
		</select>
	</div>
	<div class="col-sm mt-4">
		<button class="btn btn-outline-primary">Browse</button>
		<button class="btn btn-outline-danger">Cancel</button>
	</div>
</div>
<div class="row mt-5">
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
						<div class="float-left">
							<form class="form-inline" action="{{ route('f2s_tidaklulus.year') }}" method="POST">
								@csrf
								<div class="form-group">
									<label for="year">Year</label>
									<input type="text" name="year" class="form-control mx-sm-3">
								</div>
								<button class="btn btn-primary" type="submit"><i class="fas fa-search"></i> Search</button>
							</form>
						</div>
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