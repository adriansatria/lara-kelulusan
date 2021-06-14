@extends('layouts.app')

@section('content')

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<form action="{{ route('dosen.update', $dosen->id) }}" method="POST">
					@method('PATCH')
					@csrf
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="nip">NIP</label>
								<input type="text" class="form-control @error('nip') is-invalid @enderror" name="nip" value="{{ old('nip') ?? $dosen->nip }}" readonly="">
								@error('nip')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="nama_dosen">Nama</label>
								<input type="text" class="form-control @error('nama_dosen') is-invalid @enderror" name="nama_dosen" value="{{ old('nama_dosen') ?? $dosen->nama_dosen }}">
								@error('nama_dosen')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="jabatan_struktural">Jabatan Struktural</label>
								<input type="text" class="form-control @error('jabatan_struktural') is-invalid @enderror" name="jabatan_struktural" value="{{ old('jabatan_struktural') ?? $dosen->jabatan_struktural }}">
								@error('jabatan_struktural')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="pangkat_golongan">Pangkat Golongan</label>
								<input type="text" class="form-control @error('pangkat_golongan') is-invalid @enderror" name="pangkat_golongan" value="{{ old('pangkat_golongan') ?? $dosen->pangkat_golongan }}">
								@error('pangkat_golongan')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="jabatan_fungsional">Jabatan Fungsional</label>
								<input type="text" class="form-control @error('jabatan_fungsional') is-invalid @enderror" name="jabatan_fungsional" value="{{ old('jabatan_fungsional') ?? $dosen->jabatan_fungsional }}">
								@error('jabatan_fungsional')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="tmt">Tmt</label>
								<input type="text" class="form-control @error('tmt') is-invalid @enderror" name="tmt" value="{{ old('tmt') ?? $dosen->tmt }}">
								@error('tmt')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="notelp">No. Telp</label>
								<input type="text" class="form-control @error('notelp') is-invalid @enderror" name="notelp" value="{{ old('notelp') ?? $dosen->notelp }}">
								@error('notelp')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="nidn_nidk">NIDN/NIDK</label>
								<input type="text" class="form-control @error('nidn_nidk') is-invalid @enderror" name="nidn_nidk" value="{{ old('nidn_nidk') ?? $dosen->nidn_nidk }}">
								@error('nidn_nidk')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="homebase_prodi">Homebase Prodi</label>
								<input type="text" class="form-control @error('homebase_prodi') is-invalid @enderror" name="homebase_prodi" value="{{ old('homebase_prodi') ?? $dosen->homebase_prodi }}">
								@error('homebase_prodi')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="serdos">Serdos</label>
								<input type="text" class="form-control @error('serdos') is-invalid @enderror" name="serdos" value="{{ old('serdos') ?? $dosen->serdos }}">
								@error('serdos')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="keterangan">Keterangan</label>
								<input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" value="{{ old('keterangan') ?? $dosen->keterangan }}">
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