@extends('layouts.app')

@section('content')


<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<form action="{{ route('evaluations.update', $evaluation->id) }}" method="POST">
					@method('PATCH')
					@csrf
					<div class="row">
						<div class="col-md-6">
						<div class="form-group">
								<label for="nama_dosen">Nama Dosen</label>
								<select type="text" class="form-control @error('nama_dosen') is-invalid @enderror" name="nama_dosen">
									<option value="">PILIH</option>
									@foreach($dosen as $i)
									<option value="{{ $i->nama_dosen }}" {{ old('nama_dosen', @$evaluation->nama_dosen)==$i->nama_dosen ? 'selected' : '' }}>{{ $i->nip }} - {{ $i->nama_dosen }}</option>
									@endforeach
								</select>
								@error('nama_dosen')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
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
								<select name="kelas" value="{{ old('kelas') }}" class="form-control @error('kelas') is-invalid @enderror">
									<option value="">PILIH</option>
									<option value="TI-1A" {{ old('kelas', @$evaluation->kelas)=='TI-1A' ? 'selected' : '' }}>TI-1A</option>
									<option value="TI-1B" {{ old('kelas', @$evaluation->kelas)=='TI-1B' ? 'selected' : '' }}>TI-1B</option>
									<option value="TI-3" {{ old('kelas', @$evaluation->kelas)=='TI-3' ? 'selected' : '' }}>TI-3</option>
									<option value="TI-3A" {{ old('kelas', @$evaluation->kelas)=='TI-3A' ? 'selected' : '' }}>TI-3A</option>
									<option value="TI-5A" {{ old('kelas', @$evaluation->kelas)=='TI-5A' ? 'selected' : '' }}>TI-5A</option>
									<option value="TI-5B" {{ old('kelas', @$evaluation->kelas)=='TI-5B' ? 'selected' : '' }}>TI-5B</option>
									<option value="TI-7A" {{ old('kelas', @$evaluation->kelas)=='TI-7A' ? 'selected' : '' }}>TI-7A</option>
									<option value="TI-7B" {{ old('kelas', @$evaluation->kelas)=='TI-7B' ? 'selected' : '' }}>TI-7B</option>
									<option value="TI-5A MSU" {{ old('kelas', @$evaluation->kelas)=='TI-5A MSU' ? 'selected' : '' }}>TI-5A MSU</option>
 									<option value="TI-5B MSU" {{ old('kelas', @$evaluation->kelas)=='TI-5B MSU' ? 'selected' : '' }}>TI-5B MSU</option>
									<option value="TMD-1" {{ old('kelas', @$evaluation->kelas)=='TMD-1' ? 'selected' : '' }}>TMD-1</option>
									<option value="TMD-3" {{ old('kelas', @$evaluation->kelas)=='TMD-3' ? 'selected' : '' }}>TMD-3</option>
									<option value="TMD-5" {{ old('kelas', @$evaluation->kelas)=='TMD-5' ? 'selected' : '' }}>TMD-5</option>
									<option value="TMD-1 MSU" {{ old('kelas', @$evaluation->kelas)=='TMD-1 MSU' ? 'selected' : '' }}>TMD-1 MSU</option>
									<option value="TMD-3 MSU" {{ old('kelas', @$evaluation->kelas)=='TMD-3 MSU' ? 'selected' : '' }}>TMD-3 MSU</option>
 									<option value="TMD-1 Aeu" {{ old('kelas', @$evaluation->kelas)=='TMD-1 Aeu' ? 'selected' : '' }}>TMD-1 Aeu</option>
									<option value="TMD-3 Aeu" {{ old('kelas', @$evaluation->kelas)=='TMD-3 Aeu' ? 'selected' : '' }}>TMD-3 Aeu</option>
									<option value="TMJ-3" {{ old('kelas', @$evaluation->kelas)=='TMJ-3' ? 'selected' : '' }}>TMJ-3</option>
 									<option value="TMJ-5" {{ old('kelas', @$evaluation->kelas)=='TMJ-5' ? 'selected' : '' }}>TMJ-5</option>
 									<option value="CCIT-1" {{ old('kelas', @$evaluation->kelas)=='CCIT-1' ? 'selected' : '' }}>CCIT-1</option>
 									<option value="CCIT-3" {{ old('kelas', @$evaluation->kelas)=='CCIT-3' ? 'selected' : '' }}>CCIT-3</option>
 									<option value="CCIT-5A" {{ old('kelas', @$evaluation->kelas)=='CCIT-5A' ? 'selected' : '' }}>CCIT-5A</option>
									<option value="CCIT-5B" {{ old('kelas', @$evaluation->kelas)=='CCIT-5B' ? 'selected' : '' }}>CCIT-5B</option>
									<option value="CCIT-7A" {{ old('kelas', @$evaluation->kelas)=='CCIT-7A' ? 'selected' : '' }}>CCIT-7A</option>
									<option value="CCIT SEC 3A" {{ old('kelas', @$evaluation->kelas)=='CCIT SEC 3A' ? 'selected' : '' }}>CCIT SEC 3A</option>
									<option value="CCIT SEC 5A" {{ old('kelas', @$evaluation->kelas)=='CCIT SEC 5A' ? 'selected' : '' }}>CCIT SEC 5A</option>
									<option value="CCIT SEC 5B" {{ old('kelas', @$evaluation->kelas)=='CCIT SEC 3B' ? 'selected' : '' }}>CCIT SEC 5B</option>
								</select>
								@error('kelas')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="nim">Mahasiswa</label>
								<select name="nim" class="form-control @error('nim') is-invalid @enderror">
									<option value="">Pilih Mahasiswa</option>
									@foreach($mahasiswa as $i)
										<option value="{{ $i->nim }}" {{ old('nim', @$evaluation->nim)==$i->nim ? 'selected' : '' }}>{{ $i->nim }} - {{ $i->nama }}</option>
               					   @endforeach
								</select>
								@error('nim')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<input type="hidden" name="nama_mahasiswa" value="-">
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="nilai_akhir">Nilai Akhir</label>
								<select name="nilai_akhir" class="form-control @error('nilai_akhir') is-invalid @enderror">
									@if($evaluation->nilai_akhir == 'D')
									<option value="{{ $evaluation->nilai_akhir  }}">{{ $evaluation->nilai_akhir  }}</option>
									<option value="E">E</option>
									@elseif($evaluation->nilai_akhir == 'E')
									<option value="{{ $evaluation->nilai_akhir  }}">{{ $evaluation->nilai_akhir  }}</option>
									<option value="D">D</option>
									@endif
								</select>
								@error('nilai_akhir')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="kemungkinan_perbaikan">Kemungkinan Perbaikan</label>
								<select name="kemungkinan_perbaikan" class="form-control @error('kemungkinan_perbaikan') is-invalid @enderror">
									@if($evaluation->kemungkinan_perbaikan == 'Bisa')
									<option value="{{ $evaluation->kemungkinan_perbaikan  }}">{{ $evaluation->kemungkinan_perbaikan  }}</option>
									{{-- <option value="Bisa">Bisa</option> --}}
									<option value="Tidak Bisa">Tidak Bisa</option>
									@elseif($evaluation->kemungkinan_perbaikan == 'Tidak Bisa')
									<option value="{{ $evaluation->kemungkinan_perbaikan  }}">{{ $evaluation->kemungkinan_perbaikan  }}</option>
									<option value="Bisa">Bisa</option>
									@endif
								</select>
								@error('kemungkinan_perbaikan')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="keterangan">Keterangan</label>
								<textarea type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" value="{{ old('keterangan') ?? $evaluation->keterangan }}"></textarea>
								@error('keterangan')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="tahun">Tahun</label>
								<select type="text" class="form-control @error('tahun') is-invalid @enderror" name="tahun">
                                    <option selected>Pilih</option>
                                    <option value="2017/2018" {{ old('tahun', @$evaluation->tahun) == '2017/2018' ? 'selected' : '' }}>2017/2018</option>
                                    <option value="2018/2019" {{ old('tahun', @$evaluation->tahun) == '2018/2019' ? 'selected' : '' }}>2018/2019</option>
                                    <option value="2019/2020" {{ old('tahun', @$evaluation->tahun) == '2019/2020' ? 'selected' : '' }}>2019/2020</option>
                                    <option value="2020/2021" {{ old('tahun', @$evaluation->tahun) == '2020/2021' ? 'selected' : '' }}>2020/2021</option>
                                    <option value="2021/2022" {{ old('tahun', @$evaluation->tahun) == '2021/2022' ? 'selected' : '' }}>2021/2022</option>
								</select>
								@error('tahun')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
					</div>
					<div class="float-right">
                        <a href="{{ route('evaluations') }}" class="btn btn-warning">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
				</form>
			</div>
		</div>	
	</div>
</div>

@endsection