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
							<form class="form-inline" action="{{ route('f2s.year') }}" method="POST">
								@csrf
								<div class="form-group">
									<label for="year">Year</label>
									<input type="text" name="year" class="form-control mx-sm-3">
								</div>
								<button class="btn btn-info" type="submit"><i class="fas fa-search"></i> Search</button>
							</form>
						</div>
						@if(session('level') == 'Admin' || session('level') == 'Petugas')
						<div class="float-right">
							<a href="{{ route('f2s.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Data</a>
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
							<th rowspan="2" class="align-middle">NO</th>
							<th rowspan="2" class="align-middle">Nama Mahasiswa</th>
							<th rowspan="2" class="align-middle">Kelas</th>
							<th rowspan="2" class="align-middle">NIM</th>
							<th colspan="8" class="text-center">IP SMT</th>
							<th rowspan="2" class="align-middle">IPK</th>
							<th rowspan="2" class="align-middle">Status</th>
							<th rowspan="2" class="align-middle">Tahun</th>
							@if(session('level') == 'Admin' || session('level') == 'Petugas')
							<td width="55px" rowspan="2" class="align-middle">Aksi</td>
							@endif
						</tr>
						<tr>
							<th>1</th>
							<th>2</th>
							<th>3</th>
							<th>4</th>
							<th>5</th>
							<th>6</th>
							<th>7</th>
							<th>8</th>
						</tr>
					</thead>
					<tbody>
						@foreach($f2s as $f2)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{ $f2->nama_mahasiswa }}</td>
							<td class="text-center">{{ $f2->kelas }}</td>
							<td>{{ $f2->nim }}</td>
							<td>{{ $f2->ip_s1 }}</td>
							<td>{{ $f2->ip_s2 }}</td>
							<td>{{ $f2->ip_s3 }}</td>
							<td>{{ $f2->ip_s4 }}</td>
							<td>{{ $f2->ip_s5 }}</td>
							<td>{{ $f2->ip_s6 }}</td>
							<td>{{ $f2->ip_s7 }}</td>
							<td>{{ $f2->ip_s8 }}</td>
							<td>{{ $f2->ipk }}</td>
							<td>{{ $f2->status }}</td>
							<td>{{ $f2->tahun }}</td>
							@if(session('level') == 'Admin' || session('level') == 'Petugas')
							<td>
								<a href="{{ route('f2s.edit', $f2->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
								<form action="{{ route('f2s.destroy', $f2->id) }}" method="POST" class="d-inline">
									@method('DELETE')
									@csrf
									<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this?')"><i class="fas fa-trash"></i></button>
								</form>
							</td>
							@endif
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