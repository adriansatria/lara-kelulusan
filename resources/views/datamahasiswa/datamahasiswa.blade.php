@extends('layouts.app')

@section('content')

<form action="{{ route('mahasiswa.year') }}" method="post">
    @csrf
    <div class="row mt-2">
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
            <a class="btn btn-outline-danger">Cancel</a>
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
                                @if($year == '')
                                <input type="file" name="import_file" required> <button class="btn btn-success"><i
                                        class="fas fa-file-upload"></i>Import Excel</button>
                                @else
                                <a href="{{ route('mahasiswa') }}" class="btn btn-warning"><i class="fas fa-redo-alt"></i></a>
                                <a href="{{ route('mahasiswa/export') }}" class="btn btn-success"><i
                                        class="fas fa-file-excel"></i> Export to Excel</a>
                                @endif
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
            <!-- /.card-body -->
        </div>
    </div>
</div>

@endsection
