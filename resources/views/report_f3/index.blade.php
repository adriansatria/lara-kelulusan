@extends('layouts.app')

@section('content')

<div class="m-4">
    <h4 style="font-weight: bold">{{ $title }}</h4>
    <p>{{ $detail }}</p>
</div>

<form action="{{ route('f3s.year') }}" method="post">
@csrf
<div class="row mt-2 m-3">
	<div class="col-md-2">
	<span>Prodi</span>
		<select class="form-select form-control" name="prodi" aria-label="Default select example" disabled>
			<option selected>PILIH</option>
			<option value="Sistem Informasi">Sistem Informasi</option>
			<option value="Teknik Informatika">Teknik Informatika</option>
		</select>
	</div>
	<div class="col-md-2">
	<span>Semester</span>
		<select class="form-select form-control" name="semester" aria-label="Default select example" disabled>
			<option selected>PILIH</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
		</select>
	</div>
	<div class="col-md-2">
	<span>Tahun</span>
		<select class="form-select form-control" name="year" aria-label="Default select example" disabled>
			<option selected>PILIH</option>
			<option value="2012">2012</option>
			<option value="2013">2013</option>
			<option value="2014">2014</option>
			<option value="2015">2015</option>
			<option value="2016">2016</option>
			<option value="2017">2017</option>
			<option value="2018">2018</option>
			<option value="2019">2019</option>
			<option value="2020">2020</option>
			<option value="2021">2021</option>
		</select>
	</div>
	<div class="col-sm mt-4">
		<button type="submit" class="btn btn-outline-primary" disabled>Browse</button>
	</div>
</div>
</form>

<div class="row mt-4">
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
        
        {{-- notifikasi validasi Import --}}
        @if ($error = Session::get('error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <h5>Title Format Not Supported.</h5>
            <span>{{ $error }}</span>
        </div>
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
							{{-- <a href="" class="btn btn-primary"><i class="fas fa-file-excel"></i> Import Data</a> --}}
							<form action="{{ route('f3s.import') }}" method="post" enctype="multipart/form-data">
								{{ csrf_field() }}
								<input type="file" name="import_file" required> <button class="btn btn-success"><i class="fas fa-file-upload"></i> Import Excel</button> 
								<!-- <a href="{{ route('f3s') }}" class="btn btn-warning"><i class="fas fa-redo-alt"></i></a> -->
                                <a href="{{ route('f3s.export') }}" class="btn btn-success"><i
                                        class="fas fa-file-excel"></i> Export to Excel</a>
							</form>
						</div>
						@endif
					</div>
				</div>
			</div>
			<div class="card-body table-responsive">
				<table id="example1" class="table table-bordered table-striped display nowrap" width="100%">
					<thead>
						<tr>
							<th>NO.</th>
							<th>NIM</th>
							<th>Nama Mahasiswa</th>
							<th>Izin</th>
							<th>Tidak Izin</th>
							<th>Jumlah</th>
							<th>Kelakuan</th>
							<th>Status Lulus SMT Sebelumnya</th>
							<th>Status Lulus SMT Sekarang</th>
							<th>AM x SKS</th>
							<th>IP</th>
							<th>Kapita Selekta 2</th>
							<th>3</th>
							<th>Metodologi Penelitian 2</th>
							<th>2</th>
							<th>Bahasa Inggris Komunikasi 3</th>
							<th>2</th>
							<th>Tugas Akhir</th>
							<th>6</th>
							@if(session('level') == 'Admin')
							<td width="55px" rowspan="2" class="text-center align-middle">Aksi</td>
							@endif
						</tr>
					</thead>
					<tbody>
						@foreach($f3s as $f3)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{ $f3->nim }}</td>
							<td>{{ $f3->nama_mahasiswa }}</td>
							<td>{{ $f3->izin }}</td>
							<td>{{ $f3->tidak_izin }}</td>
							<td>{{ $f3->jumlah }}</td>
							<td>{{ $f3->kelakuan }}</td>
							<td>{{ $f3->status_lulus_lalu }}</td>
							<td>{{ $f3->status_lulus_baru }}</td>
							<td>{{ $f3->amxsks }}</td>
							<td>{{ $f3->ip }}</td>
							<td>{{ $f3->kapita_selekta2 }}</td>
							<td>{{ $f3->k3 }}</td>
							<td>{{ $f3->metodologi_penelitian2 }}</td>
							<td>{{ $f3->k2 }}</td>
							<td>{{ $f3->bahasa_inggris_komunikasi3 }}</td>
							<td>{{ $f3->k2_2 }}</td>
							<td>{{ $f3->tugas_akhir }}</td>
							<td>{{ $f3->k6 }}</td>
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