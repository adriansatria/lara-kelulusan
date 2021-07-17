@extends('layouts.app')

@section('content')


<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<form action="{{ route('rekapkehadirandosen.store') }}" method="POST">
					@csrf
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="nip">Dosen</label>
								<select class="form-select form-control @error('nip') is-invalid @enderror" name="nip">
									<option value="">PILIH</option>
									@foreach($dosen as $i)
										<option value="{{ $i->nip }}">{{ $i->nip }} - {{ $i->nama_dosen }}</option>
               					   @endforeach
								</select>
								@error('nip')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<input type="hidden" name="nama_dosen" value="-">
							<div class="form-group">
								<label for="mata_kuliah">Mata Kuliah</label>
								<select name="mata_kuliah" value="{{ old('mata_kuliah') }}" class="form-control @error('mata_kuliah') is-invalid @enderror">
									<option value="">PILIH</option>
									<option value="Matematika Diskrit">Matematika Diskrit</option>
									<option value="Aljabar Linier">Aljabar Linier</option>
									<option value="Mathematics 2">Mathematics 2</option>)
									<option value="Discrete Mathematics">Discrete Mathematics</option>
									<option value="Bahasa Inggris untuk Teknologi Informasi & Komunikasi 1">Bahasa Inggris untuk Teknologi Informasi & Komunikasi 1</option>
									<option value="Bahasa Inggris untuk Teknologi Informasi & Komunikasi 3">Bahasa Inggris untuk Teknologi Informasi & Komunikasi 3</option>
									<option value="Bahasa Inggris Komunikasi 1">Bahasa Inggris Komunikasi 1</option>
									<option value="Bahasa Inggris Komunikasi 2">Bahasa Inggris Komunikasi 2</option>
									<option value="Bahasa Inggris untuk TIK 1">Bahasa Inggris untuk TIK 1</option>
									<option value="Bahasa Inggris untuk TIK 3">Bahasa Inggris untuk TIK 3</option>
									<option value="English 5">English 5</option>
									<option value="English for ICT 1">English for ICT 1</option>
									<option value="English for ICT 3">English for ICT 3</option>
									<option value="Seminar">Seminar</option>
									<option value="Basis Data 2">Basis Data 2</option>
									<option value="E-Business">E-Business</option>
									<option value="Oracle DB Programming SQL">Oracle DB Programming SQL</option>
									<option value="Keamanan Komputer dan Pemulihan Bencana">Keamanan Komputer dan Pemulihan Bencana</option>
									<option value="Sistem Terdistribusi">Sistem Terdistribusi</option>
									<option value="Sistem Pendukung Keputusan">Sistem Pendukung Keputusan</option>
									<option value="Oracle DB Design">Oracle DB Design</option>
									<option value="Kapita Selekta 1">Kapita Selekta 1</option>
									<option value="Metode Numerik">Metode Numerik</option>
									<option value="Probabilitas dan Statistik">Probabilitas dan Statistik</option>
									<option value="Metodologi Statistik dalam TIK">Metodologi Statistik dalam TIK</option>
									<option value="Linear Algebra">Linear Algebra</option>
									<option value="Algoritma dan Pemrograman">Algoritma dan Pemrograman</option>
									<option value="Pembelajaran Mesin">Pembelajaran Mesin</option>
									<option value="Kecerdasan Buatan">Kecerdasan Buatan</option>
								</select>
								@error('mata_kuliah')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="kelas">Kelas</label>
								<select name="kelas" value="{{ old('kelas') }}" class="form-control @error('kelas') is-invalid @enderror">
									<option value="">PILIH</option>
									<option value="TI-1A">TI-1A</option>
									<option value="TI-1B">TI-1B</option>
									<option value="TI-3">TI-3</option>
									<option value="TI-3A">TI-3A</option>
									<option value="TI-5A">TI-5A</option>
									<option value="TI-5B">TI-5B</option>
									<option value="TI-7A">TI-7A</option>
									<option value="TI-7B">TI-7B</option>
									<option value="TI-5A MSU">TI-5A MSU</option>
 									<option value="TI-5B MSU">TI-5B MSU</option>
									<option value="TMD-1">TMD-1</option>
									<option value="TMD-3">TMD-3</option>
									<option value="TMD-5">TMD-5</option>
									<option value="TMD-1 MSU">TMD-1 MSU</option>
									<option value="TMD-3 MSU">TMD-3 MSU</option>
 									<option value="TMD-1 Aeu">TMD-1 Aeu</option>
									<option value="TMD-3 Aeu">TMD-3 Aeu</option>
									<option value="TMJ-3">TMJ-3</option>
 									<option value="TMJ-5">TMJ-5</option>
 									<option value="CCIT-1">CCIT-1</option>
 									<option value="CCIT-3">CCIT-3</option>
 									<option value="CCIT-5A">CCIT-5A</option>
									<option value="CCIT-5B">CCIT-5B</option>
									<option value="CCIT-7A">CCIT-7A</option>
									<option value="CCIT SEC 3A">CCIT SEC 3A</option>
									<option value="CCIT SEC 5A">CCIT SEC 5A</option>
									<option value="CCIT SEC 5B">CCIT SEC 5B</option>
								</select>
								@error('kelas')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="kpk">% Kehadiran per Kelas</label>
								<input type="text" class="form-control @error('kpk') is-invalid @enderror" name="kpk" value="{{ old('kpk') }}">
								@error('kpk')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="jpm">JPM</label>
								<input type="number" class="form-control @error('jpm') is-invalid @enderror" name="jpm" value="{{ old('jpm') }}">
								@error('jpm')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="rata_kehadiran">Rata-rata % Kehadiran per SMT</label>
								<input type="text" class="form-control @error('rata_kehadiran') is-invalid @enderror" name="rata_kehadiran" value="{{ old('rata_kehadiran') }}">
								@error('rata_kehadiran')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="tahun">Tahun</label>
								<select type="text" class="form-control @error('tahun') is-invalid @enderror" name="tahun">
                                    <option selected>PILIH</option>
                                    <option value="2017/2018">2017/2018</option>
                                    <option value="2018/2019">2018/2019</option>
                                    <option value="2019/2020">2019/2020</option>
                                    <option value="2020/2021">2020/2021</option>
                                    <option value="2021/2022">2021/2022</option>
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