@extends('layouts.app')

@section('content')


<div class="m-4">
    <h4 style="font-weight: bold">{{ $title }}</h4>
    <p>{{ $detail }}</p>
</div>

<form action="{{ route('mahasiswa.year') }}" method="post">
    @csrf
    <div class="row mt-2 m-3">
        <div class="col-md-2">
            <span>Study Program</span>
            <select class="form-select form-control" name="prodi" aria-label="Default select example" disabled>
                <option selected>SELECT</option>
                <option value="Teknik Informasi">Teknik Informasi</option>
                <option value="Teknik Informatika">Teknik Informatika</option>
            </select>
        </div>
        <div class="col-md-2">
            <span>Semester</span>
            <select class="form-select form-control" name="semester" aria-label="Default select example" disabled>
                <option selected>SELECT</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
				<option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
				<option value="12">12</option>
            </select>
        </div>
        <div class="col-md-2">
            <span>Year</span>
            <select class="form-select form-control" name="year" aria-label="Default select example">
                <option selected>SELECT</option>
                @for($tahun = date('Y') - 4; $tahun < date('Y') + 1; $tahun++)
                <option value="{{ $tahun }}">{{ $tahun }}</option>
                @endfor
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

        <div class="card border-secondary border m-4">
            <div class="card-header">
                <div class="row">
                    <div class="col-12">
                        @if(session('level') == 'Admin')
                        <div class="float-right">
                            <!-- <a href="{{ route('users.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Data</a> -->
                            <form action="{{ route('mahasiswa/import') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @if($year == '')
                                <input type="file" name="import_file" required> <button class="btn btn-success"><i
                                        class="fas fa-file-upload"></i>Import Excel</button>
                                @else
                                <a href="{{ route('mahasiswa') }}" class="btn btn-warning"><i class="fas fa-redo-alt"></i></a>
                                <a href="{{ route('mahasiswa/export', $year) }}" class="btn btn-success"><i
                                        class="fas fa-file-excel"></i> Export to Excel</a>
                                @endif
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @if($year != '')
            <div class="card-body table-responsive">
                <table id="example1" class="table table-bordered display nowrap">
                    <thead>
                        <tr style="background: rgb(235, 235, 235)!important; text-align:center">
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
                            <th width="55px" rowspan="2" class="text-center align-middle">Actions</th>
                            @endif
                        </tr>
                        <tr style="background: rgb(235, 235, 235)!important; text-align:center">
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
                                <a href="{{ route('mahasiswa.edit', $i->id) }}" class="btn btn-warning btn-sm"><i
                                        class="fas fa-edit"></i></a>
                                <form action="{{ route('mahasiswa.destroy', $i->id) }}" method="POST" class="d-inline">
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
            @endif
            <!-- /.card-body -->
        </div>
    </div>
</div>

@endsection
