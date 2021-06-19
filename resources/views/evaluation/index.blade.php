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

		<div class="m-4">
			<h2 style="font-weight:bold">Evaluasi</h2>
		</div>

		<div class="card border border-secondary m-4">
			<div class="card-header">
				<div class="row">
					<div class="col-12">
						<div class="float-left">
							<form class="form-inline" action="{{ route('evaluations.year') }}" method="POST">
								@csrf
								<div class="form-group">
									<label for="year">Year</label>
									<input type="text" name="year" class="form-control mx-sm-3">
								</div>
								<button class="btn btn-info" type="submit"><i class="fas fa-search"></i> Search</button>
							</form>
						</div>
						@if(session('level') == 'Admin' || session('level') == 'Petugas' || session('level') == 'Dosen')
						<div class="float-right">
							<a href="{{ route('evaluations.create') }}" class="btn btn border border-secondary" style="background: rgb(235, 235, 235); "><i class="fas fa-plus"></i> Add Evaluations </a>
							{{-- <a href="" class="btn btn-success"><i class="fas fa-file-excel"></i> Export to Excel</a> --}}
						</div>
						@endif
					</div>
				</div>
			</div>
			<div class="card-body">
				<table id="example1" class="table table-bordered display nowrap">
					<thead>
						<tr style="background: rgb(235, 235, 235); text-align: center">
							<th>NO</th>
							<th>Nama Dosen</th>
							<th>Mata Kuliah</th>
							<th>Kelas</th>
							<th>Nama Mahasiswa</th>
							<th>NIM</th>
							<th>Nilai Akhir</th>
							<th>Kemungkinan Perbaikan</th>
							<th>Keterangan</th>
							<th>Tahun</th>
							@if(session('level') != 'Kajur' || session('level') != 'Kaprodi')
							<th width="55px">Actions</th>
							@endif
						</tr>
					</thead>
					<tbody>
						@foreach($evaluations as $evaluation)
						<tr>
							<td style="text-align: center">{{$loop->iteration}}</td>
							<td>{{ $evaluation->nama_dosen }}</td>
							<td>{{ $evaluation->mata_kuliah }}</td>
							<td>{{ $evaluation->kelas }}</td>
							<td>{{ $evaluation->nama_mahasiswa }}</td>
							<td>{{ $evaluation->nim }}</td>
							<td>{{ $evaluation->nilai_akhir }}</td>
							<td>{{ $evaluation->kemungkinan_perbaikan }}</td>
							<td>{{ $evaluation->keterangan }}</td>
							<td>{{ $evaluation->tahun }}</td>
							@if(session('level') != 'Kajur' || session('level') != 'Kaprodi')
							<td>
								<a href="{{ route('evaluations.edit', $evaluation->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
								<form action="{{ route('evaluations.destroy', $evaluation->id) }}" method="POST" class="d-inline">
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