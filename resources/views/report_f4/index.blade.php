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
							<form class="form-inline" action="{{ route('f4s.year') }}" method="POST">
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
							<a href="{{ route('f4s.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Data</a>
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
							<th rowspan="2" class="align-middle">Prodi</th>
							<th rowspan="2" class="align-middle">Jenjang</th>
							<th rowspan="2" class="align-middle">Semester</th>
							<th rowspan="2" class="align-middle">Kelas</th>
							<th rowspan="2" class="align-middle">Jumlah Mahasiswa</th>
							<th width="320px" colspan="3" class=" text-center align-middle">Surat Peringatan</th>
							<th rowspan="2" class="align-middle">Keterangan</th>
							<th rowspan="2" class="align-middle">Tahun</th>
							@if(session('level') == 'Admin')
							<td rowspan="2" class="text-center align-middle">Aksi</td>
							@endif
						</tr>
						<tr>
							<th class="text-center">I</th>
							<th class="text-center">II</th>
							<th class="text-center">III</th>
						</tr>
					</thead>
					<tbody>
						@foreach($f4s as $f4)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{ $f4->prodi }}</td>
							<td class="text-center">{{ $f4->jenjang }}</td>
							<td>{{ $f4->semester }}</td>
							<td>{{ $f4->kelas }}</td>
							<td>{{ $f4->jumlah_mahasiswa }}</td>
							<td>{{ $f4->sp1 }}</td>
							<td>{{ $f4->sp2 }}</td>
							<td>{{ $f4->sp3 }}</td>
							<td>{{ $f4->keterangan }}</td>
							<td>{{ $f4->tahun }}</td>
							@if(session('level') == 'Admin')
							<td>
								<a href="{{ route('f4s.edit', $f4->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
								<form action="{{ route('f4s.destroy', $f4->id) }}" method="POST" class="d-inline">
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