@extends('layouts.app')

@section('content')

<div class="row">
	<div class="col-12">

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
								<button class="btn btn-primary" type="submit"><i class="fas fa-search"></i> Search</button>
							</form>
						</div>
						<div class="float-right ml-2">
							@foreach($report_f2->take(1) as $f2)
							<form class="form-inline" action="{{ route('f2s.export') }}" method="POST">
								@csrf
								<div class="form-group">
									<input type="hidden" name="year" value="{{ $f2->tahun }}" class="form-control">
								</div>
								<button class="btn btn-success" type="submit"><i class="fas fa-excel"></i> Export to Excel</button>
							</form>
							@endforeach
						</div>
						<div class="float-right">
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detailModal">Detail</button>
						</div>
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
						@foreach($report_f2 as $f2)
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

<!-- Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="detailModalLabel">Details</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th colspan="4" class="text-center">IP & IPK</th>
						</tr>
						<tr>
							<th class="text-center">Semester</th>
							<th>TERTINGGI</th>
							<th>TERENDAH</th>
							<th>RATA-RATA</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>IP SMT 1</td>
							<td class="text-center">{{ $ip1_max }}</td>
							<td class="text-center">{{ $ip1_min }}</td>
							<td class="text-center">{{ $ip1_avg }}</td>
						</tr>
						<tr>
							<td>IP SMT 2</td>
							<td class="text-center">{{ $ip2_max }}</td>
							<td class="text-center">{{ $ip2_min }}</td>
							<td class="text-center">{{ $ip2_avg }}</td>
						</tr>
						<tr>
							<td>IP SMT 3</td>
							<td class="text-center">{{ $ip3_max }}</td>
							<td class="text-center">{{ $ip3_min }}</td>
							<td class="text-center">{{ $ip3_avg }}</td>
						</tr>
						<tr>
							<td>IP SMT 4</td>
							<td class="text-center">{{ $ip4_max }}</td>
							<td class="text-center">{{ $ip4_min }}</td>
							<td class="text-center">{{ $ip4_avg }}</td>
						</tr>
						<tr>
							<td>IP SMT 5</td>
							<td class="text-center">{{ $ip5_max }}</td>
							<td class="text-center">{{ $ip5_min }}</td>
							<td class="text-center">{{ $ip5_avg }}</td>
						</tr>
						<tr>
							<td>IP SMT 6</td>
							<td class="text-center">{{ $ip6_max }}</td>
							<td class="text-center">{{ $ip6_min }}</td>
							<td class="text-center">{{ $ip6_avg }}</td>
						</tr>
						<tr>
							<td>IP SMT 7</td>
							<td class="text-center">{{ $ip7_max }}</td>
							<td class="text-center">{{ $ip7_min }}</td>
							<td class="text-center">{{ $ip7_avg }}</td>
						</tr>
						<tr>
							<td>IP SMT 8</td>
							<td class="text-center">{{ $ip8_max }}</td>
							<td class="text-center">{{ $ip8_min }}</td>
							<td class="text-center">{{ $ip8_avg }}</td>
						</tr>
						<tr>
							<td>IPK</td>
							<td class="text-center">{{ $ipk_max }}</td>
							<td class="text-center">{{ $ipk_min }}</td>
							<td class="text-center">{{ $ipk_avg }}</td>
						</tr>
					</tbody>
				</table>

			</div>
		</div>
	</div>
</div>

@endsection