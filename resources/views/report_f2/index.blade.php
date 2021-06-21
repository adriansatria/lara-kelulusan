@extends('layouts.app')

@section('content')

<div class="m-4">
    <h4 style="font-weight: bold">{{ $title }}</h4>
    <p>{{ $detail }}</p>
</div>

<!-- <form action="{{ route('f1s.year') }}" method="post">
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
                <option value="Ganjil">Ganjil</option>
                <option value="Genap">Genap</option>
            </select>
        </div>
        <div class="col-md-2">
            <span>Year</span>
            <select class="form-select form-control" name="year" aria-label="Default select example" disabled>
                <option selected>SELECT</option>
                @for($tahun = date('Y') - 4; $tahun < date('Y') + 1; $tahun++) <option value="{{ $tahun }}">{{ $tahun }}
                    </option>
                    @endfor
            </select>
        </div>
        <div class="col-sm mt-4">
            <button type="submit" class="btn btn-outline-primary" disabled>Browse</button>
        </div>
    </div>
</form> -->

<div class="row mt-3">
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
                        @if(session('level') == 'Admin' || session('level') == 'Petugas')
                        <div class="float-right">
                            {{-- <a href="" class="btn btn-primary"><i class="fas fa-file-excel"></i> Import Data</a> --}}
                            <form action="{{ route('f2s.import') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="file" name="import_file" required=""> <button class="btn btn-success"><i
                                        class="fas fa-file-upload"></i>Import Excel</button>
                                <a href="{{ route('f2s.export') }}" class="btn btn-success"><i
                                        class="fas fa-file-excel"></i> Export to Excel</a>
                            </form>
                            {{-- <a href="" class="btn btn-success"><i class="fas fa-file-excel"></i> Export to Excel</a> --}}
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive">
                <table id="example1" class="table table-bordered table-striped display nowrap">
                    <thead>
                        <tr>
                            <th class="align-middle">NO.</th>
                            <th class="align-middle">NIM</th>
                            <th class="align-middle">Nama Mahasiswa</th>
                            <th class="align-middle">Izin</th>
                            <th class="align-middle">Tidak Izin</th>
                            <th class="align-middle">Jumlah</th>
                            <th class="align-middle">Kelakuan</th>
                            <th class="align-middle">Status Lulus smt Sebelumnya</th>
                            <th class="align-middle">Status Lulus smt Sekarang</th>
                            <th class="align-middle">AM x SKS</th>
                            <th class="align-middle">IP</th>
                            <th class="align-middle">Kapita Selekta 2</th>
                            <th class="align-middle">3</th>
                            <th class="align-middle">Metodologi Penelitian 2</th>
                            <th class="align-middle">2</th>
                            <th class="align-middle">Bahasa Inggris Komunikasi 3</th>
                            <th class="align-middle">2</th>
                            <th class="align-middle">Tugas Akhir</th>
                            <th class="align-middle">6</th>
                            @if(session('level') == 'Admin' || session('level') == 'Petugas')
                            <td width="55px" rowspan="2" class="align-middle">Aksi</td>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($f2s as $f2)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $f2->nim }}</td>
                            <td>{{ $f2->nama_mahasiswa }}</td>
                            <td>{{ $f2->izin }}</td>
                            <td>{{ $f2->tidak_izin }}</td>
                            <td>{{ $f2->jumlah }}</td>
                            <td>{{ $f2->kelakuan }}</td>
                            <td>{{ $f2->status_lulus_lalu }}</td>
                            <td>{{ $f2->status_lulus_baru }}</td>
                            <td>{{ $f2->amxsks }}</td>
                            <td>{{ $f2->ip }}</td>
                            <td>{{ $f2->kapita_selekta2 }}</td>
                            <td>{{ $f2->k3 }}</td>
                            <td>{{ $f2->metodologi_penelitian2 }}</td>
                            <td>{{ $f2->k2 }}</td>
                            <td>{{ $f2->bahasa_inggris_komunikasi3 }}</td>
                            <td>{{ $f2->k2_2 }}</td>
                            <td>{{ $f2->tugas_akhir }}</td>
                            <td>{{ $f2->k6 }}</td>
                            @if(session('level') == 'Admin' || session('level') == 'Petugas')
                            <td>
                                <a href="{{ route('f2s.edit', $f2->id) }}" class="btn btn-warning btn-sm"><i
                                        class="fas fa-edit"></i></a>
                                <form action="{{ route('f2s.destroy', $f2->id) }}" method="POST" class="d-inline">
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
