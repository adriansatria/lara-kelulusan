@extends('layouts.app')

@section('content')


<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<form action="{{ route('rekapkehadirandosen.update', $report_f1->id) }}" method="POST">
          @method('PATCH')
					@csrf
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="nip">Dosen</label>
								<select class="form-select form-control @error('nip') is-invalid @enderror" name="nip">
									<option value="">PILIH</option>
									@foreach($dosen as $i)
										<option value="{{ $i->nip }}" {{ old('nip', @$report_f1->nip)==$i->nip ? 'selected' : '' }}>{{ $i->nip }} - {{ $i->nama_dosen }}</option>
                  @endforeach
								</select>
								@error('nip')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<input type="hidden" name="nama_dosen" value="-">
							<div class="form-group">
								<label for="mata_kuliah">Mata Kuliah</label>
								<select name="mata_kuliah" class="form-control @error('mata_kuliah') is-invalid @enderror">
									<option value="">PILIH</option>
									<option value="Matematika Diskrit" {{ old('mata_kuliah', @$report_f1->mata_kuliah)=='Matematika Diskrit' ? 'selected' : '' }}>Matematika Diskrit</option>
									<option value="Aljabar Linier" {{ old('mata_kuliah', @$report_f1->mata_kuliah)=='Aljabar Linier' ? 'selected' : '' }}>Aljabar Linier</option>
									<option value="Mathematics 2" {{ old('mata_kuliah', @$report_f1->mata_kuliah)=='Mathematics 2' ? 'selected' : '' }}>Mathematics 2</option>
									<option value="Discrete Mathematics" {{ old('mata_kuliah', @$report_f1->mata_kuliah)=='Discrete Mathematics' ? 'selected' : '' }}>Discrete Mathematics</option>
									<option value="Bahasa Inggris untuk Teknologi Informasi & Komunikasi 1" {{ old('mata_kuliah', @$report_f1->mata_kuliah)=='Bahasa Inggris untuk Teknologi Informasi & Komunikasi 1' ? 'selected' : '' }}>Bahasa Inggris untuk Teknologi Informasi & Komunikasi 1</option>
									<option value="Bahasa Inggris untuk Teknologi Informasi & Komunikasi 3" {{ old('mata_kuliah', @$report_f1->mata_kuliah)=='Bahasa Inggris untuk Teknologi Informasi & Komunikasi 3' ? 'selected' : '' }}>Bahasa Inggris untuk Teknologi Informasi & Komunikasi 3</option>
									<option value="Bahasa Inggris Komunikasi 1" {{ old('mata_kuliah', @$report_f1->mata_kuliah)=='Bahasa Inggris Komunikasi 1' ? 'selected' : '' }}>Bahasa Inggris Komunikasi 1</option>
									<option value="Bahasa Inggris Komunikasi 2" {{ old('mata_kuliah', @$report_f1->mata_kuliah)=='Bahasa Inggris Komunikasi 2' ? 'selected' : '' }}>Bahasa Inggris Komunikasi 2</option>
									<option value="Bahasa Inggris untuk TIK 1" {{ old('mata_kuliah', @$report_f1->mata_kuliah)=='Bahasa Inggris untuk TIK 1' ? 'selected' : '' }}>Bahasa Inggris untuk TIK 1</option>
									<option value="Bahasa Inggris untuk TIK 3" {{ old('mata_kuliah', @$report_f1->mata_kuliah)=='Bahasa Inggris untuk TIK 3' ? 'selected' : '' }}>Bahasa Inggris untuk TIK 3</option>
									<option value="English 5" {{ old('mata_kuliah', @$report_f1->mata_kuliah)=='English 5' ? 'selected' : '' }}>English 5</option>
									<option value="English for ICT 1" {{ old('mata_kuliah', @$report_f1->mata_kuliah)=='English for ICT 1' ? 'selected' : '' }}>English for ICT 1</option>
									<option value="English for ICT 3" {{ old('mata_kuliah', @$report_f1->mata_kuliah)=='English for ICT 3' ? 'selected' : '' }}>English for ICT 3</option>
									<option value="Seminar" {{ old('mata_kuliah', @$report_f1->mata_kuliah)=='Seminar' ? 'selected' : '' }}>Seminar</option>
									<option value="Basis Data 2" {{ old('mata_kuliah', @$report_f1->mata_kuliah)=='Basis Data 2' ? 'selected' : '' }}>Basis Data 2</option>
									<option value="E-Business" {{ old('mata_kuliah', @$report_f1->mata_kuliah)=='E-Business' ? 'selected' : '' }}>E-Business</option>
									<option value="Oracle DB Programming SQL" {{ old('mata_kuliah', @$report_f1->mata_kuliah)=='Oracle DB Programming SQL' ? 'selected' : '' }}>Oracle DB Programming SQL</option>
									<option value="Keamanan Komputer dan Pemulihan Bencana" {{ old('mata_kuliah', @$report_f1->mata_kuliah)=='Keamanan Komputer dan Pemulihan Bencana' ? 'selected' : '' }}>Keamanan Komputer dan Pemulihan Bencana</option>
									<option value="Sistem Terdistribusi" {{ old('mata_kuliah', @$report_f1->mata_kuliah)=='Sistem Terdistribusi' ? 'selected' : '' }}>Sistem Terdistribusi</option>
									<option value="Sistem Pendukung Keputusan" {{ old('mata_kuliah', @$report_f1->mata_kuliah)=='Sistem Pendukung Keputusan' ? 'selected' : '' }}>Sistem Pendukung Keputusan</option>
									<option value="Oracle DB Design" {{ old('mata_kuliah', @$report_f1->mata_kuliah)=='Oracle DB Design' ? 'selected' : '' }}>Oracle DB Design</option>
									<option value="Kapita Selekta 1" {{ old('mata_kuliah', @$report_f1->mata_kuliah)=='Kapita Selekta 1' ? 'selected' : '' }}>Kapita Selekta 1</option>
									<option value="Metode Numerik" {{ old('mata_kuliah', @$report_f1->mata_kuliah)=='Metode Numerik' ? 'selected' : '' }}>Metode Numerik</option>
									<option value="Probabilitas dan Statistik" {{ old('mata_kuliah', @$report_f1->mata_kuliah)=='Probabilitas dan Statistik' ? 'selected' : '' }}>Probabilitas dan Statistik</option>
									<option value="Metodologi Statistik dalam TIK" {{ old('mata_kuliah', @$report_f1->mata_kuliah)=='Metodologi Statistik dalam TIK' ? 'selected' : '' }}>Metodologi Statistik dalam TIK</option>
									<option value="Linear Algebra" {{ old('mata_kuliah', @$report_f1->mata_kuliah)=='Linear Algebra' ? 'selected' : '' }}>Linear Algebra</option>
									<option value="Algoritma dan Pemrograman" {{ old('mata_kuliah', @$report_f1->mata_kuliah)=='Algoritma dan Pemrograman' ? 'selected' : '' }}>Algoritma dan Pemrograman</option>
									<option value="Pembelajaran Mesin" {{ old('mata_kuliah', @$report_f1->mata_kuliah)=='Pembelajaran Mesin' ? 'selected' : '' }}>Pembelajaran Mesin</option>
									<option value="Kecerdasan Buatan" {{ old('mata_kuliah', @$report_f1->mata_kuliah)=='Kecerdasan Buatan' ? 'selected' : '' }}>Kecerdasan Buatan</option>
								</select>
								@error('mata_kuliah')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="kelas">Kelas</label>
								<select name="kelas" class="form-control @error('kelas') is-invalid @enderror">
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
								<label for="kpk">% Kehadiran per Kelas</label>
								<input type="text" class="form-control @error('kpk') is-invalid @enderror" name="kpk" value="{{ old('kpk') ?? $report_f1->kpk }}">
								@error('kpk')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="jpm">JPM</label>
								<input type="number" class="form-control @error('jpm') is-invalid @enderror" name="jpm" value="{{ old('jpm') ?? $report_f1->jpm }}">
								@error('jpm')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="rata_kehadiran">Rata-rata % Kehadiran per SMT</label>
								<input type="text" class="form-control @error('rata_kehadiran') is-invalid @enderror" name="rata_kehadiran" value="{{ old('rata_kehadiran') ?? $report_f1->rata_kehadiran }}">
								@error('rata_kehadiran')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
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
					<div class="float-right">
                        <a href="{{ route('rekapkehadirandosen') }}" class="btn btn-warning">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
				</form>
			</div>
		</div>	
	</div>
</div>

@endsection