@extends('layouts.app')

@section('content')


<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<form action="{{ route('f4s.store') }}" method="POST">
					@csrf
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="prodi">Prodi</label>
								<select name="prodi" class="form-control @error('prodi') is-invalid @enderror">
										<option value="">PILIH</option>
										<option value="TI">TI</option>
										<option value="TI CBD">TI CBD</option>
										<option value="TI MSU">TI MSU</option>
										<option value="TMD">TMD</option>
										<option value="TMD MSU">TMD MSU</option>
 										<option value="TMD Aeu">TMD Aeu</option>
										<option value="TMJ">TMJ</option>
 										<option value="CCIT">CCIT</option>
									</select>
								@error('prodi')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="jenjang">Jenjang</label>
								<select class="form-control @error('jenjang') is-invalid @enderror" name="jenjang" value="{{ old('jenjang') }}">	
									<option value="">PILIH</option>
									<option value="D4">D4</option>
								</select>
								@error('jenjang')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="semester">Semester</label>
								<select class="form-control @error('semester') is-invalid @enderror" name="semester" value="{{ old('semester') }}">	
									<option value="">PILIH</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
								</select>
								@error('semester')
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
								<label for="jumlah_mahasiswa">Jumlah Mahasiswa</label>
								<input type="number" class="form-control @error('jumlah_mahasiswa') is-invalid @enderror" name="jumlah_mahasiswa" value="{{ old('jumlah_mahasiswa') }}">
								@error('jumlah_mahasiswa')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="sp1">Surat Peringatan I</label>
								<input type="number" class="form-control" name="sp1" value="{{ old('sp1') }}">
							</div>
							<div class="form-group">
								<label for="sp2">Surat Peringatan II</label>
								<input type="number" class="form-control" name="sp2" value="{{ old('sp2') }}">
							</div>
							<div class="form-group">
								<label for="sp3">Surat Peringatan III</label>
								<input type="number" class="form-control" name="sp3" value="{{ old('sp3') }}">
							</div>
							<div class="form-group">
								<label for="keterangan">Keterangan</label>
								<input type="text" class="form-control" name="keterangan" value="{{ old('keterangan') }}">
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
                        <a href="{{ route('f4s') }}" class="btn btn-warning">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
				</form>
			</div>
		</div>	
	</div>
</div>

@endsection