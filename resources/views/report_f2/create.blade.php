@extends('layouts.app')

@section('content')

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<form action="{{ route('rekapipmahasiswa.store') }}" method="POST">
					@csrf
					<div class="row">
						<div class="col-md-6">
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
								<label for="ip_s1">IP Semester 1</label>
								<input type="text" class="form-control @error('ip_s1') is-invalid @enderror" name="ip_s1" value="{{ old('ip_s1') }}">
								@error('ip_s1')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="ip_s2">IP Semester 2</label>
								<input type="text" class="form-control @error('ip_s2') is-invalid @enderror" name="ip_s2" value="{{ old('ip_s2') }}">
								@error('ip_s2')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="ip_s3">IP Semester 3</label>
								<input type="text" class="form-control @error('ip_s3') is-invalid @enderror" name="ip_s3" value="{{ old('ip_s3') }}">
								@error('ip_s3')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="ip_s4">IP Semester 4</label>
								<input type="text" class="form-control @error('ip_s4') is-invalid @enderror" name="ip_s4" value="{{ old('ip_s4') }}">
								@error('ip_s4')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="ip_s5">IP Semester 5</label>
								<input type="text" class="form-control @error('ip_s5') is-invalid @enderror" name="ip_s5" value="{{ old('ip_s5') }}">
								@error('ip_s5')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="ip_s6">IP Semester 6</label>
								<input type="text" class="form-control @error('ip_s6') is-invalid @enderror" name="ip_s6" value="{{ old('ip_s6') }}">
								@error('ip_s6')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="ip_s7">IP Semester 7</label>
								<input type="text" class="form-control @error('ip_s7') is-invalid @enderror" name="ip_s7" value="{{ old('ip_s7') }}">
								@error('ip_s7')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="ip_s8">IP Semester 8</label>
								<input type="text" class="form-control @error('ip_s8') is-invalid @enderror" name="ip_s8" value="{{ old('ip_s8') }}">
								@error('ip_s8')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="ipk">IPK</label>
								<input type="text" class="form-control @error('ipk') is-invalid @enderror" name="ipk" value="{{ old('ipk') }}">
								@error('ipk')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="status">Status</label>
								<select name="status" class="form-control @error('status') is-invalid @enderror">
									<option value="">Pilih Status</option>
									<option value="L">L</option>
									<option value="LP">LP</option>
									<option value="DO">DO</option>
									<option value="MD">MD</option>
									<option value="CA">CA</option>
								</select>
								@error('status')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
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
                        <a href="{{ route('rekapipmahasiswa') }}" class="btn btn-warning">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
				</form>
			</div>
		</div>	
	</div>
</div>

@endsection