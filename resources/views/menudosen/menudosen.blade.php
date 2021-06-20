@extends('layouts.app')

@section('content')

<div class="m-4">
    <h4 style="font-weight: bold">{{ $title }}</h4>
    <p>{{ $detail }}</p>
</div>

<form action="" method="post">
@csrf
<div class="row mt-2">
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

        <div class="card mt-4 m-4 border border-secondary">
            <div class="card-header">
                <div class="row">
                    <div class="col-12">
                        @if(session('level') == 'Admin')
                        <div class="float-right">
                            <!-- <a href="{{ route('users.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Data</a> -->
                            <form action="{{ route('dosen/import') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="file" name="import_file" required> <button class="btn btn-success"><i
                                        class="fas fa-file-upload"></i> Import Excel</button>
                                <a href="{{ route('dosen/export') }}" class="btn btn-success"><i
                                        class="fas fa-file-excel"></i> Export to Excel</a>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table id="example1" class="table table-bordered display nowrap" width="100%" >
                    <thead>
                        <tr style="background: rgb(235, 235, 235)!important; text-align:center">
                            <th width="20px">NO</th>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Jabatan Struktural</th>
                            <th>Pangkat/Golongan</th>
                            <th>Jabatan Fungsional</th>
                            <th>tmt.</th>
                            <th>No. telp</th>
                            <th>NIDN/NIDK</th>
                            <th>Homebase Prodi</th>
                            <th>Serdos</th>
                            <th>Ket.</th>
                            @if(session('level') == 'Admin')
                            <th width="55px">Actions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dosen as $i)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $i->nama_dosen }}</td>
                            <td>{{ $i->nip }}</td>
                            <td>{{ $i->jabatan_struktural }}</td>
                            <td>{{ $i->pangkat_golongan }}</td>
                            <td>{{ $i->jabatan_fungsional }}</td>
                            <td>{{ $i->tmt }}</td>
                            <td>{{ $i->notelp }}</td>
                            <td>{{ $i->nidn_nidk }}</td>
                            <td>{{ $i->homebase_prodi }}</td>
                            <td>{{ $i->serdos }}</td>
                            <td>{{ $i->keterangan }}</td>
                            @if(session('level') == 'Admin')
                            <td>
                                <a href="{{ route('dosen.edit', $i->id) }}" class="btn btn-warning btn-sm"><i
                                        class="fas fa-edit"></i></a>
                                <form action="{{ route('dosen.destroy', $i->id) }}" method="POST" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure to delete this?')"><i
                                            class="fas fa-trash"></i></button>
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
