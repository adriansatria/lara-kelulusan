@extends('layouts.app')

@section('content')

<div class="m-4">
    <h4 style="font-weight: bold">{{ $title }}</h4>
    <p>{{ $detail }}</p>
</div>

<form action="{{ route('rekapipmahasiswa.year') }}" method="post">
    @csrf
    <div class="row mt-2 m-3">
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
                        @if(session('level') == 'Admin' || session('level') == 'Petugas')
                        <div class="float-right">
                            <form action="" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @if($year == '')
                                <a href="{{ route('rekapipmahasiswa.create') }}" class="btn btn-secondary"><i
                                        class="fas fa-plus"></i> Add Data</a>
                                @else
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#detailModal">Detail</button>
                                <a href="{{ route('rekapipmahasiswa') }}" class="btn btn-warning"><i
                                        class="fas fa-redo-alt"></i></a>
                                <a href="{{ url('/rekapipmahasiswa/export/'.$year. '/'.$prodi) }}"
                                    class="btn btn-success"><i class="fas fa-file-excel"></i> Export to Excel</a>
                                @endif
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @if($year != '' && $prodi != '')
            <div class="card-body table-responsive">
                <table id="example1" class="table table-bordered table-striped display nowrap" width="100%">
                    <thead>
                        <tr>
                            <th rowspan="2" class="align-middle">NO</th>
                            <th rowspan="2" class="align-middle">Nama Mahasiswa</th>
                            <th rowspan="2" class="align-middle">Kelas</th>
                            <th rowspan="2" class="align-middle">NIM</th>
                            <th colspan="8" class="text-center">IP SMT</th>
                            <th rowspan="2" class="align-middle">IPK</th>
                            <th rowspan="2" class="align-middle">Status</th>
                            <th rowspan="2" class="align-middle">Prodi</th>
                            <th rowspan="2" class="align-middle">Tahun</th>
                            @if(session('level') == 'Admin' || session('level') == 'Petugas')
                            <td width="55px" rowspan="2" class="align-middle">Aksi</td>
                            @endif
                        </tr>
                        <tr>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                            <th>6</th>
                            <th>7</th>
                            <th>8</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($f2s as $f2)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $f2->nama_mahasiswa }}</td>
                            <td class="text-center">{{ $f2->kelas }}</td>
                            <td>{{ $f2->nim }}</td>
                            <td>{{ $f2->ip_s1 }}</td>
                            <td>{{ $f2->ip_s2 }}</td>
                            <td>{{ $f2->ip_s3 }}</td>
                            <td>{{ $f2->ip_s4 }}</td>
                            <td>{{ $f2->ip_s5 }}</td>
                            <td>{{ $f2->ip_s6 }}</td>
                            <td>{{ $f2->ip_s7 }}</td>
                            <td>{{ $f2->ip_s8 }}</td>
                            <td>{{ $f2->ipk }}</td>
                            <td>{{ $f2->status }}</td>
                            <td>{{ $f2->prodi }}</td>
                            <td>{{ $f2->tahun }}</td>
                            @if(session('level') == 'Admin' || session('level') == 'Petugas')
                            <td>
                                <a href="{{ route('rekapipmahasiswa.edit', $f2->id) }}"
                                    class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('rekapipmahasiswa.destroy', $f2->id) }}" method="POST"
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

<!-- Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th colspan="4" class="text-center">IP & IPK</th>
                        </tr>
                        <tr>
                            <th class="text-center">Semester</th>
                            <th>TERTINGGI</th>
                            <th>TERENDAH</th>
                            <th>RATA-RATA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>IP SMT 1</td>
                            <td class="text-center">{{ $ip1_max }}</td>
                            <td class="text-center">{{ $ip1_min }}</td>
                            <td class="text-center">{{ $ip1_avg }}</td>
                        </tr>
                        <tr>
                            <td>IP SMT 2</td>
                            <td class="text-center">{{ $ip2_max }}</td>
                            <td class="text-center">{{ $ip2_min }}</td>
                            <td class="text-center">{{ $ip2_avg }}</td>
                        </tr>
                        <tr>
                            <td>IP SMT 3</td>
                            <td class="text-center">{{ $ip3_max }}</td>
                            <td class="text-center">{{ $ip3_min }}</td>
                            <td class="text-center">{{ $ip3_avg }}</td>
                        </tr>
                        <tr>
                            <td>IP SMT 4</td>
                            <td class="text-center">{{ $ip4_max }}</td>
                            <td class="text-center">{{ $ip4_min }}</td>
                            <td class="text-center">{{ $ip4_avg }}</td>
                        </tr>
                        <tr>
                            <td>IP SMT 5</td>
                            <td class="text-center">{{ $ip5_max }}</td>
                            <td class="text-center">{{ $ip5_min }}</td>
                            <td class="text-center">{{ $ip5_avg }}</td>
                        </tr>
                        <tr>
                            <td>IP SMT 6</td>
                            <td class="text-center">{{ $ip6_max }}</td>
                            <td class="text-center">{{ $ip6_min }}</td>
                            <td class="text-center">{{ $ip6_avg }}</td>
                        </tr>
                        <tr>
                            <td>IP SMT 7</td>
                            <td class="text-center">{{ $ip7_max }}</td>
                            <td class="text-center">{{ $ip7_min }}</td>
                            <td class="text-center">{{ $ip7_avg }}</td>
                        </tr>
                        <tr>
                            <td>IP SMT 8</td>
                            <td class="text-center">{{ $ip8_max }}</td>
                            <td class="text-center">{{ $ip8_min }}</td>
                            <td class="text-center">{{ $ip8_avg }}</td>
                        </tr>
                        <tr>
                            <td>IPK</td>
                            <td class="text-center">{{ $ipk_max }}</td>
                            <td class="text-center">{{ $ipk_min }}</td>
                            <td class="text-center">{{ $ipk_avg }}</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

@endsection
