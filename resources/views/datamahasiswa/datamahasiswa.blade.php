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

		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-12">
						<div class="float-left">
							<form class="form-inline" action="{{ route('f1s.year') }}" method="POST">
								@csrf
								<div class="form-group">
									<label for="year">Year</label>
									<input type="text" name="year" class="form-control mx-sm-3">
								</div>
								<button class="btn btn-info" type="submit"><i class="fas fa-search"></i> Search</button>
							</form>
						</div>
						@if(session('level') == 'Admin')
						<div class="float-right">
							<a href="{{ route('f1s.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Import Data</a>
							{{-- <a href="" class="btn btn-success"><i class="fas fa-file-excel"></i> Export to Excel</a> --}}
						</div>
						@endif
					</div>
				</div>
			</div>
			<div class="card-body">
				<table id="example1" class="table table-bordered table-striped display nowrap">
					<thead>
						<tr>
							<th>NO</th>
							<th>Nama</th>
							<th>NIP</th>
							<th>Mata Kuliah</th>
							<th>Kelas</th>
							<th>JPM</th>
							<th>% Kehadiran per KLS</th>
							<th>Rata-rata % Kehadiran per SMT</th>
							<th>Tahun</th>
							@if(session('level') == 'Admin')
							<td width="55px">Aksi</td>
							@endif
						</tr>
					</thead>
					<!-- <tbody>
						@foreach($f1s as $f1)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{ $f1->nama_dosen }}</td>
							<td>{{ $f1->nip }}</td>
							<td>{{ $f1->mata_kuliah }}</td>
							<td>{{ $f1->kelas }}</td>
							<td>{{ $f1->jpm }}</td>
							<td>{{ $f1->kpk }} %</td>
							<td>{{ $f1->rata_kehadiran }} %</td>
							<td>{{ $f1->tahun }}</td>
							@if(session('level') == 'Admin')
							<td>
								<a href="{{ route('f1s.edit', $f1->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
								<form action="{{ route('f1s.destroy', $f1->id) }}" method="POST" class="d-inline">
									@method('DELETE')
									@csrf
									<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this?')"><i class="fas fa-trash"></i></button>
								</form>
							</td>
							@endif
						</tr>
						@endforeach
					</tbody> -->
				</table>
			</div>
			<!-- /.card-body -->
		</div>
	</div>
</div>

@endsection