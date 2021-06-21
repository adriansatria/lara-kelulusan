@extends('layouts.app')

@section('content')

<div class="m-4">
    <h4 style="font-weight: bold">{{ $title }}</h4>
    <p>{{ $detail }}</p>
</div>

<form action="" method="post">
@csrf
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
                            <th>Nama Dosen</th>
                            <th>NIP</th>
                            <th>Jabatan Struktural</th>
                            <th>Pangkat/Gol.</th>
                            <th>Jabatan Fungsional</th>
                            <th>tmt.</th>
                            <th>TELP./HP</th>
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
