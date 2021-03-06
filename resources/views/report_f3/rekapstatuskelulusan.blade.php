@extends('layouts.app')

@section('content')

<div class="m-4">
    <h4 style="font-weight: bold">{{ $title }}</h4>
    <p>{{ $detail }}</p>
</div>

<form action="{{ route('rekapstatuskelulusan.year') }}" method="post">
    @csrf
    <div class="row mt-2 m-3">
        <div class="col-md-2">
            <span>Study Program</span>
            <select class="form-select form-control" name="prodi" aria-label="Default select example">
                <option selected>SELECT</option>
                <option value="TI">TI</option>
				<option value="TI CBD">TI CBD</option>
				<option value="TI MSU">TI MSU</option>
				<option value="TMD">TMD</option>
				<option value="TMD MSU">TMD MSU</option>
 				<option value="TMD Aeu">TMD Aeu</option>
				<option value="TMJ">TMJ</option>
 				<option value="CCIT">CCIT</option>
            </select>
        </div>
        <div class="col-md-2">
            <span>Semester</span>
            <select class="form-select form-control" name="semester" aria-label="Default select example">
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
                @for($tahun = date('Y') - 4; $tahun < date('Y') + 1; $tahun++) <option value="{{ $tahun }}-{{ $tahun+1 }}">{{ $tahun }}/{{ $tahun+1 }}
                    </option>
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

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12">
                        @if(session('level') == 'Admin')
                        <div class="float-right">
                            @if($year == '')
                            <a href="{{ route('rekapstatuskelulusan.create') }}" class="btn btn-secondary"><i
                                    class="fas fa-plus"></i> Add Data</a>
                            @else
                            <a href="{{ route('rekapstatuskelulusan') }}" class="btn btn-warning"><i
                                    class="fas fa-redo-alt"></i></a>
                            <a href="{{ url('/rekapstatuskelulusan/export/'. $yearAwal. '/' .$prodi. '/' .$semester ) }}"
                                class="btn btn-success"><i class="fas fa-file-excel"></i> Export to Excel</a>
                            @endif
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @if($year != '' && $prodi != '' && $semester != '')
            <div class="card-body table-responsive">
                <table id="example1" class="table table-bordered table-striped display nowrap">
                    <thead>
                        <tr>
                            <th rowspan="2" class="align-middle">NO</th>
                            <th rowspan="2" class="align-middle">Prodi</th>
                            <th rowspan="2" class="align-middle">Jenjang</th>
                            <th rowspan="2" class="align-middle">Semester</th>
                            <th rowspan="2" class="align-middle">Kelas</th>
                            <th rowspan="2" class="align-middle">Jumlah Mahasiswa</th>
                            <th colspan="6" class=" text-center align-middle">Status</th>
                            <th rowspan="2" class="align-middle">Nama</th>
                            <th rowspan="2" class="align-middle">NIM</th>
                            <th rowspan="2" class="align-middle">Tahun</th>
                            <th rowspan="2" class="align-middle">Keterangan</th>
                            @if(session('level') == 'Admin')
                            <td width="55px" rowspan="2" class="text-center align-middle">Aksi</td>
                            @endif
                        </tr>
                        <tr>
                            <th>L</th>
                            <th>LP</th>
                            <th>CT</th>
                            <th>ML</th>
                            <th>MD</th>
                            <th>DO</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($f3s as $f3)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $f3->prodi }}</td>
                            <td class="text-center">{{ $f3->jenjang }}</td>
                            <td>{{ $f3->semester }}</td>
                            <td>{{ $f3->kelas }}</td>
                            <td>{{ $f3->jumlah_mahasiswa }}</td>
                            <td>{{ $f3->status_l }}</td>
                            <td>{{ $f3->status_lp }}</td>
                            <td>{{ $f3->status_ct }}</td>
                            <td>{{ $f3->status_ml }}</td>
                            <td>{{ $f3->status_md }}</td>
                            <td>{{ $f3->status_do }}</td>
                            <td>{{ $f3->nama_mahasiswa }}</td>
                            <td>{{ $f3->nim }}</td>
                            <td>{{ $f3->tahun }}</td>
                            <td>{{ $f3->keterangan }}</td>
                            @if(session('level') == 'Admin')
                            <td>
                                <a href="{{ route('rekapstatuskelulusan.edit', $f3->id) }}"
                                    class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('rekapstatuskelulusan.destroy', $f3->id) }}" method="POST"
                                    class="d-inline">
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
