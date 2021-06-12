@extends('layouts.app')

@section('content')

<div class="row">
	<div class="col-12">

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
						<div class="float-right ml-2">
							@foreach($report_f2s_tidaklulus->take(1) as $f2)
							<form class="form-inline" action="{{ route('f2s_tidaklulus.export') }}" method="POST">
								@csrf
								<div class="form-group">
									<input type="hidden" name="year" value="{{ $f2->tahun }}" class="form-control">
								</div>
								<button class="btn btn-success" type="submit"><i class="fas fa-excel"></i> Export to Excel</button>
							</form>
							@endforeach
						</div>
					</div>
				</div>
			</div>
			<div class="card-body">
				<table id="example1" class="table table-bordered table-striped display nowrap" width="100%">
					<thead>
						<tr>
							<th>NO</th>
							<th>Nama Mahasiswa</th>
							<th>NIM</th>
							<th>Status</th>
							<th>Tahun</th>
						</tr>
					</thead>
					<tbody>
						@foreach($report_f2s_tidaklulus as $report_f2_tidaklulus)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{ $report_f2_tidaklulus->nama_mahasiswa }}</td>
							<td>{{ $report_f2_tidaklulus->nim }}</td>
							<td>{{ $report_f2_tidaklulus->status }}</td>
							<td>{{ $report_f2_tidaklulus->tahun }}</td>
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