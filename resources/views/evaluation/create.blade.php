@extends('layouts.app')

@section('content')

<div class="m-4">
	<h2 style="font-weight:bold">Evaluasi</h2>
</div>

<div class="row">
	<div class="col-12">
		<div class="card border border-secondary m-4">
			<div class="card-body">
				<form action="{{ route('evaluations.store') }}" method="POST">
					@csrf
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="nama_dosen">Nama Dosen</label>
								<select type="text" class="form-control @error('nama_dosen') is-invalid @enderror" name="nama_dosen">
									@if(session('level') == 'Dosen')
										@foreach($dosen as $i)
											@if($i->nama_dosen == $nama_dosen_login)
												<option value="{{ $i->nama_dosen }}" selected="">{{ $i->nip }} - {{ $i->nama_dosen }}</option>
											@endif
										@endforeach
                  @else
                  	<option value="">PILIH</option>
										@foreach($dosen as $i)
											<option value="{{ $i->nama_dosen }}">{{ $i->nip }} - {{ $i->nama_dosen }}</option>
										@endforeach
									@endif
								</select>
								@error('nama_dosen')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
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
									<option value="TI-3">TI-1</option>
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
								<label for="nim">Mahasiswa</label>
								<select name="nim" class="form-control @error('nim') is-invalid @enderror">
									<option value="">Pilih Mahasiswa</option>
									@foreach($mahasiswa as $i)
										<option value="{{ $i->nim }}">{{ $i->nim }} - {{ $i->nama }}</option>
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
									<option value="">Nilai Akhir</option>
									<option value="A">A</option>
									<option value="B">B</option>
									<option value="C">C</option>
									<option value="D">D</option>
									<option value="E">E</option>
								</select>
								@error('nilai_akhir')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="kemungkinan_perbaikan">Kemungkinan Perbaikan</label>
								<select name="kemungkinan_perbaikan" class="form-control @error('kemungkinan_perbaikan') is-invalid @enderror">
									<option value="">Kemungkinan Perbaikan</option>
									<option value="Bisa">Bisa</option>
									<option value="Tidak Bisa">Tidak Bisa</option>
								</select>
								@error('kemungkinan_perbaikan')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="keterangan">Keterangan</label>
								<textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan">{{ old('keterangan') }}</textarea>
								@error('keterangan')
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
                        <a href="{{ route('evaluations') }}" class="btn btn-warning">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
					<!-- <button type="submit" class="btn btn border border-secondary" style="background: rgb(235, 235, 235);">Save</button> -->
				</form>
			</div>
		</div>	
	</div>
</div>

@endsection