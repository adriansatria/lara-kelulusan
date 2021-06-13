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
						<div class="input-group mb-3">
							<label class="input-group-text" for="inputGroupSelect01">Filter</label>
							<select class="form-select form-control" id="inputGroupSelect01">
								<option selected>Choose...</option>
								<option value="1">One</option>
								<option value="2">Two</option>
								<option value="3">Three</option>
							</select>
							</div>
						</div>
						@if(session('level') == 'Admin')
						<div class="float-right">
<<<<<<< HEAD
							<a href="{{ route('f1s.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Import Data</a>
							{{-- <a href="" class="btn btn-success"><i class="fas fa-file-excel"></i> Export to Excel</a> --}}
=======
							<!-- <a href="{{ route('users.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Data</a> -->
							<form action="{{ route('import') }}" method="post" enctype="multipart/form-data">
								{{ csrf_field() }}
								<input type="file" name="import_file"> <button class="btn btn-success"><i class="fas fa-file-upload"></i>Import Excel</button> 
							</form>
>>>>>>> dba15e22f3e56f210553fb464c3f3b2255bda1ba
						</div>
						@endif
					</div>
				</div>
			</div>
			<div class="card-body">
				<table id="example1" class="table table-bordered table-striped display nowrap" width="100%">
					<thead>
						<tr>
							<th width="20px">NO</th>
							<th>NIM</th>
							<th>Pas Foto</th>
							<th>Nama</th>
							<th>TTL</th>
							<th>Agama</th>
							<th>Asal Sekolah</th>
							<th>Jenkel</th>
							<th>Gol. darah</th>
							<th>Alamat</th>
							<th>Nama Ortu/wali</th>
							<th>Pendidikan terakhir</th>
							<th>Pekerjaan/jabatan</th>
							<th>Ket.</th>
							@if(session('level') == 'Admin')
							<td width="55px">Aksi</td>
							@endif
						</tr>
					</thead>
					<tbody>
					
					</tbody>
				</table>
			</div>
			<!-- /.card-body -->
		</div>
	</div>
</div>

@endsection