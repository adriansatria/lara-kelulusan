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
									<option value="">PILIH</option>
									@foreach($dosen as $i)
									<option value="{{ $i->nama_dosen }}">{{ $i->nip }} - {{ $i->nama_dosen }}</option>
									@endforeach
								</select>
								@error('nama_dosen')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="mata_kuliah">Mata Kuliah</label>
								<input type="text" class="form-control @error('mata_kuliah') is-invalid @enderror" name="mata_kuliah" value="{{ old('mata_kuliah') }}">
								@error('mata_kuliah')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="kelas">Kelas</label>
								<input type="text" class="form-control @error('kelas') is-invalid @enderror" name="kelas" value="{{ old('kelas') }}">
								@error('kelas')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="nama_mahasiswa">Nama Mahasiswa</label>
								<select class="form-control @error('nama_mahasiswa') is-invalid @enderror" name="nama_mahasiswa" value="{{ old('nama_mahasiswa') }}">
									<option value="">PILIH</option>
									@foreach($mahasiswa as $i)
									<option value="{{ $i->nama }}">{{ $i->nim }} - {{ $i->nama }}</option>
									@endforeach
								</select>
								@error('nama_mahasiswa')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="nim">NIM</label>
								<select class="form-control @error('nim') is-invalid @enderror" name="nim" value="{{ old('nim') }}">
									<option value="">PILIH</option>
									@foreach($mahasiswa as $i)
									<option value="{{ $i->nim }}">{{ $i->nim }} - {{ $i->nama }}</option>
									@endforeach
								</select>
								@error('nim')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="nilai_akhir">Nilai Akhir</label>
								<select name="nilai_akhir" class="form-control @error('nilai_akhir') is-invalid @enderror">
									<option value="">Nilai Akhir</option>
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
								<input type="text" class="form-control @error('tahun') is-invalid @enderror" name="tahun" value="{{ old('tahun') }}">
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
					<!-- <button type="submit" class="btn btn border border-secondary" style="background: rgb(235, 235, 235);">Save</button> -->
				</form>
			</div>
		</div>	
	</div>
</div>

@endsection