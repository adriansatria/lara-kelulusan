@extends('layouts.app')

@section('content')

<div class="m-4">
    <h4 style="font-weight: bold">{{ $title }}</h4>
    <p>{{ $detail }}</p>
</div>

<form action="{{ route('f1s.year') }}" method="post">
@csrf
<div class="row mt-2 m-4">
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
            @if($year != '')
            <div class="card-body table-responsive">
                <table id="example1" class="table table-bordered table-striped display nowrap" width="100%">
                    <thead>
                        <tr>
                            <th rowspan="2" class="align-middle">NO</th>
                            <th rowspan="2" class="align-middle">Nama</th>
                            <th rowspan="2" class="align-middle">NIP</th>
                            <th rowspan="2" class="align-middle">Mata Kuliah</th>
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
            @endif
            <!-- /.card-body -->
        </div>
    </div>
</div>

@endsection
