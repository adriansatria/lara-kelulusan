@extends('layouts.app')

@section('content')


<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<form action="{{ route('f2s.store') }}" method="POST">
					@csrf
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="kelas">Kelas</label>
								<input type="text" class="form-control @error('kelas') is-invalid @enderror" name="kelas" value="{{ old('kelas') }}">
								@error('kelas')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="nama_mahasiswa">Nama Mahasiswa</label>
								<input type="text" class="form-control @error('nama_mahasiswa') is-invalid @enderror" name="nama_mahasiswa" value="{{ old('nama_mahasiswa') }}">
								@error('nama_mahasiswa')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="nim">NIM</label>
								<input type="text" class="form-control @error('nim') is-invalid @enderror" name="nim" value="{{ old('nim') }}">
								@error('nim')
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
						</div>
						<div class="col-md-6">
							
							<div class="form-group">
								<label for="ip_s5">IP Semester 5</label>
								<input type="text" class="form-control @error('ip_s5') is-invalid @enderror" name="ip_s5" value="{{ old('ip_s5') }}">
								@error('ip_s5')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
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
								<label for="tahun">Tahun</label>
								<input type="text" class="form-control @error('tahun') is-invalid @enderror" name="tahun" value="{{ old('tahun') }}">
								@error('tahun')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-primary">Save</button>
				</form>
			</div>
		</div>	
	</div>
</div>

@endsection