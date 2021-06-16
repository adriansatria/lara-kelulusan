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
						@if(session('level') == 'Admin')
						<div class="float-right">
							<!-- <a href="{{ route('users.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Data</a> -->
							<form action="{{ route('mahasiswa/import') }}" method="post" enctype="multipart/form-data">
								{{ csrf_field() }}
								<input type="file" name="import_file"> <button class="btn btn-success"><i class="fas fa-file-upload"></i>Import Excel</button> 
								<a href="{{ route('mahasiswa/export') }}" class="btn btn-success"><i class="fas fa-file-excel"></i> Export to Excel</a>
							</form>
						</div>
						@endif
					</div>
				</div>
			</div>
			<div class="card-body table-responsive">
				<table id="example1" class="table table-bordered table-striped display nowrap">
				<thead>
						<tr>
							<th rowspan="2" class="align-middle">NO</th>
							<th rowspan="2" class="align-middle">NIM</th>
							<th rowspan="2" class="align-middle">Foto</th>
							<th colspan="5" class=" text-center align-middle">Detail</th>
							<th rowspan="2" class="align-middle">Jenis kelamin</th>
							<th rowspan="2" class="align-middle">Gol. darah</th>
							<th rowspan="2" class="align-middle">Alamat</th>
							<th colspan="3" class=" text-center align-middle">Detail Wali</th>
							<th rowspan="2" class="align-middle">Keterangan</th>
							<th rowspan="2" class="align-middle">Tahun Akademik</th>
							@if(session('level') == 'Admin')
							<td width="55px" rowspan="2" class="text-center align-middle">Aksi</td>
							@endif
						</tr>
						<tr>
							<th>Nama</th>
							<th>Tempat lahir</th>
							<th>Tanggal lahir</th>
							<th>Agama</th>
							<th>Asal sekolah</th>
							<th>Nama Ortu/Wali</th>
							<th>Pendidikan terakhir</th>
							<th>Pekerjaan/Jabatan</th>
						</tr>
					</thead>
					<tbody>
					@foreach($mahasiswa as $i)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{ $i->nim }}</td>
							<td>{{ $i->pas_foto }}</td>
							<td>{{ $i->nama }}</td>
							<td>{{ $i->tempat_lahir }}</td>
							<td>{{ $i->tanggal_lahir }}</td>
							<td>{{ $i->agama }}</td>
							<td>{{ $i->asal_sekolah }}</td>
							<td>{{ $i->jenis_kelamin }}</td>
							<td>{{ $i->golongan_darah }}</td>
							<td>{{ $i->alamat }}</td>
							<td>{{ $i->nama_ortu }}</td>
							<td>{{ $i->pendidikan_terakhir }}</td>
							<td>{{ $i->pekerjaan }}</td>
							<td>{{ $i->keterangan }}</td>
							<td>{{ $i->tahun_akademik }}</td>
							@if(session('level') == 'Admin')
							<td>
								<a href="{{ route('mahasiswa.edit', $i->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
								<form action="{{ route('mahasiswa.destroy', $i->id) }}" method="POST" class="d-inline">
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