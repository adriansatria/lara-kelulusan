@extends('layouts.app')

@section('content')

<div class="m-4">
    <h4 style="font-weight: bold">{{ $title }}</h4>
    <p>{{ $detail }}</p>
</div>

<form action="{{ route('evaluations.year') }}" method="post">
    @csrf
    <div class="row mt-2 m-3">
        <div class="col-md-2">
            <span>Prodi</span>
            <select class="form-select form-control" name="prodi" aria-label="Default select example" disabled>
                <option selected>PILIH</option>
                <option value="Teknik Informasi">Teknik Informasi</option>
                <option value="Teknik Informatika">Teknik Informatika</option>
            </select>
        </div>
        <div class="col-md-2">
            <span>Semester</span>
            <select class="form-select form-control" name="semester" aria-label="Default select example" disabled>
                <option selected>PILIH</option>
                <option value="Ganjil">Ganjil</option>
                <option value="Genap">Genap</option>
            </select>
        </div>
        <div class="col-md-2">
            <span>Tahun</span>
            <select class="form-select form-control" name="year" aria-label="Default select example">
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
            <button type="submit" class="btn btn-outline-primary">Browse</button>
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

		<div class="card border border-secondary m-4">
			<div class="card-header">
				<div class="row">
					<div class="col-12">
						@if(session('level') == 'Admin' || session('level') == 'Petugas' || session('level') == 'Dosen')
						<div class="float-right">
							@if($year == '')
							<a href="{{ route('evaluations.create') }}" class="btn btn border border-secondary" style="background: rgb(235, 235, 235); "><i class="fas fa-plus"></i> Add Evaluations </a>
							@else
							<a href="{{ route('evaluations') }}" class="btn btn-warning"><i class="fas fa-redo-alt"></i></a>
                            <a href="{{ route('evaluations.export', $year) }}" class="btn btn-success">
							<i class="fas fa-file-excel"></i> Export to Excel</a>
							@endif
						</div>
						@endif
					</div>
				</div>
			</div>
			@if($year != '')
			<div class="card-body table-responsive">
				<table id="example1" class="table table-bordered display nowrap" width="100%">
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
						@if(session('username') == $evaluation->nama_dosen)
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
						@endif
						@endforeach
					</tbody>
				</table>
			</div>
			@endif
			<!-- /.card-body -->
		</div>
	</div>
</div>

@endsection