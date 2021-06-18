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
                        <div class="float-left">
                            <form class="form-inline" action="{{ route('f1s.year') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="year">Year</label>
                                    <input type="text" name="year" class="form-control mx-sm-3">
                                </div>
                                <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i>
                                    Search</button>
                            </form>
                        </div>
                        @if(session('level') == 'Admin')
                        <div class="float-right">
                            {{-- <a href="" class="btn btn-primary"><i class="fas fa-file-excel"></i> Import Data</a> --}}
                            <form action="{{ route('f1s.import') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @if($year == '')
                                <input type="file" name="import_file" required> <button class="btn btn-success"><i
                                        class="fas fa-file-upload"></i> Import Excel</button>
                                @elseif($year != '')
                                <a href="{{ route('f1s') }}" class="btn btn-warning"><i class="fas fa-redo-alt"></i></a>
                                <a href="{{ route('f1s.export', $year) }}" class="btn btn-success"><i
                                        class="fas fa-file-excel"></i> Export to Excel</a>
                                @endif
                            </form>
                            {{-- <a href="" class="btn btn-success"><i class="fas fa-file-excel"></i> Export to Excel</a> --}}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table id="example1" class="table table-bordered table-striped display nowrap" width="100%">
                    <thead>
                        <tr>
                            <th rowspan="2" class="align-middle">NO</th>
                            <th rowspan="2" class="align-middle">Nama</th>
                            <th rowspan="2" class="align-middle">NIP</th>
                            <th rowspan="2" class="align-middle">Mata Kuliah</th>
                            <!-- <th rowspan="2" class="align-middle">Kelas</th>
							<th rowspan="2" class="align-middle">JPM</th>
							<th rowspan="2" class="align-middle">% Kehadiran per KLS</th>
							<th rowspan="2" class="align-middle">Rata-rata % Kehadiran per SMT</th> -->
                            <!-- <th rowspan="2" class="align-middle">Tahun</th> -->
                            <th colspan="19" class="align-middle text-center">Pertemuan</th>
                            <th colspan="2" class="align-middle text-center">Prosentase</th>
                            <th colspan="5" class="align-middle text-center">Total Jam</th>
                            @if(session('level') == 'Admin')
                            <td rowspan="2" class="align-middle" width="55px">Aksi</td>
                            @endif
                        </tr>
                        <tr>
                            <th>P1</th>
                            <th>P2</th>
                            <th>P3</th>
                            <th>P4</th>
                            <th>P5</th>
                            <th>P6</th>
                            <th>P7</th>
                            <th>P8</th>
                            <th>P9</th>
                            <th>P10</th>
                            <th>P11</th>
                            <th>P12</th>
                            <th>P13</th>
                            <th>P14</th>
                            <th>P15</th>
                            <th>P16</th>
                            <th>P17</th>
                            <th>P18</th>
                            <th>P19</th>
                            <th>Hadir</th>
                            <th>Tidak hadir</th>
                            <th>H</th>
                            <th>I</th>
                            <th>K</th>
                            <th>M</th>
                            <th>S</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($f1s as $f1)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $f1->nama_dosen }}</td>
                            <td>{{ $f1->nip }}</td>
                            <td>{{ $f1->mata_kuliah }}</td>
                            <!-- <td>{{ $f1->kelas }}</td>
							<td>{{ $f1->jpm }}</td>
							<td>{{ $f1->kpk }} %</td>
							<td>{{ $f1->rata_kehadiran }} %</td> -->
                            <!-- <td>{{ $f1->tahun }}</td> -->
                            <td>{{ $f1->p1 }}</td>
                            <td>{{ $f1->p2 }}</td>
                            <td>{{ $f1->p3 }}</td>
                            <td>{{ $f1->p4 }}</td>
                            <td>{{ $f1->p5 }}</td>
                            <td>{{ $f1->p6 }}</td>
                            <td>{{ $f1->p7 }}</td>
                            <td>{{ $f1->p8 }}</td>
                            <td>{{ $f1->p9 }}</td>
                            <td>{{ $f1->p10 }}</td>
                            <td>{{ $f1->p11 }}</td>
                            <td>{{ $f1->p12 }}</td>
                            <td>{{ $f1->p13 }}</td>
                            <td>{{ $f1->p14 }}</td>
                            <td>{{ $f1->p15 }}</td>
                            <td>{{ $f1->p16 }}</td>
                            <td>{{ $f1->p17 }}</td>
                            <td>{{ $f1->p18 }}</td>
                            <td>{{ $f1->p19 }}</td>
                            <td>{{ $f1->prosentase_hadir }}</td>
                            <td>{{ $f1->prosentase_tidakhadir }}</td>
                            <td>{{ $f1->hadir }}</td>
                            <td>{{ $f1->izin }}</td>
                            <td>{{ $f1->keluar_dinas }}</td>
                            <td>{{ $f1->mangkir }}</td>
                            <td>{{ $f1->sakit }}</td>
                            @if(session('level') == 'Admin')
                            <td>
                                <a href="{{ route('f1s.edit', $f1->id) }}" class="btn btn-warning btn-sm"><i
                                        class="fas fa-edit"></i></a>
                                <form action="{{ route('f1s.destroy', $f1->id) }}" method="POST" class="d-inline">
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
