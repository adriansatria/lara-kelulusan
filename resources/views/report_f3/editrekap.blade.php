@extends('layouts.app')

@section('content')


<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<form action="{{ route('rekapstatuskelulusan.update', $report_f3->id) }}" method="POST">
					@method('PATCH')
					@csrf
					<div class="row">
						<div class="col-md-6">
						<div class="form-group">
								<label for="nim">Mahasiswa</label>
								<select name="nim" class="form-control @error('nim') is-invalid @enderror">
									<option value="">Pilih Mahasiswa</option>
									@foreach($mahasiswa as $i)
										<option value="{{ $i->nim }}" {{ old('nim', @$report_f3->nim)==$i->nim ? 'selected' : '' }}>{{ $i->nim }} - {{ $i->nama }}</option>
                 					 @endforeach
								</select>
								@error('nim')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<input type="hidden" name="nama_mahasiswa" value="-">
							<div class="form-group">
								<label for="prodi">Prodi</label>
								<select name="prodi" class="form-control @error('prodi') is-invalid @enderror">
										<option value="">PILIH</option>
										<option value="TI" {{ old('prodi', @$evaluation->prodi)=='TI' ? 'selected' : '' }}>TI</option>
										<option value="TI CBD" {{ old('prodi', @$evaluation->prodi)=='TI CBD' ? 'selected' : '' }}>TI CBD</option>
										<option value="TI MSU" {{ old('prodi', @$evaluation->prodi)=='TI MSU' ? 'selected' : '' }}>TI MSU</option>
										<option value="TMD" {{ old('prodi', @$evaluation->prodi)=='TMD' ? 'selected' : '' }}>TMD</option>
										<option value="TMD MSU" {{ old('prodi', @$evaluation->prodi)=='TMD MSU' ? 'selected' : '' }}>TMD MSU</option>
										<option value="TMD Aeu" {{ old('prodi', @$evaluation->prodi)=='TMD Aeu' ? 'selected' : '' }}>TMD Aeu</option>
										<option value="TMJ" {{ old('prodi', @$evaluation->prodi)=='TMJ' ? 'selected' : '' }}>TMJ</option>
										<option value="CCIT" {{ old('prodi', @$evaluation->prodi)=='CCIT' ? 'selected' : '' }}>CCIT</option>
									</select>
								@error('prodi')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="jenjang">Jenjang</label>
								<select class="form-control @error('jenjang') is-invalid @enderror" name="jenjang" value="{{ old('jenjang') ?? $report_f3->jenjang  }}">
									<option value="">PILIH</option>
									<option value="D4" {{ old('jenjang', @$report_f3->jenjang) == 'D4' ? 'selected' : '' }}>D4</option>
								</select>
								@error('jenjang')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="semester">Semester</label>
								<select type="text" class="form-control @error('semester') is-invalid @enderror" name="semester">
									<option value="">PILIH</option>
									<option value="1" {{ old('semester', @$report_f3->semester) == '1' ? 'selected' : '' }}>1</option>
									<option value="2" {{ old('semester', @$report_f3->semester) == '2' ? 'selected' : '' }}>2</option>
									<option value="3" {{ old('semester', @$report_f3->semester) == '3' ? 'selected' : '' }}>3</option>
									<option value="4" {{ old('semester', @$report_f3->semester) == '4' ? 'selected' : '' }}>4</option>
									<option value="5" {{ old('semester', @$report_f3->semester) == '5' ? 'selected' : '' }}>5</option>
									<option value="6" {{ old('semester', @$report_f3->semester) == '6' ? 'selected' : '' }}>6</option>
									<option value="7" {{ old('semester', @$report_f3->semester) == '7' ? 'selected' : '' }}>7</option>
									<option value="8" {{ old('semester', @$report_f3->semester) == '8' ? 'selected' : '' }}>8</option>	
								</select>
								@error('semester')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="kelas">Kelas</label>
								<select name="kelas" value="{{ old('kelas') }}" class="form-control @error('kelas') is-invalid @enderror">
									<option value="">PILIH</option>
									<option value="TI-1A" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>TI-1A</option>
									<option value="TI-1B" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>TI-1B</option>
									<option value="TI-3" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>TI-3</option>
									<option value="TI-3A" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>TI-3A</option>
									<option value="TI-5A" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>TI-5A</option>
									<option value="TI-5B" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>TI-5B</option>
									<option value="TI-7A" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>TI-7A</option>
									<option value="TI-7B" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>TI-7B</option>
									<option value="TI-5A MSU" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>TI-5A MSU</option>
 									<option value="TI-5B MSU" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>TI-5B MSU</option>
									<option value="TMD-1" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>TMD-1</option>
									<option value="TMD-3" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>TMD-3</option>
									<option value="TMD-5" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>TMD-5</option>
									<option value="TMD-1 MSU" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>TMD-1 MSU</option>
									<option value="TMD-3 MSU" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>TMD-3 MSU</option>
 									<option value="TMD-1 Aeu" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>TMD-1 Aeu</option>
									<option value="TMD-3 Aeu" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>TMD-3 Aeu</option>
									<option value="TMJ-3" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>TMJ-3</option>
 									<option value="TMJ-5" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>TMJ-5</option>
 									<option value="CCIT-1" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>CCIT-1</option>
 									<option value="CCIT-3" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>CCIT-3</option>
 									<option value="CCIT-5A" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>CCIT-5A</option>
									<option value="CCIT-5B" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>CCIT-5B</option>
									<option value="CCIT-7A" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>CCIT-7A</option>
									<option value="CCIT SEC 3A" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>CCIT SEC 3A</option>
									<option value="CCIT SEC 5A" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>CCIT SEC 5A</option>
									<option value="CCIT SEC 5B" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>CCIT SEC 5B</option>
								</select>
								@error('kelas')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="jumlah_mahasiswa">Jumlah Mahasiswa</label>
								<input type="number" class="form-control @error('jumlah_mahasiswa') is-invalid @enderror" name="jumlah_mahasiswa" value="{{ old('jumlah_mahasiswa') ?? $report_f3->jumlah_mahasiswa  }}">
								@error('jumlah_mahasiswa')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="tahun">Tahun</label>
								<select type="text" class="form-control @error('tahun') is-invalid @enderror" name="tahun">
                                    <option selected>PILIH</option>
                                    <option value="2017/2018" {{ old('tahun', @$report_f3->tahun) == '2017/2018' ? 'selected' : '' }}>2017/2018</option>
                                    <option value="2018/2019" {{ old('tahun', @$report_f3->tahun) == '2018/2019' ? 'selected' : '' }}>2018/2019</option>
                                    <option value="2019/2020" {{ old('tahun', @$report_f3->tahun) == '2019/2020' ? 'selected' : '' }}>2019/2020</option>
                                    <option value="2020/2021" {{ old('tahun', @$report_f3->tahun) == '2020/2021' ? 'selected' : '' }}>2020/2021</option>
                                    <option value="2021/2022" {{ old('tahun', @$report_f3->tahun) == '2021/2022' ? 'selected' : '' }}>2021/2022</option>
								</select>
								@error('tahun')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="status_l">Status L</label>
								<input type="number" class="form-control" name="status_l" value="{{ old('status_l') ?? $report_f3->status_l  }}">
							</div>
							<div class="form-group">
								<label for="status_lp">Status LP</label>
								<input type="number" class="form-control" name="status_lp" value="{{ old('status_lp') ?? $report_f3->status_lp  }}">
							</div>
							<div class="form-group">
								<label for="status_ct">Status CT</label>
								<input type="number" class="form-control" name="status_ct" value="{{ old('status_ct') ?? $report_f3->status_ct  }}">
							</div>
							<div class="form-group">
								<label for="status_ml">Status ML</label>
								<input type="number" class="form-control" name="status_ml" value="{{ old('status_ml') ?? $report_f3->status_ml  }}">
							</div>
							<div class="form-group">
								<label for="status_md">Status MD</label>
								<input type="number" class="form-control" name="status_md" value="{{ old('status_md') ?? $report_f3->status_md  }}">
							</div>
							<div class="form-group">
								<label for="status_do">Status DO</label>
								<input type="number" class="form-control" name="status_do" value="{{ old('status_do') ?? $report_f3->status_do  }}">
							</div>
							<div class="form-group">
								<label for="keterangan">Keterangan</label>
								<input class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" value="{{ old('keterangan') ?? $report_f3->keterangan  }}">
								@error('keterangan')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
					</div>
					<div class="float-right">
                        <a href="{{ route('rekapstatuskelulusan') }}" class="btn btn-warning">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
				</form>
			</div>
		</div>	
	</div>
</div>

@endsection