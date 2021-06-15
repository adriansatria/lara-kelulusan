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
							<form class="form-inline" action="{{ route('f3s.year') }}" method="POST">
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
							{{-- <a href="" class="btn btn-primary"><i class="fas fa-file-excel"></i> Import Data</a> --}}
							<form action="" method="post" enctype="multipart/form-data">
								{{ csrf_field() }}
								<input type="file" name="import_file"> <button class="btn btn-success"><i class="fas fa-file-upload"></i>Import Excel</button> 
							</form>
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
							<th colspan="8" class=" text-center align-middle">Status</th>
							<th rowspan="2" class="align-middle">Tahun</th>
							@if(session('level') == 'Admin')
							<td width="55px" rowspan="2" class="text-center align-middle">Aksi</td>
							@endif
						</tr>
						<tr>
							<th>L</th>
							<th>LP</th>
							<th>CT</th>
							<th>ML</th>
							<th>MD</th>
							<th>DO</th>
							<th>Nama Mahasiswa</th>
							<th>NIM</th>
						</tr>
					</thead>
					<tbody>
						@foreach($f3s as $f3)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{ $f3->prodi }}</td>
							<td class="text-center">{{ $f3->jenjang }}</td>
							<td>{{ $f3->semester }}</td>
							<td>{{ $f3->kelas }}</td>
							<td>{{ $f3->jumlah_mahasiswa }}</td>
							<td>{{ $f3->status_l }}</td>
							<td>{{ $f3->status_lp }}</td>
							<td>{{ $f3->status_ct }}</td>
							<td>{{ $f3->status_ml }}</td>
							<td>{{ $f3->status_md }}</td>
							<td>{{ $f3->status_do }}</td>
							<td>{{ $f3->nama_mahasiswa }}</td>
							<td>{{ $f3->nim }}</td>
							<td>{{ $f3->tahun }}</td>
							@if(session('level') == 'Admin')
							<td>
								<a href="{{ route('f3s.edit', $f3->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
								<form action="{{ route('f3s.destroy', $f3->id) }}" method="POST" class="d-inline">
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