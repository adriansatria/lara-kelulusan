@extends('layouts.app')

@section('content')

<div class="row">
	<div class="col-12">

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
								<button class="btn btn-primary" type="submit"><i class="fas fa-search"></i> Search</button>
							</form>
						</div>
						<div class="float-right ml-2">
							@foreach($report_f4->take(1) as $f4)
							<form class="form-inline" action="{{ route('f4s.export') }}" method="POST">
								@csrf
								<div class="form-group">
									<input type="hidden" name="year" value="{{ $f4->tahun }}" class="form-control">
								</div>
								<button class="btn btn-success" type="submit"><i class="fas fa-excel"></i> Export to Excel</button>
							</form>
							@endforeach
						</div>
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
							<td width="55px" rowspan="2" class="text-center align-middle">Aksi</td>
							@endif
						</tr>
						<tr>
							<th class="text-center">II</th>
							<th class="text-center">II</th>
							<th class="text-center">III</th>
						</tr>
					</thead>
					<tbody>
						@foreach($report_f4 as $f4)
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

<!-- Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="detailModalLabel">Detail</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				
			</div>
		</div>
	</div>
</div>

@endsection