@extends('layouts.app')

@section('content')


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('f1s.update', $report_f1->id) }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <h2>FORM DATA REPORT F1</h2>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="nama_dosen">Nama Dosen</label>
                                <input type="text" class="form-control @error('nama_dosen') is-invalid @enderror"
                                    name="nama_dosen" value="{{ old('nama_dosen') ?? $report_f1->nama_dosen }}">
                                @error('nama_dosen')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <input type="text" class="form-control @error('nip') is-invalid @enderror" name="nip"
                                    value="{{ old('nip') ?? $report_f1->nip }}">
                                @error('nip')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group">
                                <label for="mata_kuliah">Mata Kuliah</label>
                                <input type="text" class="form-control @error('mata_kuliah') is-invalid @enderror"
                                    name="mata_kuliah" value="{{ old('mata_kuliah') ?? $report_f1->mata_kuliah }}">
                                @error('mata_kuliah')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                <label for="tahun">Tahun</label>
                                <select type="text" class="form-control @error('tahun') is-invalid @enderror" name="tahun">
                                    <option selected>PILIH</option>
                                    <option value="2017/2018" {{ old('tahun', @$report_f1->tahun) == '2017/2018' ? 'selected' : '' }}>2017/2018</option>
                                    <option value="2018/2019" {{ old('tahun', @$report_f1->tahun) == '2018/2019' ? 'selected' : '' }}>2018/2019</option>
                                    <option value="2019/2020" {{ old('tahun', @$report_f1->tahun) == '2019/2020' ? 'selected' : '' }}>2019/2020</option>
                                    <option value="2020/2021" {{ old('tahun', @$report_f1->tahun) == '2020/2021' ? 'selected' : '' }}>2020/2021</option>
                                    <option value="2021/2022" {{ old('tahun', @$report_f1->tahun) == '2021/2022' ? 'selected' : '' }}>2021/2022</option>
								</select>
                                @error('tahun')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <Label>PERTEMUAN</Label>
                    <div class="row">
                        <div class="col-sm-1">
                            <div class="form-group">
                                <label for="p1">P1</label>
                                <input type="text" class="form-control @error('p1') is-invalid @enderror" name="p1"
                                    value="{{ old('p1') ?? $report_f1->p1 }}">
                                @error('p1')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                <label for="p2">P2</label>
                                <input type="text" class="form-control @error('p2') is-invalid @enderror" name="p2"
                                    value="{{ old('p2') ?? $report_f1->p2 }}">
                                @error('p2')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                <label for="p3">P3</label>
                                <input type="text" class="form-control @error('p3') is-invalid @enderror" name="p3"
                                    value="{{ old('p3') ?? $report_f1->p3 }}">
                                @error('p3')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                <label for="p4">P4</label>
                                <input type="text" class="form-control @error('p4') is-invalid @enderror" name="p4"
                                    value="{{ old('p4') ?? $report_f1->p4 }}">
                                @error('p4')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                <label for="p5">P5</label>
                                <input type="text" class="form-control @error('p5') is-invalid @enderror" name="p5"
                                    value="{{ old('p5') ?? $report_f1->p5 }}">
                                @error('p5')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                <label for="p6">P6</label>
                                <input type="text" class="form-control @error('p6') is-invalid @enderror" name="p6"
                                    value="{{ old('p6') ?? $report_f1->p6 }}">
                                @error('p6')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                <label for="p7">P7</label>
                                <input type="text" class="form-control @error('p7') is-invalid @enderror" name="p7"
                                    value="{{ old('p7') ?? $report_f1->p7 }}">
                                @error('p7')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                <label for="p8">P8</label>
                                <input type="text" class="form-control @error('p8') is-invalid @enderror" name="p8"
                                    value="{{ old('p8') ?? $report_f1->p8 }}">
                                @error('p8')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                <label for="p9">P9</label>
                                <input type="text" class="form-control @error('p9') is-invalid @enderror" name="p9"
                                    value="{{ old('p9') ?? $report_f1->p9 }}">
                                @error('p9')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                <label for="p10">P10</label>
                                <input type="text" class="form-control @error('p10') is-invalid @enderror" name="p10"
                                    value="{{ old('p10') ?? $report_f1->p10 }}">
                                @error('p10')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                <label for="p11">P11</label>
                                <input type="text" class="form-control @error('p11') is-invalid @enderror" name="p11"
                                    value="{{ old('p11') ?? $report_f1->p11 }}">
                                @error('p11')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                <label for="p12">P12</label>
                                <input type="text" class="form-control @error('p12') is-invalid @enderror" name="p12"
                                    value="{{ old('p12') ?? $report_f1->p12 }}">
                                @error('p12')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                <label for="p13">P13</label>
                                <input type="text" class="form-control @error('p13') is-invalid @enderror" name="p13"
                                    value="{{ old('p13') ?? $report_f1->p13 }}">
                                @error('p13')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                <label for="p14">P14</label>
                                <input type="text" class="form-control @error('p14') is-invalid @enderror" name="p14"
                                    value="{{ old('p14') ?? $report_f1->p14 }}">
                                @error('p14')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                <label for="p15">P15</label>
                                <input type="text" class="form-control @error('p15') is-invalid @enderror" name="p15"
                                    value="{{ old('p15') ?? $report_f1->p15 }}">
                                @error('p15')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                <label for="p16">P16</label>
                                <input type="text" class="form-control @error('p16') is-invalid @enderror" name="p16"
                                    value="{{ old('p16') ?? $report_f1->p16 }}">
                                @error('p16')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                <label for="p17">P17</label>
                                <input type="text" class="form-control @error('p17') is-invalid @enderror" name="p17"
                                    value="{{ old('p17') ?? $report_f1->p17 }}">
                                @error('p17')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                <label for="p18">P18</label>
                                <input type="text" class="form-control @error('p18') is-invalid @enderror" name="p18"
                                    value="{{ old('p18') ?? $report_f1->p18 }}">
                                @error('p18')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                <label for="p19">P19</label>
                                <input type="text" class="form-control @error('p19') is-invalid @enderror" name="p19"
                                    value="{{ old('p19') ?? $report_f1->p19 }}">
                                @error('p19')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <strong>PROSENTASE</strong>
                    <div class="row">
                        <div class="col-2">
                            <div class="form-group">
                                <label for="prosentase_hadir">Hadir</label>
                                <input type="text" class="form-control @error('prosentase_hadir') is-invalid @enderror"
                                    name="prosentase_hadir"
                                    value="{{ old('prosentase_hadir') ?? $report_f1->prosentase_hadir }}">
                                @error('prosentase_hadir')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="prosentase_tidakhadir">Tidak Hadir</label>
                                <input type="text"
                                    class="form-control @error('prosentase_tidakhadir') is-invalid @enderror"
                                    name="prosentase_tidakhadir"
                                    value="{{ old('prosentase_tidakhadir') ?? $report_f1->prosentase_tidakhadir }}">
                                @error('prosentase_tidakhadir')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <strong>TOTAL JAM</strong>
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-group">
                                <label for="hadir">Hadir</label>
                                <input type="text" class="form-control @error('hadir') is-invalid @enderror"
                                    name="hadir" value="{{ old('hadir') ?? $report_f1->hadir }}">
                                @error('hadir')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group">
                                <label for="izin">Izin</label>
                                <input type="text" class="form-control @error('izin') is-invalid @enderror" name="izin"
                                    value="{{ old('izin') ?? $report_f1->izin }}">
                                @error('izin')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group">
                                <label for="keluar_dinas">Keluar Dinas</label>
                                <input type="text" class="form-control @error('keluar_dinas') is-invalid @enderror"
                                    name="keluar_dinas" value="{{ old('keluar_dinas') ?? $report_f1->keluar_dinas }}">
                                @error('keluar_dinas')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group">
                                <label for="mangkir">Mangkir</label>
                                <input type="text" class="form-control @error('mangkir') is-invalid @enderror"
                                    name="mangkir" value="{{ old('mangkir') ?? $report_f1->mangkir }}">
                                @error('mangkir')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group">
                                <label for="sakit">Sakit</label>
                                <input type="text" class="form-control @error('sakit') is-invalid @enderror"
                                    name="sakit" value="{{ old('sakit') ?? $report_f1->sakit }}">
                                @error('sakit')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="float-right">
                        <a href="{{ route('f1s') }}" class="btn btn-warning">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
