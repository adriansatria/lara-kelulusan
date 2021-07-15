@extends('layouts.app')

@section('content')


<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<form action="{{ route('f4s.update', $report_f4->id) }}" method="POST">
					@method('PATCH')
					@csrf
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="prodi">Prodi</label>
								<select name="prodi" class="form-control @error('prodi') is-invalid @enderror">
										<option value="">Pilih</option>
										<option value="Sistem Informasi" {{ old('prodi', @$report_f4->prodi) == 'Sistem Informasi' ? 'selected' : '' }}>Sistem Informasi</option>
										<option value="Teknik Informatika" {{ old('prodi', @$report_f4->prodi) == 'Teknik Informatika' ? 'selected' : '' }}>Teknik Informatika</option>
								</select>
								@error('prodi')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="jenjang">Jenjang</label>
								<select class="form-control @error('jenjang') is-invalid @enderror" name="jenjang">
									<option value="">Pilih</option>
									<option value="D4" {{ old('jenjang', @$report_f4->jenjang) == 'D4' ? 'selected' : '' }}>D4</option>
								</select>
								@error('jenjang')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="semester">Semester</label>
								<select type="text" class="form-control @error('semester') is-invalid @enderror" name="semester">
									<option value="">Pilih</option>
									<option value="1" {{ old('semester', @$report_f4->semester) == '1' ? 'selected' : '' }}>1</option>
									<option value="2" {{ old('semester', @$report_f4->semester) == '2' ? 'selected' : '' }}>2</option>
									<option value="3" {{ old('semester', @$report_f4->semester) == '3' ? 'selected' : '' }}>3</option>
									<option value="4" {{ old('semester', @$report_f4->semester) == '4' ? 'selected' : '' }}>4</option>
									<option value="5" {{ old('semester', @$report_f4->semester) == '5' ? 'selected' : '' }}>5</option>
									<option value="6" {{ old('semester', @$report_f4->semester) == '6' ? 'selected' : '' }}>6</option>
									<option value="7" {{ old('semester', @$report_f4->semester) == '7' ? 'selected' : '' }}>7</option>
									<option value="8" {{ old('semester', @$report_f4->semester) == '8' ? 'selected' : '' }}>8</option>	
								</select>
								@error('semester')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="kelas">Kelas</label>
								<select name="kelas" value="{{ old('kelas') }}" class="form-control @error('kelas') is-invalid @enderror">
									<option value="">PILIH</option>
									<option value="32RTHH" {{ old('kelas', @$report_f4->kelas)=='32RTHH' ? 'selected' : '' }}>32RTHH</option>
								</select>
								@error('kelas')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="jumlah_mahasiswa">Jumlah Mahasiswa</label>
								<input type="number" class="form-control @error('jumlah_mahasiswa') is-invalid @enderror" name="jumlah_mahasiswa" value="{{ old('jumlah_mahasiswa') ?? $report_f4->jumlah_mahasiswa  }}">
								@error('jumlah_mahasiswa')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="sp1">Surat Peringatan I</label>
								<input type="number" class="form-control" name="sp1" value="{{ old('sp1') ?? $report_f4->sp1  }}">
							</div>
							<div class="form-group">
								<label for="sp2">Surat Peringatan II</label>
								<input type="number" class="form-control" name="sp2" value="{{ old('sp2') ?? $report_f4->sp2  }}">
							</div>
							<div class="form-group">
								<label for="sp3">Surat Peringatan III</label>
								<input type="number" class="form-control" name="sp3" value="{{ old('sp3') ?? $report_f4->sp3  }}">
							</div>
							<div class="form-group">
								<label for="keterangan">Keterangan</label>
								<input type="text" class="form-control" name="keterangan" value="{{ old('keterangan') ?? $report_f4->keterangan  }}">
							</div>
							<div class="form-group">
								<label for="tahun">Tahun</label>
								<select type="text" class="form-control @error('tahun') is-invalid @enderror" name="tahun">
                                    <option selected>Pilih</option>
                                    <option value="2017/2018" {{ old('tahun', @$report_f4->tahun) == '2017/2018' ? 'selected' : '' }}>2017/2018</option>
                                    <option value="2018/2019" {{ old('tahun', @$report_f4->tahun) == '2018/2019' ? 'selected' : '' }}>2018/2019</option>
                                    <option value="2019/2020" {{ old('tahun', @$report_f4->tahun) == '2019/2020' ? 'selected' : '' }}>2019/2020</option>
                                    <option value="2020/2021" {{ old('tahun', @$report_f4->tahun) == '2020/2021' ? 'selected' : '' }}>2020/2021</option>
                                    <option value="2021/2022" {{ old('tahun', @$report_f4->tahun) == '2021/2022' ? 'selected' : '' }}>2021/2022</option>
								</select>
								@error('tahun')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
					</div>
					<div class="float-right">
                        <a href="{{ route('f4s') }}" class="btn btn-warning">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
				</form>
			</div>
		</div>	
	</div>
</div>

@endsection