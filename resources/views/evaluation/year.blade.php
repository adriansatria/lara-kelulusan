@extends('layouts.app')

@section('content')

<div class="row">
	<div class="col-12">

		<div class="card">
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
								<button class="btn btn-primary" type="submit"><i class="fas fa-search"></i> Search</button>
							</form>
						</div>
						<div class="float-right">

							@foreach($evaluations->take(1) as $evaluation)
							<form class="form-inline" action="{{ route('evaluations.export') }}" method="POST">
								@csrf
								<div class="form-group">
									<input type="hidden" name="year" value="{{ $evaluation->tahun }}" class="form-control">
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
							<td width="55px">Aksi</td>
							@endif
						</tr>
					</thead>
					<tbody>
						@foreach($evaluations as $evaluation)
						<tr>
							<td>{{$loop->iteration}}</td>
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