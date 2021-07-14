@extends('layouts.app')

@section('content')

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
					@method('PATCH')
					@csrf
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="nim">NIM</label>
								<input type="text" class="form-control @error('nim') is-invalid @enderror" name="nim" value="{{ old('nim') ?? $mahasiswa->nim }}" readonly="">
								@error('nim')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<!-- <div class="form-group">
								<label for="foto">Foto</label>
								<input type="text" class="form-control @error('nama') is-invalid @enderror" name="foto" value="{{ old('foto') ?? $mahasiswa->foto }}">
								@error('foto')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div> -->
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="nama">Nama</label>
								<input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') ?? $mahasiswa->nama }}">
								@error('nama')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="tempat_lahir">Tempat Lahir</label>
								<input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" value="{{ old('tempat_lahir') ?? $mahasiswa->tempat_lahir }}">
								@error('tempat_lahir')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="tanggal_lahir">Tanggal Lahir</label>
								<input type="text" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="{{ old('tanggal_lahir') ?? $mahasiswa->tanggal_lahir }}">
								@error('tanggal_lahir')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="agama">Agama</label>
								<input type="text" class="form-control @error('agama') is-invalid @enderror" name="agama" value="{{ old('agama') ?? $mahasiswa->agama }}">
								@error('agama')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="asal_sekolah">Asal Sekolah</label>
								<input type="text" class="form-control @error('asal_sekolah') is-invalid @enderror" name="asal_sekolah" value="{{ old('asal_sekolah') ?? $mahasiswa->asal_sekolah }}">
								@error('asal_sekolah')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="jenis_kelamin">Jenis Kelamin</label>
								<input type="text" class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" value="{{ old('jenis_kelamin') ?? $mahasiswa->jenis_kelamin }}">
								@error('jenis_kelamin')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="golongan_darah">Golongan Darah</label>
								<input type="text" class="form-control @error('golongan_darah') is-invalid @enderror" name="golongan_darah" value="{{ old('golongan_darah') ?? $mahasiswa->golongan_darah }}">
								@error('golongan_darah')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="alamat">Alamat</label>
								<input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') ?? $mahasiswa->alamat }}">
								@error('alamat')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="nama_ortu">Nama Orang Tua</label>
								<input type="text" class="form-control @error('nama_ortu') is-invalid @enderror" name="nama_ortu" value="{{ old('nama_ortu') ?? $mahasiswa->nama_ortu }}">
								@error('nama_ortu')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="pendidikan_terakhir">Pendidikan Terakhir</label>
								<input type="text" class="form-control @error('pendidikan_terakhir') is-invalid @enderror" name="pendidikan_terakhir" value="{{ old('pendidikan_terakhir') ?? $mahasiswa->pendidikan_terakhir }}">
								@error('pendidikan_terakhir')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="pekerjaan">Pekerjaan</label>
								<input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" name="pekerjaan" value="{{ old('pekerjaan') ?? $mahasiswa->pekerjaan }}">
								@error('pekerjaan')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="keterangan">Keterangan</label>
								<input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" value="{{ old('keterangan') ?? $mahasiswa->keterangan }}">
								@error('keterangan')
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