@extends('layouts.app')

@section('content')

<div class="m-4">
    <h4 style="font-weight: bold">{{ $title }}</h4>
    <p>{{ $detail }}</p>
</div>

<form action="{{ route('f2s_tidaklulus.year') }}" method="post">
    @csrf
    <div class="row mt-2 ml-3">
        <div class="col-md-2">
            <span>Study Program</span>
            <select class="form-select form-control" name="prodi" aria-label="Default select example">
                <option selected>SELECT</option>
                <option value="Sistem Informasi">Sistem Informasi</option>
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
            </select>
        </div>
        <div class="col-md-2">
            <span>Year</span>
            <select class="form-select form-control" name="year" aria-label="Default select example">
                <option selected>SELECT</option>
                @for($tahun = date('Y') - 4; $tahun < date('Y') + 1; $tahun++) <option value="{{ $tahun }}">{{ $tahun }}
                    </option>
                    @endfor
            </select>
        </div>
        <div class="col-sm mt-4">
            <button type="submit" class="btn btn-outline-primary">Browse</button>
        </div>
    </div>
</form>
<div class="row mt-5">
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

        <div class="card border-secondary m-4 border">
            <div class="card-header">
                <div class="row">
                    <div class="col-12">
                        <h5 style="text-align: center; font-weight:bold">Details</h5>
                        <div class="float-right">
                            @if($year != '')
                            <a href="{{ route('f2s_tidaklulus') }}" class="btn btn-warning"><i
                                    class="fas fa-redo-alt"></i></a>
                            <a href="{{ url('f2s_tidaklulus/export/'. $year. '/'.$prodi) }}" class="btn btn-success"><i
                                    class="fas fa-file-excel"></i> Export to Excel</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body table-reponsive">
                <table id="example1" class="table table-bordered display nowrap" width="100%">
                    <thead>
                        <tr style="background: rgb(235, 235, 235); text-align: center">
                            <th style="width: 20px">NO</th>
                            <th>Nama Mahasiswa</th>
                            <th>NIM</th>
                            <th>Prodi</th>
                            <th>Status</th>
                            <th>Tahun</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($f2s_tidaklulus as $f2_tidaklulus)
                        <tr>
                            <td style="text-align: center">{{$loop->iteration}}</td>
                            <td>{{ $f2_tidaklulus->nama_mahasiswa }}</td>
                            <td>{{ $f2_tidaklulus->nim }}</td>
                            <td>{{ $f2_tidaklulus->prodi }}</td>
                            <td style="text-align: center">{{ $f2_tidaklulus->status }}</td>
                            <td>{{ $f2_tidaklulus->tahun }}</td>
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
